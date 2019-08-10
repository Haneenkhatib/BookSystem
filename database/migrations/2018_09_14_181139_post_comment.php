<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments',function (Blueprint $table){
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')
                ->references('id')
                ->on('posts');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments',function (Blueprint $table){
            $table->dropForeign('post_id');
        });
    }
}
