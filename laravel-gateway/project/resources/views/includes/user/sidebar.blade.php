<aside class="dashboard-sidebar">
    <div class="bg--gradient">&nbsp;</div>
    <div class="dashboard-sidebar-inner">
        <div class="user-sidebar-header">
            <a href="{{ url('/') }}">
                <img src="{{asset('assets/images/logo.png')}}" alt="logo">
            </a>
            <div class="sidebar-close">
                <span class="close">&nbsp;</span>
            </div>
        </div>
        <div class="user-sidebar-body">
            <ul class="user-sidbar-link">
                <li>
                    <span class="subtitle">@lang('General Information')</span>
                </li>
                <li>
                    <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'active' : ''}}">
                        <span class="icon"><i class="fas fa-archive"></i></span>
                        @lang('Dashboard')
                    </a>
                </li>

                <li>
                    <a href="{{ route('user.logout') }}">
                        <span class="icon"><i class="fas fa-exchange-alt"></i></span>
                        @lang('Logout')
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
