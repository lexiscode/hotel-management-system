@extends('web.frontend.layouts.master')

@section('partner-reset-password')

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url('{{ asset('assets/img/carousel-1.jpg') }}');">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center pb-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Reset Password</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Partner</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Reset Password</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Start page content -->
<div class="container">
    <div class="row my-4 my-lg-5">
         <div class="col-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3 text-center">
            <h1 class="m-0 text-primary text-uppercase">Hotelex</h1>
            <p class="font-20 semi-font fables-main-text-color mt-4 mb-5">Update Your Account Info</p>

                <form method="POST" action="{{ route('partner.reset-password.send') }}">
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
