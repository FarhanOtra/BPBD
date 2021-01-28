<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Detail_barang;
use App\Jenis_barang;
use App\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::orderBy('id_barang','asc')->get();
        return view('barang.index',['barang' => $barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::orderBy('id_barang','asc')->get();
        $jenis_barang = Jenis_barang::all();
        return view('barang.create',['barang' => $barang , 'jenis_barang' => $jenis_barang ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = new Barang;

        $barang->id_barang = $request->id_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->jenisbarang_id = $request->jenis_barang;
        $barang->deskripsi = $request->deskripsi;

        $barang->save();

        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::find($id);
        $jenis_barang = Jenis_barang::all();
        return view('barang.edit',['barang' => $barang , 'jenis_barang' => $jenis_barang ]);
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
        Barang::where('id',$id)->UPDATE([
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'jenisbarang_id' => $request->jenis_barang,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect()->route('barang.index');
    }
}
