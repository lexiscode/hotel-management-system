<div class="navbar-bg"></div>

<!-- Navbar starts -->
@include('partner.layouts.navbar')
<!-- Navbar ends -->

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('web.home') }}">Hotelex</a>
            {{-- <a href="{{ route('view.home') }}"><img src={{ asset('users/images/logo.png') }} alt="Realestate"></a> --}}
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('web.home') }}">LX-J</a>
        </div>
        <ul class="sidebar-menu">

            <li class="dropdown">
                <li class="{{ setSidebarActive(['partner.dashboard.*']) }}">
                <a href="{{ route('partner.dashboard.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                </li>
            </li>


            <li class="menu-header">Notifications</li>
            <li class="{{ setSidebarActive(['partner.contact-enquiry.*']) }}"><a class="nav-link" href="{{ route('partner.contact-enquiry.index') }}"><i class="fas fa-envelope"></i> <span>Messages</span></a></li>


            <li class="menu-header">Manage Bookings Record</li>
            <li class="{{ setSidebarActive(['partner.manage-booking.*']) }}"><a class="nav-link" href="{{ route('partner.manage-booking.index') }}"><i class="fab fa-blogger"></i><span>Manage Bookings</span></a></li>
            <li class="{{ setSidebarActive(['partner.manage-booking.*']) }}"><a class="nav-link" href="{{ route('partner.statement.index') }}"><i class="fab fa-blogger"></i><span>Statements</span></a></li>
        </ul>

    </aside>
</div>

