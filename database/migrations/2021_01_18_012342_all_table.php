<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_barang', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('jenis_barang');
            $table->timestamps();   
        });

        Schema::create('barang', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('id_barang');
            $table->string('nama_barang');
            $table->string('deskripsi')->nullable();
            $table->unsignedBigInteger('jenisbarang_id')->nullable();
            $table->timestamps();

            $table->foreign('jenisbarang_id')->references('id')->on('jenis_barang')->onDelete('set null');
        });
        
        Schema::create('pihak_pertama', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('nama');
            $table->string('jabatan');
            $table->string('instansi');
            $table->timestamps();
        });
        
        Schema::create('pihak_kedua', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('nama');
            $table->string('jabatan');
            $table->string('instansi');
            $table->timestamps();
        });

        Schema::create('donatur', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('nama');
            $table->string('jabatan');
            $table->string('instansi');
            $table->timestamps();
        });
        
        Schema::create('penerima', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('nama');
            $table->string('jabatan');
            $table->string('instansi');
            $table->timestamps();
        });

        Schema::create('berita_masuk', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->date('tanggal');
            $table->unsignedBigInteger('donatur_id')->nullable();
            $table->unsignedBigInteger('penerima_id')->nullable();
            $table->timestamps();

            $table->foreign('donatur_id')->references('id')->on('donatur')->onDelete('set null');
            $table->foreign('penerima_id')->references('id')->on('penerima')->onDelete('set null');
        });

        Schema::create('berita_keluar', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->date('tanggal');
            $table->unsignedBigInteger('pihak_pertama_id')->nullable();
            $table->unsignedBigInteger('pihak_kedua_id')->nullable();
            $table->timestamps();

            $table->foreign('pihak_pertama_id')->references('id')->on('pihak_pertama')->onDelete('set null');
            $table->foreign('pihak_kedua_id')->references('id')->on('pihak_kedua')->onDelete('set null');
        });
        
        Schema::create('detail_masuk', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->unsignedBigInteger('berita_masuk_id')->nullable();
            $table->unsignedBigInteger('barang_id')->nullable();
            $table->date('exp');
            $table->float('harga');
            $table->integer('jumlah');
            $table->string('satuan');
            $table->integer('stock');
            $table->timestamps();

            $table->foreign('berita_masuk_id')->references('id')->on('berita_masuk')->onDelete('set null');
            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('set null');;
        });

        Schema::create('detail_keluar', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->unsignedBigInteger('berita_keluar_id')->nullable();
            $table->unsignedBigInteger('barang_id')->nullable();
            $table->integer('jumlah');
            $table->string('satuan');
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('berita_keluar_id')->references('id')->on('berita_keluar')->onDelete('set null');
            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('set null');;
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_barang');
        Schema::dropIfExists('barang');
        Schema::dropIfExists('pihak_pertama');
        Schema::dropIfExists('pihak_kedua');
        Schema::dropIfExists('transaksi');
        Schema::dropIfExists('detail_transaksi');
    }
}
