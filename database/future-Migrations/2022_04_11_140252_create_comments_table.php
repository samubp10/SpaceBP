<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->unsignedInteger('idUser');
            $table->unsignedInteger('idPost');
            $table->string('date');
            $table->text('content');
            $table->foreign('idUser')
                ->references('idUser')
                ->on('user')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('idPost')
                ->references('idPost')
                ->on('post')
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
        Schema::dropIfExists('comment');
    }
}
