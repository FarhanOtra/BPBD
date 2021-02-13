<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //$exp = Detail_masuk::all();
        $exp = DB::table('detail_masuk')
            ->join('barang', 'id_barang', '=', 'detail_masuk.barang_id')
            ->select('barang.nama_barang', 'detail_masuk.exp')
            ->limit(5)
            ->get();

        return view('dashboard',['exp' => $exp]);
    }

   
}
