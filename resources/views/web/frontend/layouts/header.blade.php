<div class="search-section">
    <a class="close-search" href="#"></a>
    <div class="d-flex justify-content-center align-items-center h-100">
        <form method="post" action="#" class="w-50">
            <div class="row">
                <div class="col-10">
                    <input type="search" value="" class="form-control palce bg-transparent border-0 search-input"
                        placeholder="Search Here ..." />
                </div>
                <div class="col-2 mt-3">
                    <button type="submit" class="btn bg-transparent text-white">
                        <i class="fas fa-search"></i>
                    </button>
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

<!-- Start Top Header -->
<div class="fables-forth-background-color fables-top-header-signin">
    <div class="container">
        <div class="row" id="top-row">
            <div class="col-12 col-sm-2 col-lg-5">
                <div class="dropdown">
                    <button
                        class="btn btn-secondary dropdown-toggle border-0 bg-transparent font-13 lang-dropdown-btn pl-0"
                        type="button" id="dropdownLangButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        language
                    </button>
                    <div class="dropdown-menu p-0 fables-forth-background-color rounded-0 m-0 border-0 lang-dropdown"
                        aria-labelledby="dropdownLangButton">
                        <a class="dropdown-item white-color font-13 fables-second-hover-color" href="#">
                            <img src="assets/custom/images/england.png" alt="england flag" class="mr-1"> English</a>
                        <a class="dropdown-item white-color font-13 fables-second-hover-color" href="#">
                            <img src="assets/custom/images/France.png" alt="england flag" class="mr-1"> French</a>
                    </div>
                </div>

            </div>
            <div class="col-12 col-sm-5 col-lg-4 text-right">
                <p class="fables-third-text-color font-13"><span class="fables-iconphone"></span> Phone : (888) 6000
                    6000 - (888) 6000 6000</p>
            </div>
            <div class="col-12 col-sm-5 col-lg-3 text-right">
                <p class="fables-third-text-color font-13"><span class="fables-iconemail"></span> Email:
                    Design@domain.com</p>
            </div>

        </div>
    </div>
</div>

<!-- /End Top Header -->

<!-- Start Fables Navigation -->
<div class="fables-navigation fables-main-background-color py-3 py-lg-0">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 col-lg-9 pr-md-0">
                <nav class="navbar navbar-expand-md btco-hover-menu py-lg-2">

                    <a class="navbar-brand pl-0" href="{{ url('/') }}"><img src="{{ asset('assets/custom/images/fables-logo.png') }}"
                            alt="Fables Template" class="fables-logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#fablesNavDropdown" aria-controls="fablesNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="fables-iconmenu-icon text-white font-16"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="fablesNavDropdown">

                        <ul class="navbar-nav mx-auto fables-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}" id="sub-nav2" aria-haspopup="true" aria-expanded="false">
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

                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{ route('web.contact') }}" id="sub-nav7" aria-haspopup="true" aria-expanded="false">
                                    Contact Us
                                </a>
                            </li>
                        </ul>

                    </div>
                </nav>
            </div>



            <div class="col-12 col-md-2 col-lg-3 pr-md-0 icons-header-mobile">
                <div class="fables-header-icons">
                    <a href="#"
                        class="open-search fables-third-text-color right  top-header-link px-3 px-md-2 px-lg-4 fables-second-hover-color max-line-height">
                        <span class="fas fa-search" style="color: #fafafa;"></span>
                    </a>
                    <a href="{{ route('web.login') }}"
                        class="fables-third-text-color fables-second-hover-color font-13 top-header-link px-3 px-md-2 px-lg-4 max-line-height">
                        <span class="fas fa-user" style="color: #fcfcfd;"></span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Navigation -->
