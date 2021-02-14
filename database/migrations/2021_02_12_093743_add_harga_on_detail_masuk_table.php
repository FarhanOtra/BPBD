<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHargaOnDetailMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_masuk', function(Blueprint $table)
        {
            $table->float('harga')->after('exp');
        }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_masuk', function(Blueprint $table)
        {
            // $table->float('harga')->after('exp');
        }
        );
    }
}
