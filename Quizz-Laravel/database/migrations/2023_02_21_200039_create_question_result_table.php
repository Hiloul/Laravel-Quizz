<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Result;
use App\Models\Question;
use App\Models\Option;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Seconde table pivot celle ci lie les resultats et les questions créées
        Schema::create('question_result', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Result::class);
            $table->foreignIdFor(Question::class);
            $table->foreignIdFor(Option::class);
           
            $table->integer('points')->default(0);
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
        Schema::dropIfExists('question_result');
    }
};
