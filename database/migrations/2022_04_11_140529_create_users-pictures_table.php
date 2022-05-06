<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userPicture', function (Blueprint $table) {
            $table->unsignedInteger('idUser');
            $table->unsignedInteger('idPicture');
            $table->foreign('idUser')
                ->references('idUser')
                ->on('user')
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
        Schema::dropIfExists('userPicture');
    }
}
