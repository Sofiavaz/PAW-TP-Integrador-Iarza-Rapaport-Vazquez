<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user')->constrained('users');
            $table->foreignId('teacher')->constrained('users');
            $table->string('short_description');
            $table->string('long_description')->nullable(true);
            $table->tinyInteger('rating')->unsigned(); // From 0..255, 5 star rating as 0, 25, 50, 75, 100
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
        Schema::dropIfExists('reviews');
    }
}
