<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            //RELATION A CORRIGER AUSSI
            // $table->foreignIdFor(Category::class)->constrained()->cascadeOnUpdate();
            // $table->integer('category_id');
            $table->foreignIdFor(Category::class);
            $table->longText('question_text');
            $table->timestamps();
        });
        // Schema::table('answers', function(Blueprint $table) {
        //     $table->foreign('email')->references('email')->on('categories');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
