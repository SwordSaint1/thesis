<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->nullable();
            $table->string('course_code')->nullable();
            $table->string('name')->nullable();
            $table->string('year_level')->nullable();
            $table->string('semester')->nullable();
            $table->bigInteger('units')->nullable();
            $table->boolean('has_lab')->default('0');
            $table->timestamps();
        });

        # Run Seeder
        Artisan::call('db:seed', array('--class' => 'CourseSubjectSeeder'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('subjects');
    }
}
