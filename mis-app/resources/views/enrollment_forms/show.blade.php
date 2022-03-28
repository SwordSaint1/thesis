@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <h3 class="page-title">Assessment Details</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="assets/#"><i class="mdi mdi-home-outline"></i></a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">Assessment</li>
                                    <li class="breadcrumb-item active" aria-current="page">Assessment Form Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <section class="invoice printableArea">
                <div class="row">
                    <div class="col-12 row no-print">
                        <div class="bb-1 clearFix">
                            <div class="text-end pb-15">
                                <a class="btn btn-danger" data-id="{{ $enrollmentForm->id }}" type="button"
                                    href="/enrollment-form/{{ $enrollmentForm->id }}/edit"> <span><i class="fa fa-id-card-o"></i>
                                        Update</span> </a>
                                <button class="btn btn-info" data-id="{{ $enrollmentForm->id }}" type="button"
                                    id="btn-enrollment-scholarship"> <span><i class="fa fa-id-card-o"></i>
                                        Scholarship</span> </button>
                                <button class="btn btn-success" data-id="{{ $enrollmentForm->id }}" type="button"
                                    id="btn-enrollment-payment"> <span><i class="fa fa-credit-card"></i> Payment</span>
                                </button>
                                <button id="print2" class="btn btn-warning" type="button"> <span><i
                                            class="fa fa-print"></i> Print</span> </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="page-header">
                            <h2 class="d-inline"><span class="fs-30">Assessment Form</span></h2>
                            <div class="pull-right text-end">
                                <h3>{{ $enrollmentForm->created_at }}</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row invoice-info">
                    <div class="col-md-6 invoice-col">
                        <!-- <strong>Student Information</strong>	 -->
                        <address>
                            <strong class="text-blue fs-24">{{ $enrollmentForm->student->last_name }},
                                {{ $enrollmentForm->student->first_name }}
                                {{ $enrollmentForm->student->middle_name }}</strong><br>
                            <!-- <strong>Course: {{ $enrollmentForm->student->course->name }} &nbsp;&nbsp;&nbsp;&nbsp; <br>Year Level: {{ $enrollmentForm->student->year }}</strong>  <br> -->
                            <!-- <strong>Semester: {{ $enrollmentForm->semester }} &nbsp;&nbsp;&nbsp;&nbsp; Academic Year: {{ $enrollmentForm->academic_year }}</strong>   -->
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6 invoice-col text-end">
                        <!-- <strong>To</strong>
                           <address>
                            <strong class="text-blue fs-24">Doe Shina</strong><br>
                            124 Lorem Ipsum, Suite 478, Dummuy, USA 123456<br>
                            <strong>Phone: (00) 789-456-1230 &nbsp;&nbsp;&nbsp;&nbsp; Email: conatct@example.com</strong>
                           </address> -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-12 invoice-col mb-15">
                        <div class="invoice-details row no-margin">
                            <div class="col-md-6 col-lg-4"><b>Course:</b> {{ $enrollmentForm->student->course->name }}
                            </div>
                            <div class="col-md-6 col-lg-2"><b>Year Level: </b>{{ $enrollmentForm->student->year }}</div>
                            <div class="col-md-6 col-lg-2"><b>Academic Year:</b> {{ $enrollmentForm->academic_year }}
                            </div>
                            <div class="col-md-6 col-lg-2"><b>Semester: </b>{{ $enrollmentForm->semester }}</div>
                            <div class="col-md-6 col-lg-2"><b>Encoded By: </b>{{ $enrollmentForm->user->name }}</div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Course Code</th>
                                    <th>Descriptive Title</th>
                                    <th>Units</th>
                                </tr>

                                @forelse($enrollmentForm->details as $indexKey => $detail)

                                    <tr>
                                        <td>{{ $indexKey + 1 }}</td>
                                        <td>{{ $detail->subject->course_code }}</td>
                                        <td>{{ $detail->subject->name }}</td>
                                        <td>{{ $detail->subject->units }}</td>
                                    </tr>

                                @empty
                                @endforelse
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Total Units</th>
                                    <th>{{ $enrollmentForm->total_units }}</th>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-4 text-start">
                        <div class="row">
                            <div class="col-6">
                                <p>Tuition Fees : </p>
                            </div>
                            <div class="col-6">
                                <p>Php{{ number_format($enrollmentForm->tuition_fee, 2, '.', ',') }}</p>
                            </div>
                            <div class="col-6">
                                <p>Lab. Fee : </p>
                            </div>
                            <div class="col-6">
                                <p>Php{{ number_format($enrollmentForm->lab_fee, 2, '.', ',') }}</p>
                            </div>
                            <div class="col-6">
                                <p>MISC. Fee : </p>
                            </div>
                            <div class="col-6">
                                <p>Php{{ number_format($enrollmentForm->misc_fee, 2, '.', ',') }}</p>
                            </div>
                            <div class="col-6">
                                <p>NSTP Fee : </p>
                            </div>
                            <div class="col-6">
                                <p>Php{{ number_format($enrollmentForm->nstp_fee, 2, '.', ',') }}</p>
                            </div>
                            <div class="col-6">
                                <p>Others Fee : </p>
                            </div>
                            <div class="col-6">
                                <p>Php{{ number_format($enrollmentForm->others_fee, 2, '.', ',') }}</p>
                            </div>
                            <div class="col-6">
                                <p> <strong> Sub Total : </strong> </p>
                                <hr>
                            </div>
                            <div class="col-6">
                                <p>Php{{ number_format($enrollmentForm->total_fee, 2, '.', ',') }}</p>
                            </div>

                            <div class="col-12">
                                <p> <strong>   Discount :  </strong> </p>
                            </div>
                            @if ($enrollmentForm->is_discount_30_pecent == 1)
                                <div class="col-6">
                                    <p>DISCOUNT 30% (1YR. 2021-2022) : </p>
                                </div>
                                <div class="col-6">
                                    <p>Php{{ number_format($enrollmentForm->tuition_fee * 0.3, 2, '.', ',') }}</p>
                                </div>
                            @endif

                            @if ($enrollmentForm->is_discount_50_pecent == 1)
                                <div class="col-6">
                                    <p>DISCOUNT 50 % (1YR. 2021-2022): </p>
                                </div>
                                <div class="col-6">
                                    <p>Php{{ number_format($enrollmentForm->tuition_fee * 0.5, 2, '.', ',') }}</p>
                                </div>
                            @endif

                            @if ($enrollmentForm->is_discount_cash_full == 1)
                                <div class="col-6">
                                    <p>CASH FULL 8%: </p>
                                </div>
                                <div class="col-6">
                                    <p>Php{{ number_format($enrollmentForm->tuition_fee * 0.08, 2, '.', ',') }}</p>
                                </div>
                            @endif

                            @if ($enrollmentForm->is_discount_siblings == 1)
                                <div class="col-6">
                                    <p>SIBLINGS (5%): </p>
                                </div>
                                <div class="col-6">
                                    <p>Php{{ number_format($enrollmentForm->tuition_fee * 0.05, 2, '.', ',') }}</p>
                                </div>
                            @endif

                            @if ($enrollmentForm->is_discount_aim_global == 1)
                                <div class="col-6">
                                    <p>AIM GLOBAL 30%: </p>
                                </div>
                                <div class="col-6">
                                    <p>Php{{ number_format($enrollmentForm->tuition_fee * 0.3, 2, '.', ',') }}</p>
                                </div>
                            @endif

                            @if ($enrollmentForm->is_discount_lab_fee == 1)
                                <div class="col-6">
                                    <p>LABORATORY FEES 50% DISCOUNT: </p>
                                </div>
                                <div class="col-6">
                                    <p>Php{{ number_format($enrollmentForm->lab_fee * 0.5, 2, '.', ',') }}</p>
                                </div>
                            @endif

                            <div class="col-6">
                                <p> <strong>  Discount : </strong> </p>
                            </div>
                            <div class="col-6">
                                <p>Php{{ number_format($enrollmentForm->total_discount, 2, '.', ',') }}</p>
                            </div>
                        </div>
                        <div class="total-payment">
                            <h3 style="font-size:1rem;"><b>Total Fee:</b>
                                Php{{ number_format($enrollmentForm->total_payable, 2, '.', ',') }}</h3>
                        </div>
                    </div>
                    <div class="col-4 text-start">
                        <div class="row">
                            <div class="col-4">
                                <p>Prelim Due : </p>
                            </div>
                            <div class="col-8">
                                <p>Php{{ number_format(floatval($enrollmentForm->total_payable) / 4, 2, '.', ',') }}</p>
                            </div>
                            <div class="col-4">
                                <p>Midterm Due : </p>
                            </div>
                            <div class="col-8">
                                <p>Php{{ number_format((floatval($enrollmentForm->total_payable) / 4) * 2, 2, '.', ',') }}
                                </p>
                            </div>
                            <div class="col-4">
                                <p>Semi-Finals Due : </p>
                            </div>
                            <div class="col-8">
                                <p>Php{{ number_format((floatval($enrollmentForm->total_payable) / 4) * 3, 2, '.', ',') }}
                                </p>
                            </div>
                            <div class="col-4">
                                <p>Finals Due : </p>
                            </div>
                            <div class="col-8">
                                <p>Php{{ number_format($enrollmentForm->total_payable, 2, '.', ',') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 text-start">
                        <p><b>Payment History</b></p>
                        <div class="row">
                            @forelse($enrollmentForm->payment as $indexKey => $payment)
                                <div class="col-7">
                                    <hr>
                                </div>
                                <div class="col-4"></div>
                                <div class="col-6">
                                    <p>Date: {{ $payment->created_at }}</p>
                                </div>
                                <div class="col-6">
                                    <p>OR No.: {{ $payment->or_no }}</p>
                                </div>
                                <div class="col-6">
                                    <p>{{ $payment->payment_type }} : </p>
                                </div>
                                <div class="col-6">
                                    <p>Php{{ number_format($payment->amount, 2, '.', ',') }}</p>
                                </div>
                                <div class="col-12">
                                    <p>Prepared By: {{ $payment->user->name }}</p>
                                </div>
                            @empty
                                <p>--- n/a ---</p>
                            @endforelse
                        </div>
                        <div class="total-payment">
                            <h3><b>Balance :</b> Php{{ number_format($enrollmentForm->total_balance, 2, '.', ',') }}</h3>
                        </div>
                    </div>
                    <!-- /.col -->
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
