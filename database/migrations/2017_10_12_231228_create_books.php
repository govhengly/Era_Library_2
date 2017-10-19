<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book',function (Blueprint $table){
            $table->increments('book_id');
            $table->string('photo');
            $table->string('title');
            $table->string('category');
            $table->string('type');
            $table->string('author');
            $table->string('barcode');
            $table->string('manager');
            $table->string('count');
            $table->string('year');
            $table->timestamps();


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
