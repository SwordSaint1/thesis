<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'student_number' => $row['student_number'],
            'first_name' => $row['first_name'],
            'middle_name' => $row['middle_name'],
            'last_name' => $row['last_name'],
            'course_id' => $row['course_id'],
            'year' => $row['year'],
            'academic_year_start' => $row['academic_year_start'],
            'academic_year_end' => $row['academic_year_end'],
            'semester' => $row['semester'],
            'mobile_number' => $row['mobile_number'],
            'email_address' => $row['email_address'],
            // 'deleted_at' => $row['deleted_at'],
            // 'created_at' => $row['created_at'],
            // 'updated_at' => $row['updated_at'],
        ]);


    }
}
