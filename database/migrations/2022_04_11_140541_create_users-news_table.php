<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userNews', function (Blueprint $table) {
            $table->unsignedInteger('idUser');
            $table->unsignedInteger('idNews');
            $table->foreign('idUser')
                ->references('idUser')
                ->on('user')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('idNews')
                ->references('idNews')
                ->on('news')
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
        Schema::dropIfExists('userNews');
    }
}
