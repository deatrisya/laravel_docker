<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id(); //id, primary key, auto increment


            $table->string('nama');
            $table->string('kelas');
            $table->date('tanggal_lahir');
            // $table->string('foto_profile')->nullable();
            $table->string('alamat');

            $table->timestamps(); //created_at, updated_at TIMESTAMP
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
