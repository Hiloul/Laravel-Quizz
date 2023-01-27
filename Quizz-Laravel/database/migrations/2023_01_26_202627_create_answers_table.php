<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->string('answer1');
            $table->string('answer2');
            $table->string('answer3');
            $table->integer('answer4');
            $table->longText('answer5');
            $table->string('email'); //input normal ou cle externe email users table?
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
//creer la bonne structure pour la table answers anvant la migration
        Schema::table('answers', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
};
