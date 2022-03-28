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
                                <li class="breadcrumb-item active" aria-current="page">List of Students</li>
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
                        <div class="box-header with-border">
                            <div class="pull-right">
                            <a href="/students/create" class="btn btn-success" type="button"> <span><i class="fa fa-edit"></i> Register Student</span>  </a>   
                            </div>
                            <h4 class="box-title"><strong>Student</strong> List</h4>
                        </div>
                        <div class="box-body">
							<div class="table-responsive">
								<table class="table">
									<thead class="bg-info">
										<tr>
                                            <th>Student Number</th>
                                            <th>Name</th>
                                            <th>Course</th>
                                            <th>Year Level</th>
                                            <th>Balance</th>
                                            <th>Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $student->student_number }}</td>
                                            <td>{{ $student->last_name }}, {{ $student->first_name }} {{ $student->middle_name }}</td>
                                            <td>{{ $student->course->name }}</td>
                                            <td>{{ $student->year }}</td>
                                            <td>{{ $student->balance }}</td>
                                            <td>
                                                <a class="btn waves-effect waves-light btn btn-outline btn-info mb-5" href="{{ route('students.show',$student->id) }}">Manage</a>
                                            </td>
                                        </tr>
                                        @endforeach
									</tbody>
								</table>
                                
							</div>
                            {!! $students->links() !!}
						</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->	  
    </div>
</div>
@endsection		  