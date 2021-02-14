<?php

namespace App\Http\Controllers;

use App\Rekap_keluar;
use App\Detail_keluar;
use Illuminate\Http\Request;

class RekapKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekapkeluar = Detail_keluar::get();
        return view('rekapkeluar.index',['rekapkeluar' => $rekapkeluar]);
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
     * @param  \App\Rekap_keluar  $rekap_keluar
     * @return \Illuminate\Http\Response
     */
    public function show(Rekap_keluar $rekap_keluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rekap_keluar  $rekap_keluar
     * @return \Illuminate\Http\Response
     */
    public function edit(Rekap_keluar $rekap_keluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rekap_keluar  $rekap_keluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rekap_keluar $rekap_keluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rekap_keluar  $rekap_keluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekap_keluar $rekap_keluar)
    {
        //
    }
}
