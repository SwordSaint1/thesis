@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <h3 class="page-title">Course</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="assets/#"><i class="mdi mdi-home-outline"></i></a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">Courses</li>
                                    <li class="breadcrumb-item active" aria-current="page">Manage Course</li>
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
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                            {{ $message }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="box-header">
                                <h4 class="box-title"><strong>Courses</strong> Form</h4>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <form action="{{ route('courses.update', $course->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Course Name</label>
                                                                <input type="text" class="form-control" name="name"
                                                                    placeholder="Course Name" value="{{ $course->name }}">
                                                                @error('name')<span
                                                                    class="text-danger">{{ $message }}</span>@enderror
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
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="box">
                                            <div class="box-header with-border">
                                                <div class="pull-right">
                                                    <a href="/courses/{{ $course->id }}/subjects/create"
                                                        class="btn btn-success" type="button"> <span><i
                                                                class="fa fa-edit"></i> Add Subject</span> </a>
                                                </div>
                                                <h4 class="box-title"><strong>Subject</strong> List</h4>
                                            </div>
                                            <div class="box-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead class="bg-info">
                                                            <tr>
                                                                <th>Year and Semester</th>
                                                                <th>Course Code</th>
                                                                <th>Description</th>
                                                                <th>Units</th>
                                                                <th>Has Laboratory</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($subjects as $subject)
                                                                <tr>
                                                                    <td>{{ $subject->year_level }} -
                                                                        {{ $subject->semester }}</td>
                                                                    <td>{{ $subject->course_code }}</td>
                                                                    <td>{{ $subject->name }}</td>
                                                                    <td>{{ $subject->units }}</td>
                                                                    <td>{{ $subject->has_lab == 1 ? 'YES' : 'NO' }}</td>
                                                                    <td>
                                                                        <a class="btn waves-effect waves-light btn btn-outline btn-info mb-5"
                                                                            href="{{ route('subjects.edit', $subject->id) }}">Manage</a>
                                                                        <form
                                                                            action="{{ route('subjects.destroy', $subject->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button
                                                                                class="btn waves-effect waves-light btn btn-outline btn-danger mb-5"
                                                                                type="submit">Remove</button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
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
