<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Lucky 8 WPC') }}</title>


    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>
<body class="body-content">
    <div class="content img-bg">
      <div class="container-fluid">
        <div class="row">
            <main class="py-4">
                <div class="container login-container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center justify-content-center align-items-center">
                            <img src="dist/img/wpc-logo.jpg" alt="logo" class="header-mobile__logo-img logo-img  mb-2">
                        </div>
                        <div class="col-md-6">
                            <div class="card card-login">
                                <div class="card-header card__header">
                                    <h4>LOGIN TO YOUR ACCOUNT</h4>
                                </div>

                                <div class="card-body card__content">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="email" >{{ __('E-Mail Address') }}</label>

                                            <!-- <div class="col-md-6"> -->
                                                <input id="email" type="email" placeholder="Enter your email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            <!-- </div> -->
                                        </div>

                                        <div class="form-group">
                                            <label for="password">{{ __('Password') }}</label>

                                            <!-- <div class="col-md-6"> -->
                                                <input id="password" type="password" placeholder="Enter your password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            <!-- </div> -->
                                        </div>

                                        <!-- <div class="form-group row">
                                            <div class="col-md-6 offset-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="form-group form-group--sm">
                                            <div >
                                                <button type="submit" id="btnSignin" class="btn btn-primary btn-lg btn-block">
                                                    SIGN IN TO YOUR ACCOUNT
                                                </button>

                                                <!-- @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif -->
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-sm-12 mt-4">
                                            <img src="/dist/img/pagcor_bmm_logo.png?v=3" style="width: 400px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
</body>

</html>
