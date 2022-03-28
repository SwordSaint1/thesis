<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollmentForm extends Model {

    use HasFactory;

    protected $appends = ['total_payments', 'total_balance'];
    protected $guarded = [];
    protected $casts = [
        'created_at' => 'datetime:F d, Y'
    ];

    public function student() {
        return $this->belongsTo('App\Models\Student', 'student_id', 'id');
    }

    public function payment() {
        return $this->hasMany('\App\Models\Payment');
    }

    public function details() {
        return $this->hasMany('\App\Models\EnrollmentDetail');
    }

    public function getPaymentHistoryAttribute() {
        return $this->payment;
    }

    public function getTotalPaymentsAttribute() {
        $total = 0;
        foreach ($this->payment as $payment) {
            $total += floatval($payment->amount);
        }
        return $total;
    }

    public function getTotalBalanceAttribute() {
        $total = 0;
        foreach ($this->payment as $payment) {
            $total += floatval($payment->amount);
        }
        return floatval($this->total_payable) - floatval($total);
    }

    public function course() {
        return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }

    public function user() {
        return  $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

}
