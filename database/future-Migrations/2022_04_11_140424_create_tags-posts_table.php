<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagPost', function (Blueprint $table) {
            $table->unsignedInteger('idTag');
            $table->unsignedInteger('idPost');
            $table->foreign('idTag')
                ->references('idTag')
                ->on('tag')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('idPost')
                ->references('idPost')
                ->on('post')
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
        Schema::dropIfExists('tagPost');
    }
}
