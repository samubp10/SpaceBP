<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('idPost');
            $table->string('title');
            $table->date('date');
            $table->string('author');
            $table->text('content');
            $table->integer('numLikes');
            $table->text('picture');
            $table->unsignedInteger('idUser');
            $table->foreign('idUser')
                ->references('idUser')
                ->on('user')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('post');
    }
}
