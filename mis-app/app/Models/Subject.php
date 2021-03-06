<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model {

    use HasFactory;

    protected $guarded = [];

    public function course() {
        return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }

    public function subjects() {
        return $this->hasOne('\App\Models\EnrollmentDetail');
    }

}
