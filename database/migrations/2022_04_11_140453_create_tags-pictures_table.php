<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagPicture', function (Blueprint $table) {
            $table->unsignedInteger('idTag');
            $table->unsignedInteger('idPicture');
            $table->foreign('idTag')
                ->references('idTag')
                ->on('tag')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('idPicture')
                ->references('idPicture')
                ->on('picture')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tagPicture');
    }
}
