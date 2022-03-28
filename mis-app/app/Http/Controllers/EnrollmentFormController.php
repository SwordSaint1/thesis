<?php

namespace App\Http\Controllers;

use App\Models\EnrollmentForm;
use App\Models\EnrollmentDetail;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enrollment_forms = EnrollmentForm::latest()->paginate(5);

        return view('enrollment_forms.index', compact('enrollment_forms'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('enrollment_forms.create', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStudent(Student $student)
    {
        $courses = Course::all();
        return view('enrollment_forms.create', compact('courses', 'student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = [];
        $form['student_id']             = $request->student_id;
        $form['course_id']              = $request->course_id;
        $form['academic_year']          = $request->academic_year;
        $form['semester']               = $request->semester;
        $form['year_level']               = $request->year_level;
        $form['total_units']            = $request->total_units;
        $form['is_paid']                = false;
        $form['is_discount_30_pecent']  = ($request->is_discount_30_pecent == "false") ? 0 : 1;
        $form['is_discount_50_pecent']  = ($request->is_discount_50_pecent == "false") ? 0 : 1;
        $form['is_discount_cash_full']  = ($request->is_discount_cash_full == "false") ? 0 : 1;
        $form['is_discount_siblings']   = ($request->is_discount_siblings == "false") ? 0 : 1;
        $form['is_discount_aim_global'] = ($request->is_discount_aim_global == "false") ? 0 : 1;
        $form['is_discount_lab_fee']    = ($request->is_discount_lab_fee == "false") ? 0 : 1;
        $form['others_fee']             = $request->others_fee;
        $form['tuition_fee']            = $request->tuition_fee;
        $form['misc_fee']               = $request->misc_fee;
        $form['lab_fee']                = $request->lab_fee;
        $form['nstp_fee']               = $request->nstp_fee;
        $form['total_fee']              = $request->total_fee;
        $form['total_discount']         = $request->total_discount;
        $form['total_payable']          = $request->total_payable;

        $eform = EnrollmentForm::create($form);

        foreach ($request->subjects as $subject) {
            EnrollmentDetail::create([
                "enrollment_form_id"    => $eform->id,
                "subject_id"            => $subject,
            ]);
        }

        return response(['enrollemt_form' => $eform, 'message' => 'ok']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EnrollmentForm  $enrollmentForm
     * @return \Illuminate\Http\Response
     */
    public function show(EnrollmentForm $enrollmentForm)
    {
        return view('enrollment_forms.show', compact('enrollmentForm'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EnrollmentForm  $enrollmentForm
     * @return \Illuminate\Http\Response
     */
    public function validateEnrollment(Request $request)
    {
        return response([
            'enrollemt_form' =>    EnrollmentForm::where('student_id', $request->student_id)
                ->where('semester',  $request->semester)
                ->where('academic_year',  $request->academic_year)
                ->firstOrFail(),
            'message' => 'ok'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EnrollmentForm  $enrollmentForm
     * @return \Illuminate\Http\Response
     */
    public function edit(EnrollmentForm $enrollmentForm)
    {
        $courses = Course::all();
        return view('enrollment_forms.edit', compact('courses', 'enrollmentForm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EnrollmentForm  $enrollmentForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EnrollmentForm $enrollmentForm)
    {
        $form = [];
        $form['course_id']              = $request->course_id;
        $form['academic_year']          = $request->academic_year;
        $form['semester']               = $request->semester;
        $form['year_level']               = $request->year_level;
        $form['total_units']            = $request->total_units;
        $form['is_discount_30_pecent']  = ($request->is_discount_30_pecent == "false") ? 0 : 1;
        $form['is_discount_50_pecent']  = ($request->is_discount_50_pecent == "false") ? 0 : 1;
        $form['is_discount_cash_full']  = ($request->is_discount_cash_full == "false") ? 0 : 1;
        $form['is_discount_siblings']   = ($request->is_discount_siblings == "false") ? 0 : 1;
        $form['is_discount_aim_global'] = ($request->is_discount_aim_global == "false") ? 0 : 1;
        $form['is_discount_lab_fee']    = ($request->is_discount_lab_fee == "false") ? 0 : 1;
        $form['others_fee']             = $request->others_fee;
        $form['tuition_fee']            = $request->tuition_fee;
        $form['misc_fee']               = $request->misc_fee;
        $form['lab_fee']                = $request->lab_fee;
        $form['nstp_fee']               = $request->nstp_fee;
        $form['total_fee']              = $request->total_fee;
        $form['total_discount']         = $request->total_discount;
        $form['total_payable']          = $request->total_payable;

        $enrollmentForm->update($form);
        $enrollmentForm->details()->delete();

        foreach ($request->subjects as $subject) {
            EnrollmentDetail::updateOrCreate([
                "enrollment_form_id"    => $enrollmentForm->id,
                "subject_id"            => $subject,
            ]);
        }

        return response(['enrollemt_form' => $enrollmentForm, 'message' => 'ok']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EnrollmentForm  $enrollmentForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(EnrollmentForm $enrollmentForm)
    {
        //
    }
}
