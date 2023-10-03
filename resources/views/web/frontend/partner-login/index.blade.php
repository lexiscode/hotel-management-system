@extends('web.frontend.layouts.master')

@section('partner-login')

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url('{{ asset('assets/img/carousel-1.jpg') }}');">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center pb-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Partners Login</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Partners</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Login</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Start page content -->

<div class="container">
    <div class="row my-4 my-lg-5">
        <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 text-center">
            <h1 class="m-0 text-primary text-uppercase">Hotelex</h1>
            <p class="font-20 semi-font fables-main-text-color mt-4 mb-4 mb-lg-5">Our Partners Only</p>

            <!--Displays "please login first" error on unauthorize admin user-->
            @if (session()->has('error'))
            <p class='text-sm text-red-600 space-y-1' style="text-align:center">
                {{ session()->get('error') }}
            </p>
            @endif

            @if (session()->has('success'))
                <p class='text-sm text-green-600 space-y-1' style="text-align:center">
                    {{ session()->get('success') }}
                </p>
            @endif

            <form method="POST" action="{{ route('partner.login') }}">
                @csrf
                <div class="form-group">
                    <div class="input-icon">
                        <span class="fables-iconemail fables-input-icon mt-2 font-13"></span>
                        <input type="email" name="email" class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input"  placeholder="Email">
                    </div>

                </div>
                <div class="form-group">
                    <div class="input-icon">
                    <span class="fables-iconpassword fables-input-icon font-19 mt-1"></span>
                    <input type="password" name="password" class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input" placeholder="Password">
                    </div>

                </div>
                <button type="submit" class="btn btn-block rounded-0 white-color fables-main-hover-background-color fables-second-background-color font-16 semi-font py-3">Sign in</button>
                <a href="{{ route('admin.forgot-password') }}" class="fables-forth-text-color font-16 fables-second-hover-color underline mt-3 mb-4 m-lg-5 d-block">Forgot Password ?</a>
            </form>

         </div>
    </div>

</div>

<!-- End page content -->

@endsection
