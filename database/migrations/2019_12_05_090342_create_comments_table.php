<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned()->index;
            $table->integer('is_Active')->default(0);
            $table->integer('author');
            $table->string('email');
            $table->text('body');
            $table->timestamps();
//            when post is delete cooment should be automatically delete
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
