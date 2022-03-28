<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/assets/images/favicon.ico">

    <title>Asian Institute of Technology and Education - Log in </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="/assets/css/vendors_css.css">

    <!-- Style-->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/skin_color.css">

</head>

<body class="hold-transition theme-primary bg-img" style="background-image: url(../images/auth-bg/bg-1.jpg)">

    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">

            <div class="col-12">
                <div class="row justify-content-center g-0">



                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="bg-white rounded10 shadow-lg">
                            <div class="content-top-agile p-20 pb-0">
                                <h2 class="text-primary">- WELCOME -</h2>
                                <p class="mb-0">Asian Institute of Technology and Education</p>
                            </div>

                            <div class="text-center">
                                <p class="mt-20 text-white">- Sign With -</p>
                                <p class="gap-items-2 mb-20">
                                    <span class="light-logo"><img src="/assets/images/logo-dark-text.png" alt="logo"
                                            style="width: 300px;"></span>
                                </p>
                            </div>

                            <div class="p-40">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-transparent"><i
                                                    class="ti-user"></i></span>
                                            <input
                                                class="form-control ps-15 bg-transparent @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text  bg-transparent"><i
                                                    class="ti-lock"></i></span>

                                            <input id="password" type="password"
                                                class="form-control ps-15 bg-transparent @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror


                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="checkbox">
                                                <input type="checkbox" name="remember" id="remember"
                                                    {{ old('remember') ? 'checked' : '' }}>

                                                <label for="basic_checkbox_1">Remember Me</label>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-6">
                                            <div class="fog-pwd text-end">
                                                {{-- <a href="javascript:void(0)" class="hover-warning"><i
                                                        class="ion ion-locked"></i> Forgot pwd?</a><br> --}}
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-danger mt-10">SIGN IN</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>
                                <div class="text-center">
                                    {{-- <p class="mt-15 mb-0">Don't have an account? <a href="auth_register.html"
                                            class="text-warning ms-5">Sign Up</a></p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Vendor JS -->
    <script src="/assets/js/vendors.min.js"></script>
    <script src="/assets/js/pages/chat-popup.js"></script>
    <script src="/assets/../assets/icons/feather-icons/feather.min.js"></script>

</body>

</html>
