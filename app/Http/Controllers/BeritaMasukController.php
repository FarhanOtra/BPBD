<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita_masuk;
use App\Barang;
use App\Donatur;
use App\Penerima;
use App\Detail_masuk;
use App\Masuk;
use RealRashid\SweetAlert\Facades\Alert;

use PDF;


class BeritaMasukController extends Controller
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
        $beritamasuk = Berita_masuk::orderBy('tanggal','asc')->get();
        $barang = Barang::get();
        return view('beritamasuk.index',compact('beritamasuk','barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::orderBy('id_barang','asc')->get();
        return view('beritamasuk.create',['barang' => $barang]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $penerima = new Penerima;

        $penerima->nama = $request->p_nama;
        $penerima->jabatan = $request->p_jabatan;
        $penerima->instansi = $request->p_instansi;

        $penerima->save();

        $donatur = new Donatur;

        $donatur->nama = $request->d_nama;
        $donatur->jabatan = $request->d_jabatan;
        $donatur->instansi = $request->d_instansi;

        $donatur->save();

        $id_p = Penerima::latest()->first()->id;
        $id_d = Donatur::latest()->first()->id;

        $berita_masuk = new Berita_masuk;

        $berita_masuk->tanggal = $request->tanggal;
        $berita_masuk->penerima_id = $id_p;
        $berita_masuk->donatur_id = $id_d;

        $berita_masuk->save();

        $id_bm = Berita_masuk::latest()->first()->id;

        $barang_id  = $request->barang_id;
        $exp        = $request->exp;
        $jumlah     = $request->jumlah;

        for($i=0; $i<count($request->id);$i++)
        {
            $datasave = [
                'berita_masuk_id' => $id_bm,
                'barang_id' => $barang_id[$i],
                'exp' => $exp[$i],
                'jumlah' => $jumlah[$i],
            ];

            $id_barang = $request->barang_id[$i] ;
            $cekstock = Barang::where('id',$id_barang)->first();
            
            $stock = $cekstock->stock + $request->jumlah[$i];

            Barang::where('id',$barang_id[$i])->UPDATE(
                ['stock' => $stock]
            );
            Detail_masuk::insert($datasave);
        }
        Alert::success('Berita Masuk', 'Berhasil Ditambah!');
        return redirect()->route('beritamasuk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $beritamasuk = Berita_masuk::find($id);
        $barang = Berita_masuk::all();

        return view('beritamasuk.show',['beritamasuk' => $beritamasuk, 'barang' => $barang]);
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
        $idd = Berita_masuk::find($id);

        $penerima = Penerima::find($idd->penerima_id);
        $penerima->delete();

        $donatur = Donatur::find($idd->donatur_id);
        $donatur->delete();

        $list = Detail_masuk::where('berita_masuk_id',$id)->get();
        foreach($list as $l){
            $barang = Barang::where('id',$l->barang_id)->first();
            $stock = $barang->stock;
            $jumlah = $l->jumlah;
            $stockbaru = $stock - $jumlah;
            Barang::where('id',$l->barang_id)->UPDATE([
                'stock' => $stockbaru ,
            ]);
        };

        $detail = Detail_masuk::where('berita_masuk_id',$id)->delete();

        $bmasuk = Berita_masuk::find($idd->id);
        $bmasuk->delete();

        return redirect()->route('beritamasuk.index');

    }

    public function print($id)
    {
        $beritamasuk = Berita_masuk::orderBy('tanggal','asc')
        ->where('id', $id)
        ->get();
        
        // return view('beritamasuk.print',['beritamasuk' => $beritamasuk]);

        $pdf = PDF::loadview('beritamasuk/print',['beritamasuk'=>$beritamasuk]);
        
        return $pdf->stream();
        
    }
}
