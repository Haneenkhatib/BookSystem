<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BookCategoryLibrary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books',function (Blueprint $table){
            $table->integer('category_id')->unsigned();
            $table->integer('library_id')->unsigned();
            $table->foreign('library_id')
                ->references('id')
                ->on('library');
            $table->foreign('category_id')
                ->references('id')
                ->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books',function (Blueprint $table){
            $table->dropForeign('category_id');
            $table->dropForeign('library_id');
        });
    }
}
