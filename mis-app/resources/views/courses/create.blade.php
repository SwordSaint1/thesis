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
                                <li class="breadcrumb-item"><a href="assets/#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Courses</li>
                                <li class="breadcrumb-item active" aria-current="page">Add Course</li>
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
                            <h4 class="box-title"><strong>Course</strong> Form</h4>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <form action="{{ route('courses.store') }}" method="POST">
                                            @csrf
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Course</label>
                                                            <input type="text" class="form-control" name="name" placeholder="Course Name" value="{{old('name')}}">
                                                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
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
