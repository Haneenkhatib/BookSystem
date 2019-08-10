<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Book extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books',function (Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->string('publisher');
            $table->string('writer');
            $table->string('isbn')->unique();
            $table->date('publish_date');
            $table->enum('lang',['en','ar']);
            $table->string('author');
            $table->string('image');
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
        Schema::dropIfExists('books');
    }
}
