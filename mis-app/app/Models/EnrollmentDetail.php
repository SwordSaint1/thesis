<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollmentDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function enrollment_form() {
        return  $this->belongsTo('App\Models\EnrollmentForm', 'enrollment_form_id', 'id');
    }

    public function subject() {
        return  $this->belongsTo('App\Models\Subject', 'subject_id', 'id');
    }

}
