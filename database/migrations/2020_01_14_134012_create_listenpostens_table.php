<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListenpostensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listenpostens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('postenname');
            $table->integer('anzahl');
            $table->unsignedBigInteger('einkaufsliste_id');
            $table->foreign('einkaufsliste_id')->references('id')->on('einkaufslistes')->onDelete('cascade');
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
        Schema::dropIfExists('listenpostens');
    }
}
