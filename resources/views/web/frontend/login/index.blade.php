@extends('web.frontend.layouts.master')

@section('login')

<!-- Start Header -->
<div class="fables-header fables-after-overlay">
    <div class="container">
         <h2 class="fables-page-title fables-second-border-color">Signin</h2>
    </div>
</div>
<!-- /End Header -->

<!-- Start Breadcrumbs -->
<div class="fables-light-background-color">
    <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="fables-breadcrumb breadcrumb px-0 py-3">
            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="fables-second-text-color">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Signin</li>
          </ol>
        </nav>
    </div>
</div>
<!-- /End Breadcrumbs -->

<!-- Start page content -->

<div class="container">
    <div class="row my-4 my-lg-5">
         <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 text-center">
              <img src="assets/custom/images/signin-logo.png" alt="signin" class="img-fluid">
              <p class="font-20 semi-font fables-main-text-color mt-4 mb-4 mb-lg-5">Sign In Fables</p>
              <form>
                 <div class="form-group">
                     <div class="input-icon">
                         <span class="fables-iconemail fables-input-icon mt-2 font-13"></span>
                         <input type="email" class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input"  placeholder="Email">
                     </div>

                 </div>
                 <div class="form-group">
                     <div class="input-icon">
                        <span class="fables-iconpassword fables-input-icon font-19 mt-1"></span>
                        <input type="password" class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input" placeholder="Password">
                     </div>

                 </div>
                 <button type="submit" class="btn btn-block rounded-0 white-color fables-main-hover-background-color fables-second-background-color font-16 semi-font py-3">Sign in</button>
                 <a href="#" class="fables-forth-text-color font-16 fables-second-hover-color underline mt-3 mb-4 m-lg-5 d-block">Forgot Password ?</a>
                 <p class="fables-forth-text-color">Don't have an account ?<a href="{{ route('web.register') }}" class="font-16 semi-font fables-second-text-color underline fables-main-hover-color ml-2">Register</a></p>
               </form>
         </div>
    </div>

</div>

<!-- End page content -->

@endsection
