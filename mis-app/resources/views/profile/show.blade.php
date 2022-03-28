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
                                <li class="breadcrumb-item active" aria-current="page">Student Records</li>
                            </ol>
                        </nav>
                    </div>
                </div>				
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="box">

                <div class="box-header with-border">
					  <div class="pull-right">
                      <a href="{{$student->id}}/edit" class="btn btn-success" type="button"> <span><i class="fa fa-edit"></i> Manage</span>  </a>   
					  </div>
                      <h4 class="box-title"><strong>Student</strong> Details</h4>
				</div>
                
                <!-- /.box-header -->
                <div class="box-body">
               
                    <div class="row invoice-info">
                        <div class="col-md-6 invoice-col">
                            <address>
                                <strong class="text-blue fs-24">{{$student->last_name}}, {{$student->first_name}} {{$student->middle_name}}</strong><br>
                                <strong>Mobile Number: {{$student->mobile_number}}  &nbsp;&nbsp;&nbsp;&nbsp; Email: {{$student->email_address}}</strong>  
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6 invoice-col text-end">
                            <address>
                                <strong> Course: {{$student->course->name}}</strong><br>
                                <strong> Year: {{$student->year}} </strong> 
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-12 invoice-col mb-15">
                            <div class="invoice-details row no-margin">
                                <div class="col-md-6 col-lg-3"><b>Student Number: </b>{{$student->student_number}}</div>
                                <div class="col-md-6 col-lg-3">
                                    <!-- <b>Payment Due:</b> 14/08/2018 -->
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <!-- <b>Account:</b> 00215487541296 -->
                                </div>
                                <div class="col-md-6 col-lg-3"> 
                                    <b>Outstanding Balance:</b> Php {{$enrollment_form->total_balance ?? '0' }}
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs customtab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class="ion-home"></i></span> <span class="hidden-xs-down">Assessment History</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#profile2" role="tab"><span class="hidden-sm-up"><i class="ion-person"></i></span> <span class="hidden-xs-down">Transactions</span></a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home2" role="tabpanel">
                            <div class="p-15">
                                <div class="box">
                                    <div class="box-body">
                                        <h4 class="box-title">Assessment History</h4>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-success">
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Course</th>
                                                        <th>Academic Year</th>
                                                        <th>Semester</th>
                                                        <th>Total Units</th>
                                                        <th>Total Fee</th>
                                                        <th>Total Discount</th>
                                                        <th>Total Payable</th>
                                                        <th>Total Payments</th>
                                                        <th>Balance</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($student->enrollment_form->reverse() as $enrollment_form)

                                                    <tr>
                                                        <td>{{$enrollment_form->created_at}}</td>
                                                        <td>{{$enrollment_form->course->name}}</td>
                                                        <td>{{$enrollment_form->academic_year}}</td>
                                                        <td>{{$enrollment_form->semester}}</td>
                                                        <td>{{$enrollment_form->total_units}}</td>
                                                        <td>Php{{$enrollment_form->total_fee}}</td>
                                                        <td>Php{{$enrollment_form->total_discount}}</td>
                                                        <td>Php{{$enrollment_form->total_payable}}</td>
                                                        <td>Php{{$enrollment_form->total_payments}}</td>
                                                        <td>Php{{$enrollment_form->total_balance}}</td>
                                                        <td>    
                                                            <a class="btn waves-effect waves-light btn btn-outline btn-info mb-5" href="{{ route('enrollment-form.show',$enrollment_form->id) }}">Details</a>
                                                        </td>
                                                    </tr>

                                                    @empty
                                                        <p class="text-center">NO ASSESSMENT HISTORY FOUND</p>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="profile2" role="tabpanel">
                            <div class="p-15">
                                <div class="box">
                                    <div class="box-body">
                                        <h4 class="box-title">Payment History</h4>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-success">
                                                    <tr>
                                                        <th>OR Number</th>
                                                        <th>Description</th>
                                                        <th>Date</th>
                                                        <th class="text-end">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($student->enrollment_form->reverse() as $enrollment_form)

                                                    @forelse($enrollment_form->payment->reverse() as $payment)
                                                    <tr>
                                                        <td>{{$payment->or_no}}</td>
                                                        <td>{{$payment->payment_type}}</td>
                                                        <td>{{$payment->created_at}}</td>
                                                        <td>Php{{$payment->amount}}</td>
                                                    </tr>
                                                    @empty
                                                    @endforelse

                                                    @empty
                                                    <p class="text-center">NO TRANSACTION HISTORY FOUND</p>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->	  
    </div>
</div>
@endsection		  