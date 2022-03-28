$(document).ready(function () {


    $(".sel-payment_type").html(buildSelect(JSON.parse(payment_type)));
    $(".sel-scholarship_type").html(buildSelect(JSON.parse(scholar_type)));

	$("#print2").click(function() {
        var mode = 'iframe'; //popup
        var close = mode == "popup";
        var options = {
            mode: mode,
            popClose: close
        };
        $("section.printableArea").printArea(options);
    });

    $("#btn-enrollment-payment").click(function(){
        gEnrollmentId = $(this).attr('data-id');
        $(".bs-example-modal-lg").modal("show");
    });

    $("#btn-enrollment-scholarship").click(function(){
        gEnrollmentId = $(this).attr('data-id');
        $(".modal-scholar").modal("show");
    });

    $(".error-or").hide();

    $("#submit-payment").click(function () {
        $("#form-payment").submit();
        if($('#form-payment-amount').val() == '500'){
            $('#form-payment-amount').addClass('error');
        }else{
            $('#form-payment-amount').removeClass('error');
        }
    });

    $("#submit-scholarship").click(function () {
        $("#form-scholarship").submit();
    });

    // Form Validate Search
    $("#form-payment").validate({
        rules: {
            payment_type: "required",
            or_number: "required",
            amount: {
                required: true,
                min: 500
              },
        },
        messages: {},
        submitHandler: function (form) {
            $(".error-or").hide();
            $.ajax({
                type: 'POST',
                url: '/payments',
                dataType: 'json',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: {
                    enrollment_form_id: gEnrollmentId,
                    payment_type: $("#sel-payment_type").val(),
                    or_no: $("#form-payment input[name=or_number]").val(),
                    amount: $("#form-payment input[name=amount]").val(),
                },
                success: function (data) {
                    setTimeout(function(){
                        $(".bs-example-modal-lg").modal("hide");
                        $("#form-search-student").submit();
                        dg__resetFormValues("#form-payment");
                    }, 500);

                    if ($("#btn-enrollment-payment").is(":visible")) {
                        location.reload();
                    }
                },
                statusCode: {
                    500: function () {
                        alert("Script exhausted");
                    },
                    404: function () {
                        alert("Something went wrong, please try again.");
                    },
                    422: function () {
                        $(".error-or").show();
                    }
                }
            });

        }
    });

    $("#form-scholarship").validate({
        rules: {
            payment_type: "required",
            or_number: "required",
            amount: "required",
        },
        messages: {},
        submitHandler: function (form) {
            $(".error-or").hide();
            $.ajax({
                type: 'POST',
                url: '/payments',
                dataType: 'json',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: {
                    enrollment_form_id: gEnrollmentId,
                    payment_type: $("#sel-scholar_type").val(),
                    payment_type_id: 3,
                    or_no: $("#form-scholarship input[name=or_number]").val(),
                    amount: $("#form-scholarship input[name=amount]").val(),
                },
                success: function (data) {
                    setTimeout(function(){
                        $(".modal-scholar").modal("hide");
                        $("#form-search-student").submit();
                        dg__resetFormValues("#form-scholarship");
                    }, 500);

                    if ($("#btn-enrollment-scholarship").is(":visible")) {
                        location.reload();
                    }
                },
                statusCode: {
                    500: function () {
                        alert("Script exhausted");
                    },
                    404: function () {
                        alert("Something went wrong, please try again.");
                    },
                    422: function () {
                        $(".error-or").show();
                    }
                }
            });

        }
    });


    // Form Validate Search
    $("#form-search-student").validate({
        rules: {
            student_number: "required",
        },
        messages: {},
        submitHandler: function (form) {

            $("#no-result").hide();
            $(".actions.clearfix").hide();

            //reset form
            dg__resetFormValues("#form-student");

            $.ajax({
                type: 'GET',
                url: '/students-search/' + $("#inp-student_number").val(),
                dataType: 'json',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function (data) {
                    dg__iniFormValue({
                        form: "#form-student",
                        value: data.student
                    });
                    $("#inp-student_number").attr("data-id", data.student.id);
                    $(".actions.clearfix").show();

                    $("#section-payment").hide();
                    $("#section-no-payment").show();

                    enrollment_form = data.enrollment_form;

                    if (enrollment_form.id) {
                        $("#section-payment").show();
                        $("#section-no-payment").hide();

                        gEnrollmentId = enrollment_form.id;
                        $("#academic_year").html(enrollment_form.academic_year);
                        $("#created_at").html(enrollment_form.created_at);
                        $("#semester").html(enrollment_form.semester);
                        $("#total_discount").html(currencyFormat(enrollment_form.total_discount));
                        $("#total_fee").html(currencyFormat(enrollment_form.total_fee));
                        $("#total_payable").html(currencyFormat(enrollment_form.total_payable));
                        $("#total_payments").html(currencyFormat(enrollment_form.total_payments));
                        $("#total_balance").html(currencyFormat(enrollment_form.total_balance));

                        payment = enrollment_form.payment;

                        let  l = "";
                        let check = 0;

                        if (payment) {

                            $.each(payment, function (key, val) {

                                if(val.or_no){
                                    check = 1;
                                }

                                l += `  <tr>
                                            <td>`+ val.or_no + `</td>
                                            <td>`+ val.payment_type + `</td>
                                            <td>`+ val.created_at + `</td>
                                            <td class="text-end">Php`+ currencyFormat(val.amount) + `</td>
                                        </tr>
                                `;
                            });


                            if(check == 0){
                                l = `
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td class="text-end">-</td>
                                    </tr>
                                `;
                            }
                            $("#tbody-records").html(l);
                        }
                    }

                },
                statusCode: {
                    500: function () {
                        alert("Script exhausted");
                    },
                    404: function () {
                        $("#section-payment").hide();
                        $("#no-result").show();
                    }
                }
            });
        }
    });
});

let gEnrollmentId = 0;
