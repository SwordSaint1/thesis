<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:F d, Y'
     ];

    public function enrollment_form() {
        return  $this->belongsTo('App\Models\EnrollmentForm', 'enrollment_form_id', 'id');
    }

    public function user() {
        return  $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    //php artisan migrate --path=/database/migrations/2021_10_16_180056_create_payments_table.php
}
