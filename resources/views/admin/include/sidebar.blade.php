<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand py-3" href="{{ url('admin/dashboard') }}">
            <div class="logo-img text-center ml-45">
                <img height="52" style="align-items: center" src="{{ asset('logo/logo.png') }}" class="header-brand-img"
                    alt="Admin Logo" title="Admin">
            </div>
        </a>
        <div class="sidebar-action"></div>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    @php
        $segment1 = request()->segment(1);
        $segment2 = request()->segment(2);
    @endphp

    <div class="sidebar-content ">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item mt-4 {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ url('admin/dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                </div>
                <div
                    class="nav-item {{ request()->is('admin/project-request*') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-users"></i><span>{{ __('Project Req Management') }}</span></a>
                    <div class="submenu-content">
                        <a href="{{ url('/admin/project-request-details') }}"
                            class="menu-item {{ request()->is('admin/project-request-details') ? 'active' : '' }}">{{ __('Project Req Details') }}</a>
                        <a href="{{ route('admin.project-request.attended') }}"
                            class="menu-item {{ request()->is('admin/project-request-attended') ? 'active' : '' }}">{{ __('Attended Requests') }}</a>
                        <!--<a href="{{ url('admin/member-security') }}" class="menu-item {{ $segment1 == 'badges' ? 'active' : '' }}">{{ __('Members Security') }}</a>-->
                        {{-- <a href="{{ url('admin/account-control') }}"
                            class="menu-item {{ $segment1 == 'alerts' ? 'active' : '' }}">{{ __('Account Control') }}</a>
                        <a href="{{ url('admin/wallet-address') }}"
                            class="menu-item {{ $segment1 == 'badges' ? 'active' : '' }}">{{ __('Member Wallet Address') }}</a>
                        <a
                            href="{{ url('admin/free-pin-account') }}"class="menu-item {{ $segment1 == 'free-pin-account' ? 'active' : '' }}">{{ __('Free Pin Members') }}</a> --}}
                    </div>
                </div>
                <div
                    class="nav-item {{ request()->is('admin/member-details') || request()->is('admin/company-wise-member') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-users"></i><span>{{ __('Member Management') }}</span></a>
                    <div class="submenu-content">
                        <a href="{{ url('admin/member-details') }}"
                            class="menu-item {{ request()->is('admin/member-details') ? 'active' : '' }}">{{ __('Members Details') }}</a>
                        <a href="{{ route('admin.company-wise-member') }}"
                            class="menu-item {{ request()->is('admin/company-wise-member') ? 'active' : '' }}">{{ __('Company Wise Member') }}</a>
                        {{-- <a href="{{ url('admin/member-security') }}"
                            class="menu-item {{ $segment1 == 'badges' ? 'active' : '' }}">{{ __('Members Security') }}</a>
                        <a href="{{ url('admin/free-pin-account') }}"
                            class="menu-item {{ $segment1 == 'badges' ? 'active' : '' }}">{{ __('Free Pin Activation') }}</a>
                        <a href="{{ url('admin/wallet-address') }}"
                            class="menu-item {{ $segment1 == 'badges' ? 'active' : '' }}">{{ __('Member Wallet Address') }}</a> --}}
                    </div>
                </div>
                <div
                    class="nav-item {{ request()->is('admin/blog*') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-mail"></i><span>{{ __('Blog Management') }}</span></a>
                    <div class="submenu-content">
                        <a href="{{ route('admin.blog.index') }}"
                            class="menu-item {{ request()->is('admin/blog') ? 'active' : '' }}">{{ __('Create Blog') }}</a>
                        <a href="{{ route('admin.blog.details') }}"
                            class="menu-item {{ request()->is('admin/blog/details') ? 'active' : '' }}">{{ __('Blog Details') }}</a>
                        {{-- <a href="{{ url('admin/support/close-support-ticket') }}"
                            class="menu-item {{ $segment1 == 'badges' ? 'active' : '' }}">{{ __('') }}</a> --}}
                    </div>
                </div>
                <div class="nav-item mt-4 {{ request()->is('admin/settings') ? 'active' : '' }}">
                    <a href="{{ url('admin/settings') }}"><i class="ik ik-mail"></i><span>Email Marketing</span></a>
                </div>
                <div class="nav-item {{ $segment1 == 'rest-api' ? 'active' : '' }}">
                    <a href="{{ url('admin/logout') }}"><i class="ik ik-stop-circle"></i><span>Logout</span> </a>
                </div>
                <!-- end inventory pages -->
        </div>
    </div>
</div>
