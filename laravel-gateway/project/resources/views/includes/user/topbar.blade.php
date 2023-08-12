<div class="dashboard-header bg--gradient">
    <div class="navbar-top">
        <div class="container-fluid">
            <ul class="d-flex align-items-center justify-content-between py-1 py-md-0">
                <li>
                    <div class="nav-toggle me-3">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </li>
                <li class="me-3">
                    <div class="change-language">
                        <select name="language" class="language selectors nice language-bar">
                                <option value="">
                                    en
                                </option>
                        </select>
                    </div>
                </li>

                <li class="ms-auto me-2">
                    <div class="change-language">
                        <select name="currency" class="currency selectors nice language-bar">
                                <option value="">
                                    USD
                                </option>
                        </select>
                    </div>
                </li>

                <li class="me-2">
                    <div class="mode--toggle">
                        <i class="fas fa-moon"></i>
                    </div>
                </li>

                <li class="position-relative">
                    <a href="javascript:void(0)" class="dashboard-header-profile">
                        <img src="{{asset('assets/front/images/clients/client1.jpg')}}" alt="clients">
                        <div class="name d-none d-sm-block">
                           {{ auth()->user()->name }}
                        </div>
                    </a>
                    <div class="user-toggle-menu">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fas fa-unlock"></i>
                                    @lang('Change Password')
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('user.logout') }}">
                                    <i class="fas fa-sign-out-alt"></i>
                                    @lang('Logout')
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
