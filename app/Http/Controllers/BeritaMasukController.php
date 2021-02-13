<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita_masuk;
use App\Barang;
use App\Donatur;
use App\Penerima;
use App\Detail_masuk;
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
        $beritamasuk = Berita_masuk::orderBy('tanggal','asc')
        ->where('id', $id)
        ->get();
        
        // return view('beritamasuk.print',['beritamasuk' => $beritamasuk]);

        $pdf = PDF::loadview('beritamasuk/print',['beritamasuk'=>$beritamasuk]);
        
        return $pdf->stream();
        
    }
}
