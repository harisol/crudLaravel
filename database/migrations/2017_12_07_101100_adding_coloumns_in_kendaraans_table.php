<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingColoumnsInKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kendaraan', function(Blueprint $table){
            $table->integer('user_id') // type data integer
               ->index() // index
               ->unsigned()
               ->after('buatan'); // setelah kolom buatan

            $table->foreign('user_id') // foreignKey 
               ->references('id') // dari kolom id 
               ->on('users') // di tabel users
               ->onUpdate('cascade') // ketika terjadi perubahan di tabel users maka akan update
               ->onDelete('cascade'); // ketika data users di hapus akan ikut hilang
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
