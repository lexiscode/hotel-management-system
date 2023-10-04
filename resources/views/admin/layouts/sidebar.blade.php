<div class="navbar-bg"></div>

<!-- Navbar starts -->
@include('admin.layouts.navbar')
<!-- Navbar ends -->

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('web.home') }}">LexJoe</a>
            {{-- <a href="{{ route('view.home') }}"><img src={{ asset('users/images/logo.png') }} alt="Realestate"></a> --}}
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('web.home') }}">LX-J</a>
        </div>
        <ul class="sidebar-menu">

            <li class="dropdown">
                <li class="{{ setSidebarActive(['admin.dashboard.*']) }}">
                <a href="{{ route('admin.dashboard.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                </li>
            </li>


            <li class="menu-header">Notifications</li>

            <li class="{{ setSidebarActive(['admin.contact-enquiry.*']) }}"><a class="nav-link" href="{{ route('admin.contact-enquiry.index') }}"><i class="fas fa-envelope"></i> <span>Messages</span></a></li>


            <li class="menu-header">Navigation Menu</li>

            <li class="{{ setSidebarActive(['admin.manage-partner.*']) }}"><a class="nav-link" href="{{ route('admin.manage-partner.index') }}"><i class="fab fa-blogger"></i> <span>Manage Partners</span></a></li>


            <li class="menu-header">Testimonials</li>

            <li class="{{ setSidebarActive(['admin.testimonial.*']) }}"><a class="nav-link" href="{{ route('admin.testimonial.index') }}"><i class="fab fa-blogger"></i> <span>Testimonials</span></a></li>

            <li class="menu-header">Newsletters</li>

            <li class="{{ setSidebarActive(['admin.newsletter.*']) }}"><a class="nav-link" href="{{ route('admin.newsletter.index') }}"><i class="fab fa-blogger"></i> <span>Newsletter</span></a></li>

        </ul>

    </aside>
</div>

