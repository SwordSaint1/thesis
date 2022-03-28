<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/assets/images/favicon.ico">

    <title>Asian Institute of Technology and Education</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="/assets/css/vendors_css.css">

    <!-- Style-->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/skin_color.css">
    <script src="/assets/vendor_components/datatable/datatables.min.css"></script>
    <script src="/assets/vendor_components/select2/dist/css/select2.css"></script>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <style>
        nav svg {
            height: 2rem;
        }

        .error {
            color: #ff562f
        }

        img {
            max-width: 90%;
        }

    </style>

    <script>
        // localStorage.clear();

        let amount_per_unit = localStorage.getItem('amount_per_unit');
        if (!amount_per_unit) {
            localStorage.setItem('amount_per_unit', 300);
            amount_per_unit = localStorage.getItem('amount_per_unit');
        }
        let amount_per_lab = localStorage.getItem('amount_per_lab');
        if (!amount_per_lab) {
            localStorage.setItem('amount_per_lab', 300);
            amount_per_lab = localStorage.getItem('amount_per_lab');
        }
        let misc_fee = localStorage.getItem('misc_fee');
        if (!misc_fee) {
            localStorage.setItem('misc_fee', 4930);
            misc_fee = localStorage.getItem('misc_fee');
        }

        let payment_type = localStorage.getItem('payment_type');
        if (!payment_type) {
            localStorage.setItem('payment_type', JSON.stringify([
                "DOWNPAYMENT",
                "PRELIM",
                "MIDTERM",
                "SEMI-FINALS",
                "FINALS",
                "GRADUATION FEE",
                "ENTRANCE EXAM",
                "ACQUAINTANCE",
                "SPORTFEST",
                "TESDA",
                "UNIFORM"
            ]));
            payment_type = localStorage.getItem('payment_type');
        }

        let scholar_type = localStorage.getItem('scholar_type');
        if (!scholar_type) {
            localStorage.setItem('scholar_type', JSON.stringify([
                "CHED-TULONG DUNONG PROGRAM (TDP NEW)",
                "GOV SUAREZ SCHOLARSHIP",
                "CHED PESFA (HM AND FULL)",
                "MAYOR WAGAN SHCOLARSHIP",
                "ALONA",
                "CHED-TULONG DUNONG PROGRAM (TDP TES)",
                "DONATION"
            ]));
            scholar_type = localStorage.getItem('scholar_type');
        }

        function currencyFormat(n = 0) {
            var val = (Math.round(parseFloat(n) * 100) / 100).toFixed(2);
            var parts = val.toString().split(".");
            return parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",") + (parts[1] ? "." + parts[1] : "");
        }

        $(".sidebar").delegate(".treeview", "click", function() {
            let href = $(this).attr("href"); //.attr('href');
            $("#sidebar-a").attr("href", href);
            $("#sidebar-a").click();

        });

        function buildSelect(data = []) {

            html = "";

            $.each(data, function(key, val) {
                html += "<option value='" + val + "'>" + val + "</option>"
            });

            return html;
        }
    </script>

</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">
        <div id="loader"></div>

        <header class="main-header">
            <div class="d-flex align-items-center logo-box justify-content-start">
                <a href="#"
                    class="waves-effect waves-light nav-link d-none d-md-inline-block mx-10 push-btn bg-transparent"
                    data-toggle="push-menu" role="button">
                    <span class="icon-Align-left"><span class="path1"></span><span
                            class="path2"></span><span class="path3"></span></span>
                </a>
                <!-- Logo -->
                <a href="#" class="logo">
                    <!-- logo-->
                    <div class="logo-lg">
                        <span class="light-logo"><img src="/assets/images/logo-dark-text.png" alt="logo"></span>
                        <span class="dark-logo"><img src="/assets/images/logo-light-text.png" alt="logo"></span>
                    </div>
                </a>
            </div>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar-->
            <section class="sidebar position-relative">
                <div class="multinav">
                    <div class="multinav-scroll" style="height: 100%;">
                        <!-- sidebar menu-->
                        <a href="#" id="sidebar-a" style="display: none;"></a>
                        <ul class="sidebar-menu" data-widget="tree">
                            {{-- <li class="treeview" href="/home">
                                <a href="#">
                                    <i class="icon-Layout-4-blocks"><span class="path1"></span><span
                                            class="path2"></span></i>
                                    <span>Dashboard</span>
                                </a>
                            </li> --}}
                            <li class="treeview" href="/students">
                                <a href="students">
                                    <i class="icon-User"><span class="path1"></span><span
                                            class="path2"></span></i>
                                    <span>Student</span>
                                </a>
                            </li>
                            <li class="treeview" href="/enrollment-form/create">
                                <a href="#">
                                    <i class="icon-File"><span class="path1"></span><span
                                            class="path2"></span></i>
                                    <span>Assessment Form</span>
                                </a>
                            </li>
                            <li class="treeview" href="/payments/create">
                                <a href="#">
                                    <i class="icon-Chat-check"><span class="path1"></span><span
                                            class="path2"></span></i>
                                    <span>Payments</span>
                                </a>
                            </li>
                            <li class="treeview" href="/courses">
                                <a href="#">
                                    <i class="icon-Layout-grid"><span class="path1"></span><span
                                            class="path2"></span></i>
                                    <span>Course</span>
                                </a>
                            </li>
                            <li class="treeview" href="/accounts">
                                <a href="#">
                                    <i class="icon-Library"><span class="path1"></span><span
                                            class="path2"></span></i>
                                    <span>Accounts</span>
                                </a>
                            </li>
                            <li class="treeview" href="/accounts/{{ Auth::user()->id ?? ''}}/edit">
                                <a href="#">
                                    <i class="icon-Write"><span class="path1"></span><span
                                            class="path2"></span></i>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li class="treeview" href="/settings">
                                <a href="#">
                                    <i class="icon-Settings"><span class="path1"></span><span
                                            class="path2"></span></i>
                                    <span>Settings</span>
                                </a>
                            </li>
                            <li class="treeview" href="#logout">
                                <a href="#">
                                    <i class="icon-Lock-overturning"><span class="path1"></span><span
                                            class="path2"></span></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </aside>

        <form action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            @method('POST')
            <button class="btn waves-effect waves-light btn btn-outline btn-danger mb-5" id="submit-logout" type="submit">Logout</button>
        </form>

        <!-- /.control-sidebar -->

        <!-- Content Wrapper. Contains page content -->

        @yield('content')

        <!-- /.content-wrapper -->

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="/assets/js/vendors.min.js"></script>
    <script src="/assets/vendor_components/datatable/datatables.min.js"></script>
    <script src="/assets/vendor_components/select2/dist/js/select2.js"></script>
    <script src="/assets/js/pages/chat-popup.js"></script>
    <script src="/assets/icons/feather-icons/feather.min.js"></script>
    <script src="/assets/js/template.js"></script>
    <script src="/assets/js/dg.js"></script>


    <!-- Vendor JS -->
    <script src="/assets/vendor_components/jquery-steps-master/build/jquery.steps.js"></script>
    <script src="/assets/vendor_components/jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>
    <script src="/assets/vendor_plugins/JqueryPrintArea/demo/jquery.PrintArea.js"></script>

    <script>
        $(".sidebar").delegate(".treeview", "click", function() {
            let href = $(this).attr("href");
            if (href == "#logout") {
                $("#submit-logout").click();
            } else {
                window.location.assign(href);
            }

        });
    </script>

</body>

</html>
