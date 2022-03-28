<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\EnrollmentForm;
use Illuminate\Http\Request;
use Excel;
use App\Imports\StudentsImport;

class StudentController extends Controller {


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $students = Student::all();

        return view('students.index', compact('students'));

        // $students = Student::latest()->paginate(5);

        // return view('students.index', compact('students'))
        //                 ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $courses = Course::all();
        return view('students.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'student_number' => 'required|unique:students',
            'first_name' => 'required',
            'last_name' => 'required',
            'course_id' => 'required',
            'year' => 'required',
            'mobile_number' => 'required',
            'email_address' => 'required',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
                        ->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student) {
        $enrollment_form = collect($student->enrollment_form)->last();
        // dd($enrollment_form->total_balance);
        return view('students.show', compact('student','enrollment_form'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request, $student_number) {
        $student = Student::where('student_number', '=', $student_number)->firstOrFail();
        return response(['student' => $student,
                         'enrollment_form' => collect($student->enrollment_form)->last(),
                         'message' => 'ok']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student) {
        $courses = Course::all();
        return view('students.edit', compact('student', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student) {
        $request->validate([
            'student_number' => 'required|unique:students,student_number,' . $student->id,
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile_number' => 'required',
            'course_id' => 'required',
            'year' => 'required',
            'mobile_number' => 'required',
            'email_address' => 'required',
        ]);

        $student->update($request->all());

        return redirect()->back()->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student) {
        $student->delete();
        return redirect()->route('students.index')
                        ->with('success', 'Student deleted successfully');
    }
   // /**
   //   * Import Students
   //   * @param NUll
   //   * @return View
   //  */

   // public function importStudents(){
   //  return view('students.import');
   // }
   // public function uploadStudents(Request $request){
   //  Excel::import(new StudentsImport, $request->file);

   //  return redirect()->route('students.index')->with('sucess', 'Imported Successfully');
   // } 

    public function importForm()
    {
        return view('import-form');
    }
    public function import(Request $request){
        Excel::import(new StudentsImport, $request->file);
        return redirect()->route('students.index')
                        ->with('success', 'Uploaded Successfully');
    }
}
