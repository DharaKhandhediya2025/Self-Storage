<!-- BEGIN: Header-->
<header class="page-topbar" id="header">
    <div class="navbar navbar-fixed">
        <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-light">
            <div class="nav-wrapper">
                <ul class="navbar-list right">
                    <li>
                        <a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online" style="width: 35px;"><img src="{{config('global.front_base_url').'images/favicon.png'}}" alt="avatar"><i></i></span></a>
                    </li>
                </ul>

                <ul class="dropdown-content" id="profile-dropdown">
                    
                    <li><a class="grey-text text-darken-1" href="{{ route('admin.changepassword') }}">
                        <i class="material-icons">edit</i>Change Password</a></li>

                    <li>
                        <a class="grey-text text-darken-1" href="{{ url('/admin/logout') }}" onclick="return confirm('Are you sure you want to logout?')">
                        <i class="material-icons">power_settings_new</i>{{ __('Logout')}}</a>
                    </li>
                </ul>
            </div>

            <nav class="display-none search-sm">
                <div class="nav-wrapper">
                    <form id="navbarForm">
                        <div class="input-field search-input-sm">
                            <input class="search-box-sm mb-0" type="search" required="" id="search" placeholder="Explore Materialize" data-search="template-list">

                            <label class="label-icon" for="search"><i class="material-icons search-sm-icon">search</i></label><i class="material-icons search-sm-close">close</i>

                            <ul class="search-list collection search-list-sm display-none"></ul>
                        </div>
                    </form>
                </div>
            </nav>
        </nav>
    </div>
</header>
<!-- END: Header-->