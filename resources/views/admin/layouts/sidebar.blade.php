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

            <li class="{{ setSidebarActive(['admin.contact-enquiry.*']) }}"><a class="nav-link" href="{{ route('admin.post-enquiry.index') }}"><i class="fas fa-envelope"></i> <span>Messages</span></a></li>


            <li class="menu-header">Navigation Menu</li>

            <li class="{{ setSidebarActive(['admin.blog.*']) }}"><a class="nav-link" href="{{ route('admin.blog.index') }}"><i class="fab fa-blogger"></i> <span>Blogs</span></a></li>



            <li class="menu-header">Manage Site Settings</li>

            <li class="{{ setSidebarActive(['admin.setting.*']) }}"><a class="nav-link" href="{{ route('admin.setting.index') }}"><i class="fas fa-cog"></i> <span>Settings</span></a></li>


        </ul>

    </aside>
</div>

