<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollmentFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollment_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->nullable();
            $table->foreignId('course_id')->nullable();
            $table->string('academic_year')->nullable();
            $table->string('year_level')->nullable();
            $table->string('semester')->nullable();
            $table->bigInteger('total_units')->nullable();
            $table->boolean('is_paid')->default('0');

            $table->boolean('is_discount_30_pecent')->default('0');
            $table->boolean('is_discount_50_pecent')->default('0');
            $table->boolean('is_discount_cash_full')->default('0');
            $table->boolean('is_discount_siblings')->default('0');
            $table->boolean('is_discount_aim_global')->default('0');
            $table->boolean('is_discount_lab_fee')->default('0');

            $table->decimal('tuition_fee', 13,2)->nullable();
            $table->decimal('misc_fee', 13,2)->nullable();
            $table->decimal('lab_fee', 13,2)->nullable();
            $table->decimal('nstp_fee', 13,2)->nullable();
            $table->decimal('others_fee', 13,2)->nullable();

            $table->decimal('total_fee', 13,2)->nullable();

            $table->decimal('total_discount', 13,2)->nullable();

            $table->decimal('total_payable', 13,2)->nullable();
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
        Schema::dropIfExists('enrollment_forms');
    }
}
