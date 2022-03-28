@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <h3 class="page-title">Subject</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="assets/#"><i class="mdi mdi-home-outline"></i></a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">Subjects</li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Subject</li>
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
                            <div class="box-header">
                                <h4 class="box-title"><strong>Subject</strong> Form</h4>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <form action="{{ route('subjects.update' , $subject->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="form-label">Year Level</label>
                                                                <select class="form-select" name="year_level">
                                                                    <option value="First Year"  {{ ($subject->year_level == "First Year") ? 'selected' : '' }}>First Year</option>
                                                                    <option value="Second Year" {{ ($subject->year_level == "Second Year") ? 'selected' : '' }}>Second Year</option>
                                                                    <option value="Third Year"  {{ ($subject->year_level == "Third Year") ? 'selected' : '' }}>Third Year</option>
                                                                    <option value="Fourth Year" {{ ($subject->year_level == "Fourth Year") ? 'selected' : '' }}>Fourth Year</option>
                                                                </select>
                                                                @error('year_level')<span
                                                                    class="text-danger">{{ $message }}</span>@enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Semester</label>
                                                                <select class="form-select" name="semester">
                                                                    <option value="First Semester"  {{ ($subject->semester == "First Semester") ? 'selected' : '' }}>First Semester</option>
                                                                    <option value="Second Semester" {{ ($subject->semester == "Second Semester") ? 'selected' : '' }}>Second Semester</option>
                                                                    <option value="Summer"          {{ ($subject->semester == "Summer") ? 'selected' : '' }}>Summer</option>
                                                                </select>
                                                                @error('year_level')<span
                                                                    class="text-danger">{{ $message }}</span>@enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Course Code</label>
                                                                <input type="text" class="form-control" name="course_code"
                                                                    placeholder="" value="{{ $subject->course_code }}">
                                                                @error('course_code')<span
                                                                    class="text-danger">{{ $message }}</span>@enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Description</label>
                                                                <input type="text" class="form-control" name="name"
                                                                    placeholder="" value="{{ $subject->name }}">
                                                                    @error('name')<span
                                                                    class="text-danger">{{ $message }}</span>@enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Units</label>
                                                                <select class="form-select" name="units" id="sel-units">
                                                                    <option value="1" {{ ($subject->units == "1") ? 'selected' : '' }}>1</option>
                                                                    <option value="2" {{ ($subject->units == "2") ? 'selected' : '' }}>2</option>
                                                                    <option value="3" {{ ($subject->units == "3") ? 'selected' : '' }}>3</option>
                                                                </select>
                                                                @error('units')<span
                                                                    class="text-danger">{{ $message }}</span>@enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="c-inputs-stacked">
                                                                    <input type="checkbox" id="checkbox_1" name="has_lab" {{ ($subject->has_lab == "1") ? 'checked' : '' }}>
                                                                    <label for="checkbox_1" class="me-30">Has
                                                                        Laboratory</label>
                                                                        @error('has_lab')<span
                                                                    class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
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
