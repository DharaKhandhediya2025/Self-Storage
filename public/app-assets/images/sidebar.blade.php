 <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark gradient-45deg-deep-purple-blue sidenav-gradient sidenav-active-rounded">



        <div class="brand-sidebar">



            <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="index.html"><img class="hide-on-med-and-down " src="{{ url('/public/app-assets/images/logo/logo.png') }}" alt="materialize logo" /><img class="show-on-medium-and-down hide-on-med-and-up" src="{{ url('/public/app-assets/images/logo/materialize-logo-color.png')}}" alt="materialize logo" /><!-- <span class="logo-text hide-on-med-and-down">Caffeto</span> --></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>



        </div>



        <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">



            <li class="active bold"><a class="collapsible-header waves-effect waves-cyan " href="{{ url('/admin') }}"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>



               



            </li>



            <li class="navigation-header">



              <a class="navigation-header-text">Pages</a>



               <i class="navigation-header-icon material-icons">more_horiz</i>



        </li>



        <li class="bold">



              <a class="waves-effect waves-cyan " href="{{ route('admin.hospital')}}"><i class="material-icons">perm_identity</i>



              <span class="menu-title" data-i18n="Mail">Hospital List</span>



              </a>



        </li>



            <li class="bold">



              <a class="waves-effect waves-cyan " href="{{ route('admin.nurse')}}"><i class="material-icons">perm_identity</i>



              <span class="menu-title" data-i18n="Mail">Nurse List</span>



              </a>



        </li>







        <li class="bold">



              <a class="waves-effect waves-cyan " href="{{ route('admin.parents')}}"><i class="material-icons">person</i>



              <span class="menu-title" data-i18n="Mail">Parents List</span>



              </a>



        </li>

        <li class="bold {{ Request::segment(2)=='images' ? 'active open' : '' }}">

               <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">

               <i class="material-icons">school</i>

               <span class="menu-title" data-i18n="Invoice">Image</span>

               </a>

                <div class="collapsible-body">

                  <ul class="collapsible collapsible-sub" data-collapsible="accordion">

                  <li>

                    <a href="" class="{{ Request::path() == 'admin/images' ? 'active' : '' }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Invoice List">Image List</span>

                    </a>

                  </li>

                  <li>

                    <a href="" class="{{ Request::path() == 'admin/images/create' ? 'active' : '' }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Invoice Add">Add New</span>

                    </a>

                  </li>

                </ul>

              </div>

        </li>

         <!--   <li class="bold {{ Request::segment(2)=='tax' ? 'active open' : '' }}">

               <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">

               <i class="material-icons">school</i>

               <span class="menu-title" data-i18n="Invoice">Tax</span>

               </a>

                <div class="collapsible-body">

                  <ul class="collapsible collapsible-sub" data-collapsible="accordion">

                  <li>

                    <a href="" class="{{ Request::path() == 'admin/tax' ? 'active' : '' }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Invoice List">Tax List</span>

                    </a>

                  </li>

               



                </ul>

              </div>

        </li>

        <li class="bold {{ Request::segment(2)=='busniessType' ? 'active open' : '' }}">

               <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">

               <i class="material-icons">school</i>

               <span class="menu-title" data-i18n="Invoice">BusniessType</span>

               </a>

                <div class="collapsible-body">

                  <ul class="collapsible collapsible-sub" data-collapsible="accordion">

                  <li>

                    <a href="" class="{{ Request::path() == 'admin/busniessType' ? 'active' : '' }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Invoice List">BusniessType List</span>

                    </a>

                  </li>

                  <li>

                    <a href="" class="{{ Request::path() == 'admin/busniessType/create' ? 'active' : '' }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Invoice Add">Add New</span>

                    </a>

                  </li>



                </ul>

              </div>

        </li>

     <li class="bold {{ Request::segment(2)=='transaction' ? 'active open' : '' }}">

               <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">

               <i class="material-icons">monetization_on</i>

               <span class="menu-title" data-i18n="Invoice">Withdraw request</span>

               </a>

                <div class="collapsible-body">

                  <ul class="collapsible collapsible-sub" data-collapsible="accordion">

                  <li>

                    <a href="" class="{{ Request::path() == 'admin/transaction' ? 'active' : '' }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Invoice List">List WithdrawRequest</span>

                    </a>

                  </li>

                 

                </ul>

              </div>

        </li> -->

        </ul>



        <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>



    </aside>