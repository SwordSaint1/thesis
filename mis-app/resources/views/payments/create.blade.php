@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <h3 class="page-title">Payments</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="assets/#"><i class="mdi mdi-home-outline"></i></a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">Payments</li>
                                    <li class="breadcrumb-item active" aria-current="page">Enroll</li>
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
                                <h4 class="box-title"><strong>Payment</strong> Form</h4>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body wizard-content">
                                <div action="#" class="validation-wizard wizard-circle">
                                    <!-- Step 1 -->
                                    <section>
                                        <form id="form-search-student" onsubmit="return false">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Student Number</label>

                                                        <input id="inp-student_number" type="text" class="form-control"
                                                            name="student_number" placeholder="Student Number"
                                                            value="{{ old('student_number') }}">
                                                        <code id="no-result" style="display: none;">NO STUDENT RECORD FOUND
                                                        </code>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <button type="submit"
                                                            class="waves-effect waves-light btn btn-outline btn-info mb-5 mt-4"
                                                            id="btn-search-student">Search Student</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                        <hr class="my-15">
                                        <form id="form-student" onsubmit="return false">
                                            <div class="row">
                                                <h4 class="box-title text-info mb-0">Student Information</h4><br><br>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Course</label>
                                                        <select class="form-select" name="course_id" disabled>
                                                            <option value="">Select Course</option>
                                                            @foreach ($courses as $course)
                                                                <option value="{{ $course->id }}"
                                                                    {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                                                    {{ $course->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('course_id')<span
                                                            class="text-danger">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Year Level</label>
                                                        @error('year')<span
                                                            class="text-danger">{{ $message }}</span>@enderror
                                                        <label class="form-label"> Year Level </label>
                                                        <select class="form-select" name="year" disabled>
                                                            <option value="First Year"
                                                                {{ old('year') == 'First Year' ? 'selected' : '' }}
                                                                selected>First Year</option>
                                                            <option value="Second Year"
                                                                {{ old('year') == 'Second Year' ? 'selected' : '' }}>
                                                                Second Year</option>
                                                            <option value="Third Year"
                                                                {{ old('year') == 'Third Year' ? 'selected' : '' }}>
                                                                Third Year</option>
                                                            <option value="Fourth Year"
                                                                {{ old('year') == 'Fourth Year' ? 'selected' : '' }}>
                                                                Fourth Year</option>
                                                            <option value="Fifth Year"
                                                                {{ old('year') == 'Fifth Year' ? 'selected' : '' }}>
                                                                Fifth Year</option>
                                                        </select>
                                                        @error('year')<span
                                                            class="text-danger">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">First Name</label>
                                                        <input type="text" class="form-control" name="first_name"
                                                            placeholder="First Name" value="{{ old('first_name') }}"
                                                            disabled>
                                                        @error('first_name')<span
                                                            class="text-danger">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Middle Name</label>
                                                        <input type="text" class="form-control" name="middle_name"
                                                            placeholder="Middle Name" value="{{ old('middle_name') }}"
                                                            disabled>
                                                        @error('middle_name')<span
                                                            class="text-danger">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" name="last_name"
                                                            placeholder="Last Name" value="{{ old('last_name') }}"
                                                            disabled>
                                                        @error('last_name')<span
                                                            class="text-danger">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Mobile Number</label>
                                                        <input type="text" class="form-control" name="mobile_number"
                                                            placeholder="Mobile Number" value="{{ old('mobile_number') }}"
                                                            disabled>
                                                        @error('mobile_number')<span
                                                            class="text-danger">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Email Address</label>
                                                        <input type="email" class="form-control" name="email_address"
                                                            placeholder="Email Address" value="{{ old('email_address') }}"
                                                            disabled>
                                                        @error('email_address')<span
                                                            class="text-danger">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </section>
                                    <hr class="my-15">
                                    <!-- Step 2 -->
                                    <section id="section-no-payment" style="display:none;" class="text-center">
                                        <h4 class="box-title text-info mb-0">No Enrollment Record Found</h4><br><br>
                                    </section>
                                    <section id="section-payment" style="display:none;">
                                        <h4 class="box-title text-info mb-0">Payments Info</h4><br><br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Date Enroll: <span id="created_at">
                                                            January 01, 2021 </span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <p>Academic Year: <span id="academic_year"> 2020 - 2021 </span></label>
                                                    <p>Semester: <span id="semester"> 1st Semster </span></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <p>Total Fees: Php <span id="total_fee">-</span></p>
                                                    <p>Total Discounts: Php <span id="total_discount">-</span></p>
                                                    <p>Total Payable: Php <span id="total_payable">-</span></p>
                                                    <p>Total Payments: Php <span id="total_payments">-</span></p>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Balance: <span> Php <span
                                                                id="total_balance">-</span> </span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row no-print">
                                            <div class="col-12">
                                                <button class="btn btn-info pull-right" data-id="1" type="button"
                                                    id="btn-enrollment-scholarship"> <span><i class="fa fa-id-card-o"></i>
                                                        Scholarship</span> </button>
                                                <button type="button" class="btn btn-success pull-right"
                                                    data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><i
                                                        class="fa fa-credit-card"></i> Make Payment
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-bordered" id="tbody-history">
                                                    <thead>
                                                        <tr>
                                                            <th>OR Number</th>
                                                            <th>Description</th>
                                                            <th>Date</th>
                                                            <th class="text-end">Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody-records">
                                                        <tr>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td class="text-end">-</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
            </section>
            <!-- /.content -->
        </div>
    </div>


    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Payment Form</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Payment</strong> Details</h4>
                        </div>
                        <div class="box-body">
                            <form id="form-payment">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">OR Number</label>
                                            <input type="text" class="form-control" name="or_number" placeholder=""
                                                value="">
                                            <code class="error-or">OR NUMBER WAS ALREADY USED</code>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Payment Type</label>
                                            <select class="form-select sel-payment_type" name="payment_type"
                                                id="sel-payment_type">
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Amount</label>
                                            <input type="text" class="form-control" name="amount" placeholder="" id="form-payment-amount"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group text-center">
                                            <!-- <label class="form-label">Outstanding Balance: <span> Php 7,500.00 </span></label> -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary float-end" id="submit-payment">Submit Payment</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade modal-scholar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Scholarship Form</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Scholar</strong> Details</h4>
                        </div>
                        <div class="box-body">
                            <form id="form-scholarship">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">OR Number</label>
                                            <input type="text" class="form-control" name="or_number" placeholder=""
                                                value="">
                                            <code class="error-or">OR NUMBER WAS ALREADY USED</code>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Scholarship Type</label>
                                            <select class="form-select sel-scholarship_type" name="payment_type"
                                                id="sel-scholar_type">
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Amount</label>
                                            <input type="text" class="form-control" name="amount" placeholder=""
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group text-center">
                                            <!-- <label class="form-label">Outstanding Balance: <span> Php 7,500.00 </span></label> -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary float-end" id="submit-scholarship">Submit Scholarship</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <script src="/assets/js/modules/payment.js"></script>
@endsection
