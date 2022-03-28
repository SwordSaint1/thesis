<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Course;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        return view('subjects.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'course_id' => 'required',
            'year_level' => 'required',
            'semester' => 'required',
            'course_code' => 'required',
            'name' => 'required',
            'units' => 'required',
            'has_lab' => 'nullable',
        ]);
        $data['has_lab'] = isset($data['has_lab']) ? 1 : 0;
        $subject = Subject::create($data);
        return redirect()->to('courses/' . $request->course_id . '/edit')
            ->with('success', 'Subject created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $data = $request->validate([
            'year_level' => 'required',
            'semester' => 'required',
            'course_code' => 'required',
            'name' => 'required',
            'units' => 'required',
            'has_lab' => 'nullable',
        ]);
        $data['has_lab'] = isset($data['has_lab']) ? 1 : 0;

        $subject->update($data);

        return redirect()->back()->with('success', 'Subject updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->back()
                        ->with('success', 'Subject deleted successfully');
    }
}
