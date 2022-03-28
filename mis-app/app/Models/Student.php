<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use NumberFormatter;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function getBalanceAttribute()
    {
        if (collect($this->enrollment_form)->sum("total_balance") < 0) {
            return "PHP " . number_format((collect($this->enrollment_form)->sum("total_balance") * -1), 2, '.', ',') . '<span class="primary" style=" color: red; font-size: 15px; font-weight: bold;  "> FOR REFUND </span>';
        } else {
            return "PHP " . number_format(collect($this->enrollment_form)->sum("total_balance"), 2, '.', ',');
        }
    }

    public function course()
    {
        return  $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }

    public function enrollment_form()
    {
        return $this->hasMany('\App\Models\EnrollmentForm');
    }

    public function getYearOrdinalAttribute()
    {
        // $n = $this->year;
        // if (!in_array(($n % 100),array(11,12,13)))
        // {
        //     switch ($n % 10)
        //     {
        //     // Only Handle 1st, 2nd, 3rd from Here
        //     case 1:  return $n .'st';
        //     case 2:  return $n .'nd';
        //     case 3:  return $n .'rd';
        // }
        // }
        // return $num.'th';
    }

    public function getSysAttribute()
    {
        return $this->academic_year . " - " . $this->semester;
    }

    use HasFactory;

    protected $table = "students";

    protected $fillable = ['student_number','first_name','middle_name','last_name', 'course_id', 'year', 'academic_year_start', 'academic_year_end', 'semester', 'mobile_number', 'email_address'];

    // public static function getStudent()
    // {
    //     $records = DB::table('students')->select('id','student_number','first_name','middle_name','last_name','course_id','year','academic_year_start','academic_year_end','semester','mobile_number','email_address','deleted_at','created_at','updated_at');
    //     return $records;
    // }

}
