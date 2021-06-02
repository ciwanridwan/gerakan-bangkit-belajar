<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GBB - Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset("src/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css")}}">
    <link rel="stylesheet" href="{{ asset('src/assets/vendors/iconfonts/ionicons/dist/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{ asset("src/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css")}}">
    <link rel="stylesheet" href="{{ asset("src/assets/vendors/css/vendor.bundle.base.css")}}">
    <link rel="stylesheet" href="{{ asset("src/assets/vendors/css/vendor.bundle.addons.css")}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset("src/assets/css/shared/style.css")}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset("src/assets/images/favicon.ico")}}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{Session::get('error')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{Session::put('error', null)}}
                        </div>
                        @endif
                        <div class="auto-form-wrapper">
                            <form action="{{ route('store-login')}}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label class="label">Email</label>
                                    <div class="input-group">
                                        <input id="email" type="email" class="form-control" name="email" required
                                            autocomplete="email" autofocus placeholder="Email">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="label">Password</label>
                                    <div class="input-group">
                                        <input id="password" type="password" class="form-control" name="password"
                                            required autocomplete="current-password" placeholder="*********">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary submit-btn btn-block">Login</button>
                                </div>
                                <div class="form-group d-flex justify-content-between">
                                    <div class="form-check form-check-flat mt-0">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input"> Ingatkan Saya
                                        </label>
                                    </div>
                                    {{-- @if (Route::has('password.request'))
                                    <a class="text-small forgot-password text-black" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif --}}
                                    {{-- <a href="#" class="text-small forgot-password text-black">Forgot Password</a> --}}
                                </div>
                                {{-- <div class="form-group">
                                    <button class="btn btn-block g-login">
                                        <img class="mr-3"
                                            src="{{ asset('src/assets/images/file-icons/icon-google.svg')}}" alt="">Log
                                        in with Google</button>
                                </div> --}}
                                <div class="text-block text-center my-3">
                                    <span class="text-small font-weight-semibold">Belum Punya Akun ?</span>
                                    <a href="{{ route('register-admin')}}" class="text-black text-small">Buat Akun Baru</a>
                                </div>
                            </form>
                        </div>
                        <ul class="auth-footer">
                            <li>
                                <a href="#">Conditions</a>
                            </li>
                            <li>
                                <a href="#">Help</a>
                            </li>
                            <li>
                                <a href="#">Terms</a>
                            </li>
                        </ul>
                        <p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('src/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{ asset('src/assets/vendors/js/vendor.bundle.addons.js')}}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset("src/assets/js/shared/off-canvas.js")}}"></script>
    <script src="{{ asset("src/assets/js/shared/misc.js")}}"></script>
    <!-- endinject -->
</body>

</html>

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

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
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection --}}