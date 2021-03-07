<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CodeHacking | The Blogging Site</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">

    <!-- vendor css -->
    <link href="{{ asset('assets/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/jquery-switchbutton/jquery.switchButton.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/rickshaw/rickshaw.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/chartist/chartist.css') }}" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bracket.css') }}">
</head>

<body>

<!-- START: LEFT PANEL -->
<div class="br-logo"><a href="{{ url('/admin') }}"><span>[</span>CodeHacking<span>]</span></a></div>
<div class="br-sideleft overflow-y-auto">
    <div class="br-sideleft-menu mg-t-20">
        <!-- Admin Dashboard Link -->
        <x-sidebar-menu-links.admin-dashboard-link></x-sidebar-menu-links.admin-dashboard-link>
        <!-- Admin Categories Link -->
        <x-sidebar-menu-links.admin-categories-links></x-sidebar-menu-links.admin-categories-links>
        <!-- Admin Posts Link -->
        <x-sidebar-menu-links.admin-posts-links></x-sidebar-menu-links.admin-posts-links>
        <!-- Admin Users Link -->
        <x-sidebar-menu-links.admin-users-links></x-sidebar-menu-links.admin-users-links>
        <!-- Admin Visit Website Link -->
        <x-sidebar-menu-links.admin-visit-website-link></x-sidebar-menu-links.admin-visit-website-link>
    </div>
</div>
<!-- END: LEFT PANEL -->

<!-- START: HEAD PANEL -->
<div class="br-header">
    <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
    </div><!-- br-header-left -->
    <div class="br-header-right">
        <!-- Admin Profile Link -->
        <x-header.admin-profile-link></x-header.admin-profile-link>
    </div><!-- br-header-right -->
</div>
<!-- END: HEAD PANEL -->

<!--START: MAIN PANEL -->
<div class="br-mainpanel">

    @yield('content')

    <!-- Footer -->
    <x-footer.footer-info></x-footer.footer-info>

</div>
<!-- END: MAIN PANEL -->

<script src="{{ asset('assets/lib/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/lib/popper.js/popper.js') }}"></script>
<script src="{{ asset('assets/lib/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
<script src="{{ asset('assets/lib/moment/moment.js') }}"></script>
<script src="{{ asset('assets/lib/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/lib/jquery-switchbutton/jquery.switchButton.js') }}"></script>
<script src="{{ asset('assets/lib/peity/jquery.peity.js') }}"></script>
<script src="{{ asset('assets/lib/chartist/chartist.js') }}"></script>
<script src="{{ asset('assets/lib/jquery.sparkline.bower/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/lib/d3/d3.js') }}"></script>
<script src="{{ asset('assets/lib/rickshaw/rickshaw.min.js') }}"></script>


<script src="{{ asset('assets/js/bracket.js') }}"></script>
<script src="{{ asset('assets/js/ResizeSensor.js') }}"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
<script>
    $(function(){
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function(){
            minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
            if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
                // show only the icons and hide left menu label by default
                $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
                $('body').addClass('collapsed-menu');
                $('.show-sub + .br-menu-sub').slideUp();
            } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
                $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
                $('body').removeClass('collapsed-menu');
                $('.show-sub + .br-menu-sub').slideDown();
            }
        }
    });
</script>
</body>
</html>
