<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true"
     data-img="{{asset('assets/images/backgrounds/02.jpg')}}">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href=""><img
                        class="brand-logo"
                        alt="Conovoinc"
                        src="{{asset('assets/images/logo/logo.svg')}}"/>
{{--                    <h3 class="brand-text">Conovo Inc</h3>--}}
                </a></li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
    </div>
    <div class="navigation-background"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item " id="dashboard"><a class="menu-item" href=""><i class="ft-airplay"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
            </li>


            <li class="nav-item "><a class="menu-item" href="#"><i class="ft-layout"></i><span class="menu-title" data-i18n="">Blogs <small>create or manage blogs for front pages</small></span></a>
                <ul class="menu-content">
                    <li id="sidebar_item_blog_index"><a class="menu-item" href="#">Manage All</a></li>

                    <li id="sidebar_item_blog_create"><a class="menu-item" href="#">Add Blog</a></li>

                </ul>
            </li>

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
