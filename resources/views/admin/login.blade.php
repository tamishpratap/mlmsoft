<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | {{ config('detailsApp.name') }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


   <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon/fav.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon/fav.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon/fav.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="bootsstrap" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('adm_assets/assets/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adm_assets/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adm_assets/assets/plugins/ionicons/dist/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adm_assets/assets/plugins/icon-kit/dist/css/iconkit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adm_assets/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('adm_assets/assets/dist/css/theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adm_assets/assets/css/style.css') }}">
    <script src="{{ asset('adm_assets/assets/src/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            background: #f8fafc;
        }

        .auth-wrapper {
            min-height: 100vh;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 48%, #eff6ff 100%);
        }
    </style>
</head>

<body>


    <div class="auth-wrapper">
        <div class="container-fluid h-100">
            <div class="row flex-row h-100">
                <div class="col-xl-4 col-lg-4 col-md-4 m-auto">

                    <div class="authentication-form mx-auto pt-0 ">
                        <div class="logo-centered pt-4 mb-3">
                            <img width="220px" src="{{asset('logo/logo.png')}}"
                                alt="{{ config('detailsApp.name') }}">
                            {{-- <a href="#"><h3><b>{{config('detailsApp.name')}}</b></h3></a> --}}
                        </div>
                        <p>Welcome back! </p>
                        @if (session()->has('OtpMsg'))
                            <span class="text-danger text-center">{{ session('OtpMsg') }}</span>
                        @endif
                        @if (session()->has('accessMsg'))
                            <span class="text-danger text-center">{{ session('accessMsg') }}</span>
                        @endif
                        @if (session()->has('loginmsg'))
                            <div class="alert alert-danger mb-3">{{ session('loginmsg') }}</div>
                        @endif
                        <form method="POST" action="{{ route('adminLogin') }}">
                            @csrf

                            <div class="form-group">
                                <a href="{{ url('/send-admin-otp') }}" class="btn btn-custom text-white pt-2">Send
                                    OTP</a>
                                    <br>
                                    @if (session()->has('admin_otp'))
                                    <span class="text-danger text-center">{{ session('admin_otp') }}</span>
                                    @endif
                            </div>

                            <div class="form-group">
                                @if (!session()->has('admin_otp'))
                                    <input type="text" placeholder="Enter OTP" class="form-control" name="otp"
                                        >
                                @else
                                    <input type="text" placeholder="Enter OTP" class="form-control" name="otp"
                                        required>
                                @endif
                                <i class="ik ik-mail"></i>
                                @error('otp')
                                    <span style="margin-top: .25rem;font-size: 80%;color: #dc3545;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input id="email" type="email" placeholder="Enter Email"
                                    class="form-control @error('email') is-invalid @enderror" name="email" required
                                    autocomplete="email" autofocus>
                                <i class="ik ik-user"></i>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" placeholder="Password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    value="1234" required>
                                <i class="ik ik-lock"></i>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col text-left">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="item_checkbox"
                                            name="item_checkbox" value="option1">
                                        <span class="custom-control-label">&nbsp;Remember Me</span>
                                    </label>
                                </div>
                                <div class="col text-right">
                                    <a class="btn text-danger" href="{{ url('/forget-password') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                </div>
                            </div>
                            <div class="sign-btn text-center">
                                <button class="btn btn-custom">Sign In</button>
                            </div>

                            <!--<div class="register">-->
                            <!--    <p>{{ __('No account?') }} <a href="#">{{ __('Sign Up') }}</a></p>-->
                            <!--</div>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('adm_assets/assets/src/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('adm_assets/assets/plugins/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('adm_assets/assets/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('adm_assets/assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('adm_assets/assets/plugins/screenfull/dist/screenfull.js') }}"></script>

</body>

</html>
