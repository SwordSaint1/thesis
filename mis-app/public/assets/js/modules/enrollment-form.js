$(document).ready(function () {
    $(".tab-wizard").steps({
        headerTag: "h6"
        , bodyTag: "section"
        , transitionEffect: "none"
        , titleTemplate: '<span class="step">#index#</span> #title#'
        , labels: {
            finish: "Submit"
        }
        , onFinished: function (event, currentIndex) {
            computeFee();
            // complete send
            $.ajax({
                type: 'POST',
                url: '/enrollment-form',
                dataType: 'json',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: gCfee,
                success: function (data) {
                    window.location.assign("/enrollment-form/" + data.enrollemt_form.id);
                },
                statusCode: {
                    500: function () {
                        alert("Script exhausted");
                    },
                    404: function () {
                        alert("Something went wrong, please try again.");
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
                },
                statusCode: {
                    500: function () {
                        alert("Script exhausted");
                    },
                    404: function () {
                        $("#no-result").show();
                        $("#steps-uid-0-t-1").parent().removeClass("done").addClass("disabled");
                        $("#steps-uid-0-t-2").parent().removeClass("done").addClass("disabled");
                        $("#steps-uid-0-t-3").parent().removeClass("done").addClass("disabled");
                    }
                }
            });
        }
    });

    $("#form-enrollment-info").validate({
        rules: {
            course_id: "required",
            academic_year: "required",
            semester: "required"
        },
        messages: {},
        submitHandler: function (form) {
            $.ajax({
                type: 'GET',
                url: '/validate-enrollment',
                data: {
                    student_id: $("#inp-student_number").attr("data-id"),
                    academic_year: $("#form-enrollment-info input[name=academic_year]").val(),
                    semester: $("#form-enrollment-info select[name=semester]").val(),
                },
                dataType: 'json',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function (data) {
                    $('.wizard-content .wizard > .actions > ul > li > a[href="#previous"]').click();
                    $("#steps-uid-0-t-2").parent().removeClass("done").addClass("disabled");
                    $("#modal-warning").modal("show");
                },
                statusCode: {
                    500: function () {
                        alert("Script exhausted");
                    },
                }
            });

            // load list of subjects
            let info = dg__getFormValues({
                type: "obj",
                form: "#form-enrollment-info"
            });
            let sClass = "tr-sub-" + info['course_id'] + '-' + info['semester'].replace(" ", "_") + '-' + info['year_level'].replace(" ", "_");
            $("#table-subjects tbody tr").hide();
            $("." + sClass).show();
            getTotalUnits();

            $(".sel-subjects").hide();
            $("#c-" + info['course_id']).show();
            $("#btn-add_subjects").attr("data-id", "c-" + info['course_id']);
        }
    });

    $(".actions.clearfix").hide();

    $(".wizard-content .wizard > .actions > ul > li + li").click(function () {
        if ($("#table-subjects").is(":visible")) {
            if ($("#form-enrollment-info input[name=academic_year]").val()) {
                $("#form-enrollment-info").submit();
            } else {
                $('.wizard-content .wizard > .actions > ul > li > a[href="#previous"]').click();
                $("#steps-uid-0-t-2").parent().removeClass("done").addClass("disabled");
                $("#form-enrollment-info").submit();
            }
        }
    });

    $("#table-subjects").delegate("a", "click", function () {
        $(this).closest('tr').hide();
        getTotalUnits();
    });


    $("#btn-reset_subjects").click(function () {
        $("#form-enrollment-info").submit();
    });

    $("#btn-add_subjects").click(function () {
        let course_id = $(this).attr("data-id");
        let subject_id = $("#" + course_id).val();
        $("#tr-sub-" + subject_id).show();
        getTotalUnits();
    });

    $("#form-fees input").keyup(function () {
        //computing
        $(".lbl-total").hide();
        $(".lbl-computing").show();
        computeFee();
    });

    $("#form-fees input").on('change', function () {
        //computing
        $(".lbl-total").hide();
        $(".lbl-computing").show();
        computeFee();
    });

});

function computeFee() {
    gCfee = dg__objectAssign({
        is_discount_30_pecent: $("#form-fees input[name=is_discount_30_pecent]").prop('checked'),
        is_discount_50_pecent: $("#form-fees input[name=is_discount_50_pecent]").prop('checked'),
        is_discount_cash_full: $("#form-fees input[name=is_discount_cash_full]").prop('checked'),
        is_discount_siblings: $("#form-fees input[name=is_discount_siblings]").prop('checked'),
        is_discount_aim_global: $("#form-fees input[name=is_discount_aim_global]").prop('checked'),
        is_discount_lab_fee: $("#form-fees input[name=is_discount_lab_fee]").prop('checked'),
    }, dg__getFormValues({
        type: "obj",
        form: "#form-fees"
    }));

    gCfee = dg__objectAssign(gCfee, {
        student_id: $("#inp-student_number").attr("data-id"),
        subjects: gSubjects,
        total_units: gTotalUnits
    }, dg__getFormValues({
        type: "obj",
        form: "#form-enrollment-info"
    }), {
        total_fee: gTotalFee,
        total_discount: gDiscount,
        total_payable: gTotalPayable,
    });

    getTotalDiscount();

}

function getTotalDiscount() {

    gTotalFee = (
        (parseFloat($("#form-fees input[name=tuition_fee]").val(), 10) || 0) + parseFloat($("#form-fees input[name=lab_fee]").val(), 10) || 0) +
        (parseFloat($("#form-fees input[name=misc_fee]").val(), 10) || 0) + (parseFloat($("#form-fees input[name=nstp_fee]").val(), 10) || 0) +
        (parseFloat($("#form-fees input[name=others_fee]").val(), 10) || 0);

    $(".h-d3").hide();
    $(".h-d5").hide();
    $(".h-d8").hide();
    $(".h-ds5").hide();
    $(".h-da3").hide();
    $(".h-l5").hide();

    let discount = 0;
    if (gCfee.is_discount_30_pecent) {
        amount = (parseFloat(gTuitionFee, 10) || 0) * 0.3;
        $("#lbl-d3").html(currencyFormat(amount));
        discount += amount;
        $(".h-d3").show();
    }
    if (gCfee.is_discount_50_pecent) {
        amount = (parseFloat(gTuitionFee, 10) || 0) * 0.5;
        $("#lbl-d5").html(currencyFormat(amount));
        discount += amount;
        $(".h-d5").show();
    }

    if (gCfee.is_discount_cash_full) {
        amount = (parseFloat(gTuitionFee, 10) || 0) * 0.08;
        $("#lbl-d8").html(currencyFormat(amount));
        discount += amount;
        $(".h-d8").show();
    }

    if (gCfee.is_discount_siblings) {
        amount = (parseFloat(gTuitionFee, 10) || 0) * 0.05;
        $("#lbl-ds5").html(currencyFormat(amount));
        discount += amount;
        $(".h-ds5").show();
    }

    if (gCfee.is_discount_aim_global) {
        amount = (parseFloat(gTuitionFee, 10) || 0) * 0.3;
        $("#lbl-da3").html(currencyFormat(amount));
        discount += amount;
        $(".h-da3").show();
    }

    if (gCfee.is_discount_lab_fee) {
        amount = (parseFloat(gLabFee, 10) || 0) * 0.5;
        $("#lbl-l5").html(currencyFormat(amount));
        discount += amount;
        $(".h-l5").show();
    }

    gDiscount = discount;
    // gTotalPayable = (parseFloat(gTuitionFee, 10) || 0) - (parseFloat(gDiscount, 10) || 0);
    // gTotalPayable = gTotalFee + gTotalPayable;
    gTotalPayable = gTotalFee - gDiscount;

    $("#lbl-total_discount").html(currencyFormat(gDiscount));
    $("#lbl-total_payable").html(currencyFormat(gTotalPayable));
    $("#lbl-total_fee").html(currencyFormat(gTotalFee));

    // setTimeout(function () {
    $(".lbl-computing").hide();
    $(".lbl-total").show();
    // }, 3000);
}

function getTotalUnits() {

    $(".lbl-total").hide();
    $(".lbl-computing").show();

    var units = $("#table-subjects tr:visible").map(function () {
        return $(this).attr("data-units");
    }).get();

    gSubjects = $("#table-subjects tr:visible").map(function () { return $(this).attr("data-id"); }).get();

    // Getting sum of numbers
    var total_units = units.reduce(function (a, b) {
        return parseInt(a, 10) + parseInt(b, 10);
    });
    $("#lbl-total_units").text(total_units);

    gTotalUnits = total_units;

    var units = $("#table-subjects tr:visible").map(function () {
        return $(this).attr("data-lab");
    }).get();

    // Getting sum of numbers
    var total_lab = units.reduce(function (a, b) {
        return parseInt(a, 10) + parseInt(b, 10);
    });
    gTotalLab = total_lab;

    $("#ctf-computation").html(gTotalUnits + " (total units)" + " X Php" + amount_per_unit + " (price per unit)");
    $("#clf-computation").html(gTotalLab + " (total subject with lab)" + " X Php" + amount_per_lab + " (price per lab)");

    gTuitionFee = parseInt(gTotalUnits) * parseInt(amount_per_unit);
    gLabFee = parseInt(gTotalLab) * parseInt(amount_per_lab);

    $("#form-fees input[name=tuition_fee]").val(gTuitionFee);
    $("#form-fees input[name=lab_fee]").val(gLabFee);
    $("#form-fees input[name=misc_fee]").val(misc_fee);

    computeFee();
}

let gTotalUnits = 0;
let gTotalLab = 0;
let gTuitionFee = 0;
let gLabFee = 0;
let gTotalFee = 0;
let gCfee = [];
let gDiscount = 0;
let gTotalPayable = 0;
let gSubjects = [];
