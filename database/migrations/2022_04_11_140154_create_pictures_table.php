<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picture', function (Blueprint $table) {
            $table->increments('idPicture');
            $table->string('title');
            $table->text('author');
            $table->text('content');
            $table->date('date');
            $table->integer('numLikes');
            $table->text('picture');
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
        Schema::dropIfExists('picture');
    }
}
