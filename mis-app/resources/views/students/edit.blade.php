@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h3 class="page-title">Student</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="assets/#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Students</li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Student</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                    <div class="box mb-0">
                        @if ($message = Session::get('success'))
						<div class="pad res-tb-block">
						    <div class="alert alert-success alert-dismissible m-4">
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                {{ $message }}
                            </div>
						</div>
                        @endif
					  </div>
                        <div class="box-header">
                            <h4 class="box-title"><strong>Student</strong> Form</h4>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <form action="{{ route('students.update' , $student->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Student Number</label>
                                                            <input type="text" class="form-control" name="student_number" placeholder="Student Number" value="{{$student->student_number}}">
                                                            @error('student_number')<span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Academic Year</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" name="student_number" placeholder="To">
                                                                    @error('student_number')<span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" name="student_number" placeholder="From">
                                                                    @error('student_number')<span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Course</label>
                                                            <select class="form-select" name="course_id">
                                                            <option value="">Select Course</option>
                                                            @foreach($courses as $course)
                                                                <option value="{{ $course->id }}" {{ ($student->course_id == $course->id) ? 'selected' : '' }}>
                                                                    {{ $course->name }}
                                                                </option>
                                                            @endforeach
                                                            </select>
                                                            @error('course_id')<span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Year Level</label>
                                                            <select class="form-select" name="year">
                                                                <option value="First Year"  {{ ($student->year == "First Year") ? 'selected' : '' }}>First Year</option>
                                                                <option value="Second Year" {{ ($student->year == "Second Year") ? 'selected' : '' }}>Second Year</option>
                                                                <option value="Third Year"  {{ ($student->year == "Third Year") ? 'selected' : '' }}>Third Year</option>
                                                                <option value="Fourth Year" {{ ($student->year == "Fourth Year") ? 'selected' : '' }}>Fourth Year</option>
                                                                <option value="Fifth Year"  {{ ($student->year == "Fifth Year") ? 'selected' : '' }}>Fifth Year</option>
                                                            </select>
                                                            @error('year')<span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">First Name</label>
                                                            <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{$student->first_name}}">
                                                            @error('first_name')<span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Middle Name</label>
                                                            <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" value="{{$student->middle_name}}">
                                                            @error('middle_name')<span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Last Name</label>
                                                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{$student->last_name}}">
                                                            @error('last_name')<span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Mobile Number</label>
                                                            <input type="text" class="form-control" name="mobile_number" placeholder="Mobile Number" value="{{$student->mobile_number}}">
                                                            @error('mobile_number')<span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Email Address</label>
                                                            <input type="email" class="form-control" name="email_address" placeholder="Email Address" value="{{$student->email_address}}">
                                                            @error('email_address')<span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box-body -->
                                            <div class="box-footer text-end">
                                                <button type="reset" class="btn btn-warning me-1">
                                                    <i class="ti-trash"></i> Clear
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="ti-save-alt"></i> Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
</div>
@endsection
