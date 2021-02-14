<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Berita_keluar;
use App\Pihak_pertama;
use App\Pihak_kedua;
use App\Detail_keluar;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    public function print($id)
    {
        // $beritakeluar = Berita_keluar::orderBy('tanggal','asc')
        // ->where('id', $id)
        // ->get();
      

        $barang = DB::table('berita_keluar')
        ->select('detail_keluar.*','barang.nama_barang','barang.deskripsi')
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
        ->select('detail_keluar.*','barang.nama_barang','barang.deskripsi')
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
        
        $pdf = PDF::loadview('beritakeluar/print',['beritakeluar'=>$beritakeluar,'barang'=>$barang]);
        
        return $pdf->stream();
    }
}
