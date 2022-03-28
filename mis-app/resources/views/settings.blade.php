@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <h3 class="page-title">Settings</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="assets/#"><i class="mdi mdi-home-outline"></i></a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">Settings</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <section class="content">
                <div class="box">

                    <form id="form-global">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Amount Per Unit</label>
                                        <input type="text" class="form-control" name="amount_per_unit" placeholder=""
                                            value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Amount Per Unit (Laboratory)</label>
                                        <input type="text" class="form-control" name="amount_per_lab" placeholder=""
                                            value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Miscellaneous Fee </label>
                                        <input type="text" class="form-control" name="misc_fee" placeholder="" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="ti-save-alt"></i> Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


                    <!-- /.box-header -->
                    <div class="box-body">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#home2"
                                    role="tab"><span class="hidden-sm-up"><i class="ion-home"></i></span> <span
                                        class="hidden-xs-down">Payment Type</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#profile2"
                                    role="tab"><span class="hidden-sm-up"><i class="ion-person"></i></span> <span
                                        class="hidden-xs-down">List of Scholarship </span></a> </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">

                            <div class="tab-pane active" id="home2" role="tabpanel">
                                <div class="p-15">
                                    <div class="box">
                                        <div class="box-header with-border">
                                            <div class="pull-right">
                                                <a href="#" class="btn btn-success" type="button" id="add-payment"> <span><i
                                                            class="fa fa-edit"></i>
                                                        Add Payment</span> </a>
                                            </div>
                                            <h4 class="box-title"><strong>Payment</strong> List</h4>
                                        </div>
                                        <div class="box-body">
                                            <div class="table-responsive">
                                                <table class="table" id="tbl-payments">
                                                    <thead class="bg-success">
                                                        <tr>
                                                            <th>Name</th>
                                                            <th class="text-end">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody-payments">
                                                        <tr>
                                                            <td>-</td>
                                                            <td class="text-end">
                                                                <a class="btn waves-effect waves-light btn btn-outline btn-info mb-5"
                                                                    href="http://127.0.0.1:8000/subjects/26/edit">Manage</a>
                                                                <a class="btn waves-effect waves-light btn btn-outline btn-danger mb-5"
                                                                    href="http://127.0.0.1:8000/subjects/26/edit">Remove</a>
                                                            </td>
                                                        </tr>
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
                                        <div class="box-header with-border">
                                            <div class="pull-right">
                                                <a href="#" class="btn btn-success" type="button" id="add-scholarship">
                                                    <span><i class="fa fa-edit"></i>
                                                        Add Scholarship</span> </a>
                                            </div>
                                            <h4 class="box-title"><strong>Scholarship</strong> List</h4>
                                        </div>
                                        <div class="box-body">
                                            <div class="table-responsive">
                                                <table class="table" id="tbl-scholarship">
                                                    <thead class="bg-success">
                                                        <tr>
                                                            <th>Name</th>
                                                            <th class="text-end">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody-scholarship">
                                                        <tr>
                                                            <td>-</td>
                                                            <td class="text-end">
                                                                <a class="btn waves-effect waves-light btn btn-outline btn-info mb-5"
                                                                    href="http://127.0.0.1:8000/subjects/26/edit">Manage</a>
                                                                <a class="btn waves-effect waves-light btn btn-outline btn-danger mb-5"
                                                                    href="http://127.0.0.1:8000/subjects/26/edit">Remove</a>
                                                            </td>
                                                        </tr>
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
            </section>
            <!-- /.content -->
        </div>
    </div>

    <div class="modal fade modal-global" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mdl-title" id="myLargeModalLabel">Form</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong class="mdl-title">Form</strong> Details</h4>
                        </div>
                        <div class="box-body">
                            <form id="form-payment_scholar" onsubmit="return false;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" name="description" placeholder=""
                                                value="">
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary float-end">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <script>
        $("#form-global input[name=amount_per_unit]").val(amount_per_unit);
        $("#form-global input[name=amount_per_lab]").val(amount_per_lab);
        $("#form-global input[name=misc_fee]").val(misc_fee);

        // Form Validate Search
        $("#form-global").validate({
            rules: {
                amount_per_unit: "required",
                amount_per_lab: "required",
                misc_fee: "required",
            },
            messages: {},
            submitHandler: function(form) {
                $(".error-or").hide();
                localStorage.setItem('amount_per_unit', $("#form-global input[name=amount_per_unit]").val());
                localStorage.setItem('amount_per_lab', $("#form-global input[name=amount_per_lab]").val());
                localStorage.setItem('misc_fee', $("#form-global input[name=misc_fee]").val());
                location.reload();
            }
        });

        $("#form-payment_scholar").validate({
            rules: {
                description: "required"
            },
            messages: {},
            submitHandler: function(form) {
                let data = ($("#form-payment_scholar").attr("data-id") == '1') ?
                    JSON.parse(payment_type) : JSON.parse(scholar_type);
                let name = $("#form-payment_scholar input[name=description]").val();
                data.push(name);
                if ($("#form-payment_scholar").attr("data-id") == '1') {
                    localStorage.setItem('payment_type', JSON.stringify(data));
                } else {
                    localStorage.setItem('scholar_type', JSON.stringify(data));
                }
                location.reload();
            }
        });

        $("#submit-payment_scholar").click(function() {
            $("#form-payment_scholar").submit();
        });


        function buildList(data = []) {
            html = "";
            $.each(data, function(key, val) {
                // <a class="btn waves-effect waves-light btn btn-outline btn-info mb-5"
                //                     data-index="${key}"
                //                     href="#">Manage</a>
                html += `<tr class="${key}">
                            <td>${val}</td>
                            <td class="text-end">

                                <a class="btn waves-effect waves-light btn btn-outline btn-danger mb-5"
                                    data-index="${key}"
                                    href="#">Remove</a>
                            </td>
                        </tr>`;
            });
            return html;
        }
        $("#tbl-payments tbody").html(buildList(JSON.parse(payment_type)));
        $("#tbl-scholarship tbody").html(buildList(JSON.parse(scholar_type)));


        $("#tbl-payments tbody").delegate("a", "click", function() {
            let id = $(this).attr("data-index");
            $("#tbody-payments tr." + id).remove();
            let data = JSON.parse(payment_type);
            data.splice(id, 1);
            localStorage.setItem('payment_type', JSON.stringify(data));
        });

        $("#tbl-scholarship tbody").delegate("a", "click", function() {
            let id = $(this).attr("data-index");
            $("#tbody-scholarship tr." + id).remove();
            let data = JSON.parse(scholar_type);
            data.splice(id, 1);
            localStorage.setItem('scholar_type', JSON.stringify(data));
        });

        $("#add-payment").click(function() {
            $(".modal-global").modal("show");
            $(".mdl-title").text("Payment");
            $("#form-payment_scholar").attr("data-id", 1);
        });

        $("#add-scholarship").click(function() {
            $(".modal-global").modal("show");
            $(".mdl-title").text("Scholarship");
            $("#form-payment_scholar").attr("data-id", 2);
        });
    </script>
@endsection
