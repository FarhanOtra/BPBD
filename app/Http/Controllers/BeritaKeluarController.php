<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Berita_keluar;
use App\Pihak_pertama;
use App\Pihak_kedua;
use App\Detail_keluar;
use App\Barang;
use PDF;



class BeritaKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $beritakeluar = Berita_keluar::orderBy('tanggal','asc')->get();
        return view('beritakeluar.index',['beritakeluar' => $beritakeluar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::orderBy('id_barang','asc')->get();
        return view('beritakeluar.create',['barang' => $barang]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pihakpertama = new Pihak_pertama;

        $pihakpertama->nama = $request->p_nama;
        $pihakpertama->jabatan = $request->p_jabatan;
        $pihakpertama->instansi = $request->p_instansi;

        $pihakpertama->save();

        $pihakkedua = new Pihak_kedua;

        $pihakkedua->nama = $request->d_nama;
        $pihakkedua->jabatan = $request->d_jabatan;
        $pihakkedua->instansi = $request->d_instansi;

        $pihakkedua->save();

        $id_p = Pihak_pertama::latest()->first()->id;
        $id_d = Pihak_kedua::latest()->first()->id;

        $berita_keluar = new Berita_keluar;

        $berita_keluar->tanggal = $request->tanggal;
        $berita_keluar->kegiatan = $request->kegiatan;
        $berita_keluar->pihak_pertama_id = $id_p;
        $berita_keluar->pihak_kedua_id = $id_d;

        $berita_keluar->save();

        $id_bm = Berita_keluar::latest()->first()->id;

        $barang_id  = $request->barang_id;
        $jumlah     = $request->jumlah;

        for($i=0; $i<count($request->id);$i++)
        {
            $datasave = [
                'berita_keluar_id' => $id_bm,
                'barang_id' => $barang_id[$i],
                'jumlah' => $jumlah[$i],
            ];

            $id_barang = $request->barang_id[$i] ;
            $cekstock = Barang::where('id',$id_barang)->first();
            
            $stock = $cekstock->stock - $request->jumlah[$i];
            Barang::where('id',$barang_id[$i])->UPDATE(
                ['stock' => $stock]
            );

            Detail_keluar::insert($datasave);
        }
    
        return redirect()->route('beritakeluar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idd = Berita_keluar::find($id);

        $pihakpertama = Pihak_pertama::find($idd->pihak_pertama_id);
        $pihakpertama->delete();

        $pihakkedua = Pihak_kedua::find($idd->pihak_kedua_id);
        $pihakkedua->delete();

        $detail = Detail_keluar::where('berita_keluar_id',$id)->delete();

        $bkel = Berita_keluar::find($idd->id);
        $bkel->delete();

        return redirect()->route('beritakeluar.index');
    }

    public function print($id)
    {
        // $beritakeluar = Berita_keluar::orderBy('tanggal','asc')
        // ->where('id', $id)
        // ->get();
      

        $barang = DB::table('berita_keluar')
        ->select('detail_keluar.*','barang.nama_barang','barang.satuan','barang.harga')
        ->join('pihak_pertama','berita_keluar.pihak_pertama_id','=','pihak_pertama.id')
        ->join('pihak_kedua','berita_keluar.pihak_kedua_id','=','pihak_kedua.id')
        ->join('detail_keluar','berita_keluar.id','=','detail_keluar.berita_keluar_id')
        ->join('barang','barang.id','=','detail_keluar.barang_id')
        ->join('jenis_barang','barang.jenisbarang_id','=','jenis_barang.id')
        ->where('berita_keluar.id',$id)
        ->where('jenisbarang_id',1)
        ->get();

        $beritakeluar = Berita_keluar::orderBy('tanggal','asc')
        ->where('id', $id)
        ->get();
        
        $pdf = PDF::loadview('beritakeluar/print',['beritakeluar'=>$beritakeluar,'barang'=>$barang]);
        
        return $pdf->stream();
    }

    
    public function print2($id)
    {
        // $beritakeluar = Berita_keluar::orderBy('tanggal','asc')
        // ->where('id', $id)
        // ->get();
    
        $barang = DB::table('berita_keluar')
        ->select('detail_keluar.*','barang.nama_barang','barang.satuan','barang.harga')
        ->join('pihak_pertama','berita_keluar.pihak_pertama_id','=','pihak_pertama.id')
        ->join('pihak_kedua','berita_keluar.pihak_kedua_id','=','pihak_kedua.id')
        ->join('detail_keluar','berita_keluar.id','=','detail_keluar.berita_keluar_id')
        ->join('barang','barang.id','=','detail_keluar.barang_id')
        ->join('jenis_barang','barang.jenisbarang_id','=','jenis_barang.id')
        ->where('berita_keluar.id',$id)
        ->where('jenisbarang_id',2)
        ->get();

        $beritakeluar = Berita_keluar::orderBy('tanggal','asc')
        ->where('id', $id)
        ->get();
        
        $pdf = PDF::loadview('beritakeluar/print2',['beritakeluar'=>$beritakeluar,'barang'=>$barang]);
        
        return $pdf->stream();
    }
}
