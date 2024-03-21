<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTamuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data-tamu', function (Blueprint $table) {
            $table->increments ('id_tamu');
            $table->string('nama',45);
            $table->date('check in');
            $table->date('check out');
            $table->string('pekerjaan',50);
            $table->string('alamat',50);
            $table->integer('no hp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
