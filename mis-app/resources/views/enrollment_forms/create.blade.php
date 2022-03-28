@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <h3 class="page-title">Assessment</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="assets/#"><i class="mdi mdi-home-outline"></i></a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">Assessment</li>
                                    <li class="breadcrumb-item active" aria-current="page">Assessment</li>
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
                                <h4 class="box-title"><strong>Assessment</strong> Form</h4>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body wizard-content">
                                <div action="#" class="tab-wizard wizard-circle">
                                    <!-- Step 1 -->
                                    <h6>Student Info</h6>
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
                                                            {{-- <option value="Fifth Year" {{ (old('year') == "Fifth Year") ? 'selected' : '' }}>Fifth Year</option> --}}
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
                                                            placeholder="Mobile Number"
                                                            value="{{ old('mobile_number') }}" disabled>
                                                        @error('mobile_number')<span
                                                            class="text-danger">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Email Address</label>
                                                        <input type="email" class="form-control" name="email_address"
                                                            placeholder="Email Address"
                                                            value="{{ old('email_address') }}" disabled>
                                                        @error('email_address')<span
                                                            class="text-danger">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </section>
                                    <!-- Step 2 -->
                                    <h6>Enrollment Info</h6>
                                    <section>
                                        <form id="form-enrollment-info" onsubmit="return false">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Course</label>
                                                        <select class="form-select" name="course_id">
                                                            @foreach ($courses as $course)
                                                                <option value="{{ $course->id }}"
                                                                    {{ old('academic_year') == $course->id ? 'selected' : '' }}>
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
                                                        <label class="form-label"> Year Level </label>
                                                        <select class="form-select" name="year_level">
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
                                                            {{-- <option value="Fifth Year" {{ (old('year') == "Fifth Year") ? 'selected' : '' }}>Fifth Year</option> --}}
                                                        </select>
                                                        @error('year_level')<span
                                                            class="text-danger">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Academic Year</label>
                                                        <input type="text" class="form-control" name="academic_year"
                                                            placeholder="e.g. 2020-2021" value="2020-2021">
                                                        @error('academic_year')<span
                                                            class="text-danger">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Semester</label>
                                                        <select class="form-select" name="semester">
                                                            <option value="First Semester"
                                                                {{ old('semester') == 'First Semester' ? 'selected' : '' }}
                                                                selected>First Semester</option>
                                                            <option value="Second Semester"
                                                                {{ old('semester') == 'Second Semester' ? 'selected' : '' }}>
                                                                Second Semester</option>
                                                            <option value="Summer"
                                                                {{ old('semester') == 'Summer' ? 'selected' : '' }}>
                                                                Summer</option>
                                                        </select>
                                                        @error('semester')<span
                                                            class="text-danger">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </section>
                                    <!-- Step 3 -->
                                    <h6>Subjects and Units</h6>
                                    <section id="container-subjects-units">

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="bb-1 clearFix">
                                                    <div class="text-end pb-15">

                                                        <h4 class="box-title" style="margin-right: 3rem;">
                                                                @foreach ($courses as $course)
                                                                    <select id="c-{{ $course->id }}"
                                                                        class="select2 sel-subjects form-select"
                                                                        style="display: none;">
                                                                        <option value="">Select Subjects</option>

                                                                        @foreach ($course->subjects as $indexKey => $subject)
                                                                            <option value="{{ $subject->id }}"
                                                                                data-class="tr-sub-{{ $course->id }}-{!! str_replace(' ', '_', $subject->semester) !!}-{!! str_replace(' ', '_', $subject->year_level) !!}">
                                                                                {{ $subject->course_code }} -
                                                                                {{ $subject->name }}</option>
                                                                        @endforeach
                                                                    </select>

                                                                @endforeach
                                                            </span>
                                                        </h4>
                                                        <button type="button" id="btn-add_subjects"
                                                            class="waves-effect waves-light btn btn-outline btn-success-light mb-5 pl-3 ml-3"><span><i
                                                                    class="fa fa-plus"></i> Add </span>
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="bb-1 clearFix">
                                                    <div class="text-end pb-15">
                                                        <h4 class="box-title" style="margin-right: 3rem;">
                                                            <strong>Total
                                                                Units:</strong> <span id="lbl-total_units">0</span>
                                                        </h4>
                                                        <button type="button" id="btn-reset_subjects"
                                                            class="waves-effect waves-light btn btn-outline btn-success-light mb-5 pl-3 ml-3"><span><i
                                                                    class="fa fa-refresh"></i> Reset </span> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table" id="table-subjects">
                                                <thead class="bg-success">
                                                    <tr>
                                                        <th>Subject</th>
                                                        <th class="text-center">Units</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($courses as $course)
                                                        @foreach ($course->subjects as $indexKey => $subject)
                                                            <tr class="tr-sub-{{ $course->id }}-{!! str_replace(' ', '_', $subject->semester) !!}-{!! str_replace(' ', '_', $subject->year_level) !!}"
                                                                data-units="{{ $subject->units }}"
                                                                id ="tr-sub-{{ $subject->id }}"
                                                                data-id="{{ $subject->id }}"
                                                                data-lab="{{ $subject->has_lab }}">
                                                                <td>{{ $subject->course_code }} - {{ $subject->name }}
                                                                </td>
                                                                <td class="text-center">{{ $subject->units }}</td>
                                                                <td class="text-center">
                                                                    <a class="btn waves-effect waves-light btn btn-outline btn-warning mb-5"
                                                                        href="#">Remove</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                    <!-- Step 4 -->
                                    <h6>Fees</h6>
                                    <section>
                                        <form id="form-fees" onsubmit="return false">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Tuition Fee</label> <code
                                                            id="ctf-computation">-</code>
                                                        <input type="text" class="form-control" name="tuition_fee"
                                                            placeholder="" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"> MISC. Fee</label>
                                                        <input type="text" class="form-control" name="misc_fee"
                                                            placeholder="" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"> Lab. Fee</label> <code
                                                            id="clf-computation">-</code>
                                                        <input type="text" class="form-control" name="lab_fee"
                                                            placeholder="" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"> NSTP Fee</label>
                                                        <input type="text" class="form-control" name="nstp_fee"
                                                            placeholder="" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"> Others Fee - THESIS / LAB FEE FOR
                                                            NON MAJOR SUBJECT </label>
                                                        <input type="text" class="form-control" name="others_fee"
                                                            placeholder="" value="">
                                                    </div>
                                                </div>
                                                <hr class="my-15">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label"> Discounts </label>
                                                        <div class="c-inputs-stacked">
                                                            <input type="checkbox" id="checkbox_1"
                                                                name="is_discount_30_pecent">
                                                            <label for="checkbox_1" class="me-30">DISCOUNT 30%
                                                                (1YR. 2021-2022)</label>

                                                            <input type="checkbox" id="checkbox_2"
                                                                name="is_discount_50_pecent">
                                                            <label for="checkbox_2" class="me-30">DISCOUNT 50 %
                                                                (1YR. 2021-2022)</label>

                                                            <input type="checkbox" id="checkbox_3"
                                                                name="is_discount_cash_full">
                                                            <label for="checkbox_3" class="me-30">CASH FULL
                                                                8%</label>

                                                            <input type="checkbox" id="checkbox_4"
                                                                name="is_discount_siblings">
                                                            <label for="checkbox_4" class="me-30"> SIBLINGS
                                                                (5%)</label>

                                                            <input type="checkbox" id="checkbox_5"
                                                                name="is_discount_aim_global">
                                                            <label for="checkbox_5" class="me-30"> AIM GLOBAL 30%
                                                            </label>

                                                            <input type="checkbox" id="checkbox_6"
                                                                name="is_discount_lab_fee">
                                                            <label for="checkbox_6" class="me-30"> LABORATORY FEES
                                                                50% DISCOUNT </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="my-15">
                                            <div class="row">
                                                <h5 class="box-title"><strong>Total Fees :</strong> <span
                                                        class="badge badge-pill badge-info lbl-computing">computing...</span>
                                                    <span class="lbl-total"> Php<span id="lbl-total_fee">
                                                        </span></span>
                                                </h5>

                                                <h5 class="box-title h-d3" style="display: none;"><span>DISCOUNT 30% (1YR.
                                                        2021-2022):</span> <span class="lbl-total"> Php<span
                                                            id="lbl-d3"> </span></span> </h5>
                                                <h5 class="box-title h-d5" style="display: none;"><span>DISCOUNT 50 % (1YR.
                                                        2021-2022):</span> <span class="lbl-total"> Php<span
                                                            id="lbl-d5"> </span></span> </h5>
                                                <h5 class="box-title h-d8" style="display: none;"><span>CASH FULL
                                                        8%:</span> <span class="lbl-total"> Php<span id="lbl-d8">
                                                        </span></span> </h5>
                                                <h5 class="box-title h-ds5" style="display: none;"><span>SIBLINGS
                                                        (5%):</span> <span class="lbl-total"> Php<span id="lbl-ds5">
                                                        </span></span> </h5>
                                                <h5 class="box-title h-da3" style="display: none;"><span>AIM GLOBAL 30%
                                                        :</span> <span class="lbl-total"> Php<span id="lbl-da3">
                                                        </span></span> </h5>
                                                <h5 class="box-title h-l5" style="display: none;"><span> LABORATORY FEES
                                                        50% DISCOUNT:</span> <span class="lbl-total"> Php<span
                                                            id="lbl-l5"> </span></span> </h5>

                                                <h5 class="box-title"><strong>Total Discounts:</strong> <span
                                                        class="badge badge-pill badge-info lbl-computing">computing...</span>
                                                    <span class="lbl-total"> Php<span id="lbl-total_discount">
                                                        </span></span>
                                                </h5>
                                                <h5 class="box-title"><strong>Total Payable :</strong> <span
                                                        class="badge badge-pill badge-info lbl-computing">computing...</span>
                                                    <span class="lbl-total"> Php<span id="lbl-total_payable">
                                                        </span></span>
                                                </h5>
                                            </div>
                                        </form>
                                    </section>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>



    <div class="modal fade" id="modal-warning" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mySmallModalLabel">Warning!</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p> We can't assess this student! </p>
                    <p> The student you've enter was currently have an active assessment to the inputed academic year and
                        semester.</p>
                    <p> Please visit the student profile. Thank you! </p>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <script src="/assets/js/modules/enrollment-form.js"></script>
@endsection
