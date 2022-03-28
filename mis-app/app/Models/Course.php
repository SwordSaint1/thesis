<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model {

    use HasFactory;

    protected $guarded = [];

    public function student() {
        return $this->hasOne('\App\Models\Student');
    }

    public function subjects() {
        return $this->hasMany('\App\Models\Subject');
    }

    public function enrollment_form() {
        return $this->hasOne('\App\Models\EnrollmentForm');
    }

}
