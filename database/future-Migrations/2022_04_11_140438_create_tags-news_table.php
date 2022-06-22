<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagNews', function (Blueprint $table) {
            $table->unsignedInteger('idTag');
            $table->unsignedInteger('idNews');
            $table->foreign('idTag')
                ->references('idTag')
                ->on('tag')
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
        Schema::dropIfExists('tagNews');
    }
}
