@extends('layouts.main')

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
                    <a href="{{ route('login') }}" class="signin-image-link">Back</a>
                   
                </div>
                <div class="signin-form">
                    <h2 class="form-title">Reset Password</h2>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}" class="register-form" id="login-form">
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
                      
                       
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit-signin" value="Send Password Reset Link" />
                        </div>

                    </form> 
                   
                    
                     
                </div>
            </div>
        </div>
    </section>

    </div>
@endsection
