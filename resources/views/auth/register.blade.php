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
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" action="{{ route('register') }}" class="register-form" id="register-form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name ml-2"></i></label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required
                                autocomplete="name" autofocus placeholder="Your Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                autocomplete="email" placeholder="Your Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input id="password" type="password" name="password" required autocomplete="new-password"
                                placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input id="password-confirm" type="password" name="password_confirmation" required
                                autocomplete="new-password" placeholder="Repeat your password">

                        </div>
                        <div class="form-group">
                            <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                            <input id="phone" type="text" name="phone" value="{{ old('phone') }}" required
                                autocomplete="phone" autofocus placeholder="Phone">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image"><i class="zmdi zmdi-image"></i></label>
                            <input type="file" name="image" id="image" value="{{ old('image') }}" required
                                autofocus />
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                statements in <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit-signup"
                                value="Register" />
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="https://i.pinimg.com/564x/a7/95/ca/a795cac3d3e58f421ba0f83d82a85f68.jpg"
                            alt="sing up image"></figure>
                    <a href="{{ route('login') }}" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
        </div>
    </section>



@endsection
