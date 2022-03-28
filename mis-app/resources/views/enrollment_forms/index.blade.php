@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h3 class="page-title">Enrollment Student</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="assets/#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Enrollment</li>
                                <li class="breadcrumb-item active" aria-current="page">List of Enrollment</li>
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
                            <h4 class="box-title"><strong>Enrollment</strong> List</h4>
                            
                        </div>
                        <div class="box-body">
							<div class="table-responsive">
								<table class="table">
									<thead class="bg-info">
										<tr>
                                            <th>Student Number</th>
                                            <th>Name</th>
                                            <th>Course</th>
                                            <th>Year</th>
                                            <th>Active School Year and Semester</th>
                                            <th>Balance</th>
                                            <th>Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($enrollment_forms as $enrollment_form)
                                        <tr>
                                            <td>{{ $enrollment_form->id }}</td>
                                            <td>
                                                <a class="btn waves-effect waves-light btn btn-outline btn-info mb-5" href="{{ route('enrollment-forms.edit',$enrollment_form->id) }}">Manage</a>
                                            </td>
                                        </tr>
                                        @endforeach
									</tbody>
								</table>
                                
							</div>
                            {!! $enrollment_forms->links() !!}
						</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->	  
    </div>
</div>
@endsection		  