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
                                <li class="breadcrumb-item active" aria-current="page">List of Courses</li>
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
                            <a href="/courses/create" class="btn btn-success" type="button"> <span><i class="fa fa-edit"></i> Add Course</span>  </a>
                            </div>
                            <h4 class="box-title"><strong>Courses</strong> List</h4>
                        </div>
                        <div class="box-body">
							<div class="table-responsive">
								<table class="table">
									<thead class="bg-info">
										<tr>
                                            <th>Name</th>
                                            <th>Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($courses as $course)
                                        <tr>
                                            <td>{{ $course->name }}</td>
                                            <td>
                                                <a class="btn waves-effect waves-light btn btn-outline btn-info mb-5" href="{{ route('courses.edit',$course->id) }}">Manage</a>
                                            </td>
                                        </tr>
                                        @endforeach
									</tbody>
								</table>

							</div>
                            {!! $courses->links() !!}
						</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>
@endsection
