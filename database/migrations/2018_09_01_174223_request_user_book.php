<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RequestUserBook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requests',function (Blueprint $table){
            $table->integer('user_id')->unsigned();
            $table->integer('book_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->foreign('book_id')
                ->references('id')
                ->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requests',function (Blueprint $table){
            $table->dropForeign('user_id');
            $table->dropForeign('book_id');
        });
    }
}
