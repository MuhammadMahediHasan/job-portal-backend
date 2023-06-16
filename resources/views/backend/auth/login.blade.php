<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom_style.css') }}" rel="stylesheet">
    <style>
        .my-5 {
            margin-top: 6rem!important;
        }
    </style>


    <style type="text/css">
        /*@import url('https://fonts.googleapis.com/css?family=Montserrat');*/

        .onoffswitch3
        {
            position: absolute;
            -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
        }

        .onoffswitch3-checkbox {
            display: none;
        }

        .onoffswitch3-label {
            display: block; overflow: hidden; cursor: pointer;
            border: 0px solid #999999; border-radius: 0px;
        }

        .onoffswitch3-inner {
            display: block; width: 200%; margin-left: -100%;
            -moz-transition: margin 0.3s ease-in 0s; -webkit-transition: margin 0.3s ease-in 0s;
            -o-transition: margin 0.3s ease-in 0s; transition: margin 0.3s ease-in 0s;
        }

        .onoffswitch3-inner > span {
            display: block; float: left; position: relative; width: 50%; height: 30px; padding: 0; line-height: 30px;
            font-size: 14px; color: white; font-family: 'Montserrat', sans-serif; font-weight: bold;
            -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
        }

        .onoffswitch3-inner .onoffswitch3-active {
            padding-left: 10px;
            background-color: #FFFFFF;
            color: #FFFFFF;
            width: 1364px;
        }

        .onoffswitch3-inner .onoffswitch3-inactive {
            width: 100px;
            padding-left: 16px;
            background-color: #FFFFFF; color: #FFFFFF;
            text-align: right;
        }

        .onoffswitch3-switch {
            display: block; width: 50%; margin: 0px; text-align: center;
            border: 0px solid #999999;border-radius: 0px;
            position: absolute; top: 0; bottom: 0;
        }
        .onoffswitch3-active .onoffswitch3-switch {
            background: #27A1CA; left: 0;
            width: 160px;
        }
        .onoffswitch3-inactive{
            background: #A1A1A1; right: 0;
            width: 20px;
        }
        .onoffswitch3-checkbox:checked + .onoffswitch3-label .onoffswitch3-inner {
            margin-left: 0;
        }

        .glyphicon-remove{
            padding: 3px 0px 0px 0px;
            color: #fff;
            background-color: #000;
            height: 25px;
            width: 25px;
            border-radius: 15px;
            border: 2px solid #fff;
        }

        .scroll-text{
            color: #ef0a0a;
        }
    </style>
</head>

<body class="bg-gradient-dark">
<div class="row">
    <div class="col-lg-12">
        @php
            $notice = DB::table('notices')->where('status', 1)->first();
        @endphp
        @if($notice)
            <div class="onoffswitch3">
                <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="myonoffswitch3" checked>
                <label class="onoffswitch3-label" for="myonoffswitch3">
                        <span class="onoffswitch3-inner">
                            <span class="onoffswitch3-active">
                                <marquee class="scroll-text">{{ $notice->title .' : '. $notice->description }}</marquee>
                                <span class="onoffswitch3-switch">IMPORTANT NOTICE
                                    {{-- <span class="glyphicon glyphicon-remove"></span> --}}
                                </span>
                            </span>
                            <span class="onoffswitch3-inactive"><span class="onoffswitch3-switch">SHOW BREAKING NEWS</span></span>
                        </span>
                </label>
            </div>
        @endif
    </div>
</div>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form method="POST" action="{{ route('login') }}" class="user">
                                    @csrf

                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" @error('password') is-invalid @enderror" name="password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-checkbox small">
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label for="customCheck">Remember Me</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
{{--                                    <a href="index.html" class="btn btn-google btn-user btn-block">--}}
{{--                                        <i class="fab fa-google fa-fw"></i> Login with Google--}}
{{--                                    </a>--}}
{{--                                    <a href="index.html" class="btn btn-facebook btn-user btn-block">--}}
{{--                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook--}}
{{--                                    </a>--}}
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="/register">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

</body>

</html>


{{--@if (Route::has('password.request'))--}}
{{--    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--        {{ __('Forgot Your Password?') }}--}}
{{--    </a>--}}
{{--@endif--}}
