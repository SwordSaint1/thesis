<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CourseSubjectSeeder extends Seeder
{
    # php artisan db:seed --class=CourseSubjectSeeder
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #Truncate table
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('subjects')->truncate();

        #List of subjects
        $subjects = array(
            [
                "course_id" => "1",
                "course_code" => "AITEans",
                "name" => "AITE CAMPUS IDENTITY AWARENESS",
                "year_level" => "First Year",
                "semester" => "First Semester",
                "units" => 3,
                "has_lab" => false
            ],
            [
                "course_id" => "1",
                "course_code" => "ENG+",
                "name" => "ENGLISH PLUS",
                "year_level" => "First Year",
                "semester" => "First Semester",
                "units" => 3,
                "has_lab" => false
            ],
            [
                "course_id" => "1",
                "course_code" => "EUTH 1",
                "name" => "UNDERSTANDING TTHE SELF",
                "year_level" => "First Year",
                "semester" => "First Semester",
                "units" => 3,
                "has_lab" => false
            ],
            [
                "course_id" => "1",
                "course_code" => "HIST 1",
                "name" => "READINGS IN THE PHILIPPINE HISTORY",
                "year_level" => "First Year",
                "semester" => "First Semester",
                "units" => 3,
                "has_lab" => false
            ],
            [
                "course_id" => "1",
                "course_code" => "FIL 1",
                "name" => "KOMUNIKASYON SA AKADEMIKONG FILIPINO",
                "year_level" => "First Year",
                "semester" => "First Semester",
                "units" => 3,
                "has_lab" => false
            ],
            [
                "course_id" => "1",
                "course_code" => "CC 101",
                "name" => "INTRODUCTION TO COMPUTING",
                "year_level" => "First Year",
                "semester" => "First Semester",
                "units" => 3,
                "has_lab" => true
            ],
            [
                "course_id" => "1",
                "course_code" => "CC 102",
                "name" => "COMPUTER PROGRAMMING",
                "year_level" => "First Year",
                "semester" => "First Semester",
                "units" => 3,
                "has_lab" => true
            ],
            [
                "course_id" => "1",
                "course_code" => "PE 1",
                "name" => "SELF-TESTING ACTIVITY",
                "year_level" => "First Year",
                "semester" => "First Semester",
                "units" => 2,
                "has_lab" => false
            ],
            [
                "course_id" => "1",
                "course_code" => "NSTP 1",
                "name" => "NATIONAL SREVICE TRAINING PROGRAM 1",
                "year_level" => "First Year",
                "semester" => "First Semester",
                "units" => 3,
                "has_lab" => false
            ],
            [
                "course_id" => "1",
                "course_code" => "COMM 1",
                "name" => "PURPOSIVE COMMUNICATION",
                "year_level" => "First Year",
                "semester" => "Second Semester",
                "units" => 3,
                "has_lab" => false
            ],
            [
                "course_id" => "1",
                "course_code" => "FIL 2",
                "name" => "RETORIKA:MASINING NA PAGPAPHAYAG",
                "year_level" => "First Year",
                "semester" => "Second Semester",
                "units" => 3,
                "has_lab" => false
            ],

            [
                "course_id" => "1",
                "course_code" => "HUM 1",
                "name" => "ART APPRECIATION",
                "year_level" => "First Year",
                "semester" => "Second Semester",
                "units" => 3,
                "has_lab" => false
            ],
            [
                "course_id" => "1",
                "course_code" => "GMATH 1",
                "name" => "MATHEMATICS IN MODERN WORLD",
                "year_level" => "First Year",
                "semester" => "Second Semester",
                "units" => 3,
                "has_lab" => false
            ],
            [
                "course_id" => "1",
                "course_code" => "STS",
                "name" => "SCIENCE,TECHNOLOGY AND SOCIETY",
                "year_level" => "First Year",
                "semester" => "Second Semester",
                "units" => 3,
                "has_lab" => false
            ],
            [
                "course_id" => "1",
                "course_code" => "HIST 2",
                "name" => "THE CONTEMPORARY WORLD",
                "year_level" => "First Year",
                "semester" => "Second Semester",
                "units" => 3,
                "has_lab" => false
            ],
            [
                "course_id" => "1",
                "course_code" => "HCI 1O1",
                "name" => "INTRODUCTION TO HUMAN COMPUTER INTERACTION",
                "year_level" => "First Year",
                "semester" => "Second Semester",
                "units" => 3,
                "has_lab" => true
            ],
            [
                "course_id" => "1",
                "course_code" => "CC 103",
                "name" => "COMPUTER PROGRAMMING 2",
                "year_level" => "First Year",
                "semester" => "Second Semester",
                "units" => 3,
                "has_lab" => true
            ],
            [
                "course_id" => "1",
                "course_code" => "PE 2",
                "name" => "FUNDAMENTALS RYHTMIC ACTIVITIES",
                "year_level" => "First Year",
                "semester" => "Second Semester",
                "units" => 2,
                "has_lab" => false
            ],
            [
                "course_id" => "1",
                "course_code" => "NSTP 2",
                "name" => "NATIONAL SERVICE TRAINING PROGRAM 2",
                "year_level" => "First Year",
                "semester" => "Second Semester",
                "units" => 3,
                "has_lab" => false
            ],

        );

        #Create Banks
        Subject::insert($subjects);
    }
}
