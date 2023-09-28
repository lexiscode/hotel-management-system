@extends('web.frontend.layouts.master')

@section('reset-password')

<!-- Start Header -->
<div class="fables-header fables-after-overlay">
    <div class="container">
         <h2 class="fables-page-title fables-second-border-color">Reset Password</h2>
    </div>
</div>
<!-- /End Header -->

<!-- Start Breadcrumbs -->
<div class="fables-light-background-color">
    <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="fables-breadcrumb breadcrumb px-0 py-3">
            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="fables-second-text-color">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
          </ol>
        </nav>
    </div>
</div>
<!-- /End Breadcrumbs -->

<!-- Start page content -->
<div class="container">
    <div class="row my-4 my-lg-5">
         <div class="col-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3 text-center">
              <img src="{{ asset('assets/custom/images/signin-logo.png') }}" alt="signin" class="img-fluid">
              <p class="font-20 semi-font fables-main-text-color mt-4 mb-5">Update Your Account Info</p>

                <form method="POST" action="{{ route('admin.reset-password.send') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $token }}">

                    <!-- Email Address -->
                    <div class="form-group">
                        <div class="input-icon">
                            <span class="fables-iconemail fables-input-icon mt-2 font-13"></span>
                            <input type="email" name="email" class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input" value="{{ $email }}" placeholder="Email">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <div class="input-icon">
                        <span class="fables-iconpassword fables-input-icon font-19 mt-1"></span>
                        <input type="password" name="password" class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input" placeholder="Password">
                        </div>
                    </div>

                    <!-- Password Reset -->
                    <div class="form-group">
                        <div class="input-icon">
                        <span class="fables-iconpassword fables-input-icon font-19 mt-1"></span>
                        <input type="password" name="password_confirmation" class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input" placeholder="Repeat Password">
                        </div>

                    </div>
                    <button type="submit" class="btn btn-block rounded-0 white-color fables-main-hover-background-color fables-second-background-color font-16 semi-font py-3">Reset Password</button>
                </form>
         </div>
    </div>

</div>

<!-- /End page content -->

@endsection
