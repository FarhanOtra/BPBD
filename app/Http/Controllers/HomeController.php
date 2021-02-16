<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Berita_masuk;
use App\Berita_keluar;
use App\Donatur;
use App\Penerima;
use App\Detail_masuk;
use App\Detail_keluar;
use App\Barang;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $exp = Detail_masuk::all(); 
        $count = Berita_masuk::count('id');
        $count1 = Berita_keluar::count('id');
        $max = Barang::max('nama_barang');
        $min = Barang::min('nama_barang');
        $beritamasuk = Berita_masuk::orderBy('tanggal','desc')->limit(5)->get(); 
        $beritakeluar = Berita_keluar::orderBy('tanggal','desc')->limit(5)->get();
        return view('dashboard',compact('count','count1','max','min','beritamasuk','beritakeluar','exp'));
    }

    public function show()
    {

    }

   
}
