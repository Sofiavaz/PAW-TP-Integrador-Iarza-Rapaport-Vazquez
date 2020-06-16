<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->constrained('users');
            $table->dateTime('date_time');
            $table->string('short_description');
            $table->text('long_description')->nullable(true);
            $table->smallInteger('max_enrollments');
            $table->decimal('price', 8, 2);
            $table->integer('duration_mins');
            $table->foreignId('platform_id')->constrained('platforms');
            $table->foreignId('platform_id')->nullable(true);
            $table->string('access_link')->nullable(true);
            $table->string('access_info')->nullable(true);
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
        Schema::dropIfExists('courses');
    }
}
