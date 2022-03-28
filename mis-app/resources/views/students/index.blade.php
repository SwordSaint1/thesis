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
                                    <li class="breadcrumb-item"><a href="assets/#"><i class="mdi mdi-home-outline"></i></a>
                                    </li>
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
                                <div class="row">
                                    
                                        <div class="col-3">
                                           <h4 class="box-title"><strong>Student</strong> List</h4>
                                        </div>
                                         <div class="col-3">
                                            <form method="POST" enctype="multipart/form-data" action="{{route('student.import')}}">
                                                @csrf
                                      <input type="file" name="file" class="form-control" accept=".csv" />
                                        </div>
                                         <div class="col-2">
                                      <input type="submit" name="" class="btn btn-primary" value="Upload">
                                      </form>
                                        </div>
                                         <div class="col-4">
                                             <a href="/students/create" class="btn btn-success" type="button"> <span><i
                                                class="fa fa-edit"></i> Register&nbsp;Student</span> </a>
                                        </div>
                                    
                                </div>
                                
                               
                              <!--   

                                <div class="pull-right">
                                   
                                </div>
                              
                                 <div class="pull-right">
                                    <a href="/students/create" class="btn btn-success" type="button"> <span><i
                                                class="fa fa-edit"></i> Register Student</span> </a>
                                </div> -->
                                
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table" id="student-table">
                                        <thead class="bg-info">
                                            <tr>
                                                <th>Student Number</th>
                                                <th>Name</th>
                                                <th>Course</th>
                                                <th>Year Level</th>
                                                <th>Balance</th>
                                                <th>Scholarships</th>
                                                <th>Payments</th>
                                                <th class="noExport">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($students as $student)
                                                <tr>
                                                    <td>{{ $student->student_number }}</td>
                                                    <td>{{ $student->last_name }}, {{ $student->first_name }}
                                                        {{ $student->middle_name }}</td>
                                                    <td>{{ $student->course->name }}</td>
                                                    <td>{{ $student->year }}</td>
                                                    <td>{!! $student->balance !!}</td>
                                                    <td>
                                                        @if (isset($student->enrollment_form->last()->payment))
                                                            <ul>
                                                                @foreach (collect($student->enrollment_form->last()->payment)->where('payment_type_id', 3)->unique('payment_type')
        as $scholarship)
                                                                    <li>{{ $scholarship->payment_type }}</li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (isset($student->enrollment_form->last()->payment))
                                                            <ul>
                                                                @foreach (collect($student->enrollment_form->last()->payment)->where('payment_type_id', null)->unique('payment_type')
        as $scholarship)
                                                                    <li>{{ $scholarship->payment_type }}</li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a class="btn waves-effect waves-light btn btn-outline btn-warning mb-5"
                                                            data-link="{{ route('students.destroy', $student->id) }}"
                                                            href="#" data-id="{{ $student->id }}">Delete</a>
                                                        <a class="btn waves-effect waves-light btn btn-outline btn-info mb-5"
                                                            href="{{ route('students.show', $student->id) }}">Manage</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                {{-- {!! $students->links() !!} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#student-table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'print'
                ]
            });

            $("#student-table").delegate(".btn-warning", "click", function() {
                let _id = $(this).attr("data-link");
                console.log(_id);
                $("#form-delete-student").attr('action', _id);
                $("#mdl-delete-student").modal('show');
            });



        });
    </script>
    <div class="modal fade modal-delete-student" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true" id="mdl-delete-student">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Are you sure you want to delete this student?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <form action="" method="POST" id="form-delete-student">
                        @method('DELETE')
                        @csrf
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <button type="submit" class="btn btn-primary float-end" id="a-href-delete">Delete Student</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
