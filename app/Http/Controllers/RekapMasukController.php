<?php

namespace App\Http\Controllers;

use App\Rekap_masuk;
use App\Detail_masuk;
use Illuminate\Http\Request;

class RekapMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekapmasuk = Detail_masuk::get();
        return view('rekapmasuk.index',['rekapmasuk' => $rekapmasuk]);
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
     * @param  \App\Rekap_masuk  $rekap_masuk
     * @return \Illuminate\Http\Response
     */
    public function show(Rekap_masuk $rekap_masuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rekap_masuk  $rekap_masuk
     * @return \Illuminate\Http\Response
     */
    public function edit(Rekap_masuk $rekap_masuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rekap_masuk  $rekap_masuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rekap_masuk $rekap_masuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rekap_masuk  $rekap_masuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekap_masuk $rekap_masuk)
    {
        //
    }
}
