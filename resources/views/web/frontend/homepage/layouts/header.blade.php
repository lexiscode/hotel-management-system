<div class="search-section">
    <a class="close-search" href="#"></a>
    <div class="d-flex justify-content-center align-items-center h-100">
        <form method="post" action="#" class="w-50">
            <div class="row">
                <div class="col-10">
                    <input type="search" value="" class="form-control palce bg-transparent border-0 search-input" placeholder="Search Here ..." />
                </div>
                <div class="col-2 mt-3">
                     <button type="submit" class="btn bg-transparent text-white"> <i class="fas fa-search"></i> </button>
                </div>
            </div>
        </form>
    </div>

</div>

<!-- Loading Screen -->
<div id="ju-loading-screen">
  <div class="sk-double-bounce">
    <div class="sk-child sk-double-bounce1"></div>
    <div class="sk-child sk-double-bounce2"></div>
  </div>
</div>


<!-- /End Top Header -->

<div class="fables-transparent py-3 py-lg-0">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 pr-md-0">
                <nav class="navbar navbar-expand-md btco-hover-menu py-lg-2">

                    <a class="navbar-brand fables-logo-brand pl-0" href="#"><img src="{{ ('assets/custom/images/fables-logo.png') }}" alt="Fables Template" class="fables-logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#fablesNavDropdown" aria-controls="fablesNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars" style="color: #f7f7f8;"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="fablesNavDropdown">

                        <ul class="navbar-nav mx-auto fables-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}" id="sub-nav1" aria-haspopup="true" aria-expanded="false">
                                    Home
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('web.about') }}" id="sub-nav3" aria-haspopup="true" aria-expanded="false">
                                    About Us
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('web.testimonials') }}" id="sub-nav5" aria-haspopup="true" aria-expanded="false">
                                    Testimonials
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('web.blog') }}" id="sub-nav5" aria-haspopup="true" aria-expanded="false">
                                    Blog
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('web.contact') }}" id="sub-nav7" aria-haspopup="true" aria-expanded="false">
                                    Contact Us
                                </a>
                            </li>
                        </ul>

                    </div>
                </nav>
            </div>
            <div class="col-5 col-md-2 pr-md-0 icons-header-mobile">
                <div class="fables-header-icons pt-lg-4 text-right">
                    <a href="#" class="open-search fables-third-text-color fables-mega-menu-btn px-4  fables-second-hover-color">
                        <i class="fas fa-search" style="color: #fafafa;"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Start Header -->

<div class="fables-header fables-after-overlay overlay-lighter index-traingle bg-rules" style="background-image: url(assets/custom/images/index-background.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-7 mr-auto index-carousel">
                <div class="owl-carousel owl-theme default-carousel nav-0 z-index mt-md-4 mt-xl-5 pt-md-4 pt-xl-5 dots-0 pb-md-5">
                    <div class="pt-0 mt-0 pt-xl-5 mt-xl-5 wow slideInUp" data-wow-duration="2s" data-wow-delay=".4s">
                        <h1 class="fables-main-text-color font-weight-bold mb-1">CONSULTING SERVICE FOR ALL
                            <span class="fables-second-text-color">HOTELS IN NIGERIA</span>
                        </h1>
                        <p class="fables-forth-text-colo mb-3 light-font fables-header-slider-details">
                            Web apps can provide real-time updates on room availability, pricing, and promotions, ensuring that customers have the latest information.
                        </p>
                        <a href="{{ route('web.our-hotel-lists') }}" class="btn fables-second-background-color fables-second-border-color white-color rounded-0 mr-4 px-3 px-md-4 py-2 bg-hover-transparent fables-second-hover-color">Our Hotels</a>
                        <a href="#ourteam" class="btn fables-second-border-color fables-second-text-color rounded-0 px-3 px-md-4 py-2 fables-second-hover-background-color">Our Team</a>
                    </div>
                    <div class="pt-0 mt-0 pt-xl-5 mt-xl-5 wow slideInUp" data-wow-duration="2s" data-wow-delay=".8s">
                        <h1 class="fables-main-text-color font-weight-bold mb-1">CONSULTING SERVICE FOR ALL
                            <span class="fables-second-text-color">HOTELS IN NIGERIA</span>
                        </h1>
                        <p class="fables-forth-text-colo mb-3 light-font fables-header-slider-details">
                            Embrace eco-friendly practices by reducing paper usage and adopting digital processes that align with sustainability goals.
                        </p>
                        <a href="{{ route('web.our-hotel-lists') }}" class="btn fables-second-background-color fables-second-border-color white-color rounded-0 mr-4 px-3 px-md-4 py-2 bg-hover-transparent fables-second-hover-color">Our Hotels</a>
                        <a href="#ourteam" class="btn fables-second-border-color fables-second-text-color rounded-0 px-3 px-md-4 py-2 fables-second-hover-background-color">Our Team</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /End Header -->
