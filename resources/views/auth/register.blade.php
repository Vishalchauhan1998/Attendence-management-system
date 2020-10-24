<!doctype html>
<html class="no-js " lang="en">

<!-- Mirrored from thememakker.com/ax/university/html/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Feb 2018 06:34:50 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>:: Admin - Scet ::</title>
    <meta name="description" content="WrapTheme, University Admin">
    <meta name="keywords" content="adminX, adminX Admin, University, Material Design">

    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/login.css')}}" rel="stylesheet">

    <!--  You can choose a theme from css/themes instead of get all themes -->
    <link href="{{('assets/css/themes/all-themes.css')}}" rel="stylesheet" />
    <style>
    .invalid-feedback strong
    {
        color:red;
    }
    .authentication .card {
        position: relative;
        background: #ffffff;
        border-radius: 0;
        padding: 30px !important;
        box-sizing: border-box;
        /* margin: 0; */
        height: unset;
        margin: 15% auto;
        border: none;
        z-index: 5;
    }
 
    </style>
</head>
<body class="theme-blue">
    <div class="authentication">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-8 col-xs-12 p-l-0">
                    <div class="l-detail">
                        <h5 class="position">Welcome</h5>
                        <h1 class="position"><img src="{{asset('assets/images/scet1.jpg')}}" alt="profile img"><span>SCET</span></h1>
                        <h3 class="position">Sign in to start your session</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-xs-8 p-r-0">
                <div class="card">
                    <h4 class="l-login">{{ __('Register') }}
                        <div class="msg">Register a new membership</div>
                    </h4>
                    <form class="col-md-12" method="POST" acion="{{ route('register') }}">
                    @csrf
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <label class="form-label">{{ __('Name') }}</label>
                            </div>
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <label class="form-label">{{ __('E-Mail Address') }}</label>
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{($errors->first('email')) }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <label class="form-label">{{ __('Password') }}</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="password" class="form-control" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <label class="form-label">{{ __('Confirm Password') }}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                            <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                        </div>
                        <button type="submit" class="btn btn-raised btn-info waves-effect">
                                {{ __('Register') }}
                        </button>
                        <button type="reset" class="btn btn-raised btn-info waves-effect">
                                {{ __('Reset') }}
                        </button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>
    <!-- Lib Scripts Plugin Js -->
    <script src="assets/bundles/vendorscripts.bundle.js"></script>
    <!-- Lib Scripts Plugin Js -->

    <script src="assets/js/pages/login2/jparticles.js"></script>
    <script src="assets/js/pages/login2/particle.js"></script>

    <script src="assets/bundles/mainscripts.bundle.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/pages/login2/event.js"></script>


<!-- Mirrored from thememakker.com/ax/university/html/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Feb 2018 06:34:55 GMT -->

