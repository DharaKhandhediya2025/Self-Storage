<!-- BEGIN: SideNav-->
<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark sidenav-active-rounded">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper">
            <a class="brand-logo darken-1 sidebar_logo" href="{{ url('/admin/dashboard') }}">
                <img class="hide-on-med-and-down " src="{{ config('global.front_base_url').'images/Logo-white.png'}}" alt="Self Storage" />
                <img class="show-on-medium-and-down hide-on-med-and-up" src="{{ config('global.front_base_url').'images/Logo-white.png'}}" alt="Self Storage" />
            </a>
        </h1>
    </div>

    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="accordion">

        <li class="active bold">
            <a class="waves-effect waves-cyan {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ url('/admin/dashboard') }}" title="Dashboard">
                <i class="material-icons">dashboard</i><span class="menu-title" data-i18n="Dashboard">Dashboard</span>
            </a>
        </li>

        <li class="active bold">
            <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'banner') ? 'active' : '' }}" href="{{ url('/admin/banners') }}" title="Banners">
                <i class="material-icons">image</i><span class="menu-title" data-i18n="Banners">Banners
                </span>
            </a>
        </li>

        <li class="active bold">
            <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'country') ? 'active' : '' }}" href="{{ url('/admin/country') }}" title="Country">
                <i class="material-icons">my_location</i><span class="menu-title" data-i18n="Country">Country</span>
            </a>
        </li>

        <li class="bold">
            <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'category') ? 'active' : '' }}" href="{{ url('/admin/category') }}" title="Category">
                <i class="material-icons">view_list</i><span class="menu-title" data-i18n="Category">Category</span>
            </a>
        </li>

        <!-- <li class="bold">
            <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'admin/subcategory') ? 'active' : '' }}" href="{{ url('/admin/subcategory') }}" title="Sub Category">
                <i class="material-icons">view_list</i><span class="menu-title" data-i18n="Sub Category">Sub Category</span>
            </a>
        </li> -->

        <li class="bold">
            <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'amenities') ? 'active' : '' }}" href="{{ url('/admin/amenities') }}" title="Amenities">
                <i class="material-icons">view_list</i><span class="menu-title" data-i18n="Amenities">Amenities</span>
            </a>
        </li>

        <li class="bold">
            <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'admin/sellers') ? 'active' : '' }}" href="{{ url('/admin/sellers') }}" title="Sellers">
                <i class="material-icons">person</i><span class="menu-title" data-i18n="Sellers">Sellers
                </span>
            </a>
        </li>

        <li class="bold">
            <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'admin/storage') ? 'active' : '' }}" href="{{ url('/admin/storages') }}" title="Storage">
                <i class="material-icons">view_list</i><span class="menu-title" data-i18n="Storage">Storage</span>
            </a>
        </li>

        <li class="bold">
            <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'featured-plan') ? 'active' : '' }}" href="{{ url('/admin/featured-plan') }}" title="Featured Plan">
                <i class="material-icons">view_list</i><span class="menu-title" data-i18n="Featured Plan">Featured Plan</span>
            </a>
        </li>

        <li class="bold">
            <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'admin/buyers') ? 'active' : '' }}" href="{{ url('/admin/buyers') }}" title="Buyers">
                <i class="material-icons">person</i><span class="menu-title" data-i18n="Buyers">Buyers
                </span>
            </a>
        </li>

        <li class="bold">
            <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'admin/inquiry') ? 'active' : '' }}" href="{{ url('/admin/inquiry') }}" title="Inquiry">
                <i class="material-icons">view_list</i><span class="menu-title" data-i18n="Inquiry">Inquiry</span>
            </a>
        </li>

        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">assignment</i><span data-i18n="Content Page">Content Pages</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li class="bold">
                        <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'faq') ? 'active' : '' }}" href="{{ url('/admin/faq-list') }}">
                            <i class="material-icons">question_answer</i><span class="menu-title" data-i18n="FAQ's">FAQ's</span>
                        </a>
                    </li>
                    <li class="bold">
                        <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'admin/terms-condition') ? 'active' : '' }}" href="{{ url('/admin/terms-condition') }}">
                            <i class="material-icons">import_contacts</i><span class="menu-title" data-i18n="Terms & Conditions">Terms & Conditions</span>
                        </a>
                    </li>
                    <li class="bold">
                        <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'admin/privacy-policy') ? 'active' : '' }}" href="{{ url('/admin/privacy-policy') }}">
                            <i class="material-icons">import_contacts</i><span class="menu-title" data-i18n="Privacy Policy">Privacy Policy</span>
                        </a>
                    </li>
                    <li class="bold">
                        <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'admin/about-us') ? 'active' : '' }}" href="{{ url('/admin/about-us') }}">
                            <i class="material-icons">import_contacts</i><span class="menu-title" data-i18n="About Us">About Us</span>
                        </a>
                    </li>
                    <li class="bold">
                        <a class="waves-effect waves-cyan {{ str_contains(request()->url(),'admin/contact-us') ? 'active' : '' }}" href="{{ url('/admin/contact-us') }}">
                            <i class="material-icons">phone</i><span class="menu-title" data-i18n="Contact Us">Contact Us</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>

    <div class="navigation-background"></div>

    <a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
<!-- END: SideNav-->