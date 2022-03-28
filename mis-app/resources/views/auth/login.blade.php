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

        <!-- Content Wrapper. Contains page content -->

        <div class="container" style="margin-top: 5%">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        {{-- <div class="card-header">{{ __('Login') }}</div> --}}

                        <span class="light-logo m-5" style="padding: 7%; text-align: center;"><img src="/assets/images/logo-dark-text.png" alt="logo"></span>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary w-100">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
            window.location.assign(href);
        });
    </script>

</body>

</html>
