@extends('layouts.header')

@section('head')
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="cont">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="https://i.pinimg.com/564x/5e/cb/23/5ecb23d49ba71eca75b503972ffcc27e.jpg"
                            alt="sing up image"></figure>
                    <a href="{{ route('register') }}" class="signin-image-link">Create an account</a>
                   
                </div>
                <div class="signin-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                        @csrf
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                autocomplete="email" autofocus placeholder="Your Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input id="password" type="password" name="password" required autocomplete="current-password"
                                placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}
                                class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit-signin" value="Log in" />
                        </div>

                    </form> 
                    <div style="margin-top: 30px ; font-size:15px">
                    @if (Route::has('password.request'))
                        <a  href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
</div>
                    {{-- <div class="social-login">
                        <span class="social-label">Or login with</span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div> --}}
                     
                </div>
            </div>
        </div>
    </section>

    </div>
@endsection
