<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
          <!-- DataTables -->
        <link href="{{ asset('admin/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    
        <!-- Base Css Files -->
        <link href="{{ asset('/admin/css/bootstrap.min.css') }}" rel="stylesheet" />

         <link href="{{ asset('/admin/assets/sweet-alert/sweet-alert.init.js') }}" rel="stylesheet" />
         <link href="{{ asset('/admin/assets/sweet-alert/sweet-alert.min.css') }}" rel="stylesheet" />
         <link href="{{ asset('/admin/assets/sweet-alert/sweet-alert.min.js') }}" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="{{ asset('/admin/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('/admin/assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('/admin/css/material-design-iconic-font.min.css') }}" rel="stylesheet">

        <!-- animate css -->
        <link href="{{ asset('/admin/css/animate.css') }}" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="{{ asset('/admin/css/waves-effect.css') }}" rel="stylesheet">

        <!-- Custom Files -->
        <link href="{{ asset('/admin/css/helper.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/admin/css/style.css') }}" rel="stylesheet" type="text/css" />

        <script src="{{ asset('/admin/js/modernizr.min.js') }}"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
   
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Styles -->
    
</head>
<body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
                        @guest
                           
                        @else
                                 <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                @php
                    $logo = DB::table('settings')->first();
                @endphp
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="/" class="logo">
                            <img src="{{ asset('images/company') }}/{{ $logo->company_logo }}" style="height: 30px; width:50px;" class="annonce-img">
                            <span>{{ $logo->company_name }} </span>
                        </a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            {{-- <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form> --}}

                            
                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown hidden-xs">
                                    
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                                </li>
                                {{-- <li class="hidden-xs">
                                    <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                                </li> --}}
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="/images/profile.jpg" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        {{-- <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li> --}}
                                        <li><a href="{{ route('settings') }}"><i class="md md-settings"></i> Settings</a></li>
                                        
                                        <li>
                                            <a  href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                             
                                            <i class="md md-settings-power"></i> Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                             
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                   
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="/" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>
                             <li>
                                <a href="{{ route('pos') }}" class="waves-effect "><i class="fas fa-luggage-cart"></i><span><b>POS</b></span></a>
                            </li>
                            {{-- employee dropdown --}}
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fas fa-users"></i></i><span> Employee </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.employee') }}"><i class="far fa-plus"></i> Add Employee</a></li>
                                    <li><a href="{{ route('all.employee') }}"><i class="fas fa-users"></i>All Employee</a></li>
                                    
                                </ul>
                            </li>
                            {{-- customer dropdown --}}
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fas fa-users-class"></i><span> Customer </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.customer') }}"><i class="far fa-plus"></i> Add Customer</a></li>
                                    <li><a href="{{ route('all.customer') }}"><i class="fal fa-users-class"></i></i>All Customer</a></li>
                                    
                                </ul>
                            </li>
                             {{-- supplier dropdown --}}
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fas fa-people-carry"></i><span> Supplier </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.supplier') }}"><i class="far fa-plus"></i> Add Supplier</a></li>
                                    <li><a href="{{ route('all.supplier') }}"><i class="fas fa-users"></i>All Supplier</a></li>
                                    
                                </ul>
                            </li>
                             {{-- Salary dropdown --}}
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fas fa-dollar-sign"></i><span> Salary (EMP) </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.advance.salary') }}"><i class="fas fa-lightbulb-dollar"></i> Add Advance Salary</a></li>
                                    <li><a href="{{ route('all.advance.salary') }}"><i class="fas fa-funnel-dollar"></i> All Advance Salary</a></li>
                                     <li><a href="{{ route('pay.salary') }}"><i class="far fa-sack"></i> Pay Salary</a></li>
                                    <li><a href="{{ route('all.pay.salary') }}"><i class="fal fa-receipt"></i> View Pay All Salary</a></li>
                                    
                                </ul>
                            </li>
                            {{-- category section --}}
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fas fa-align-justify"></i><span> Category </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.category') }}"><i class="far fa-plus"></i> Add Category</a></li>
                                    <li><a href="{{ route('all.category') }}"><i class="fas fa-border-all"></i> All Category</a></li>
                                    
                                </ul>
                            </li>
                             {{-- Product section --}}
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fab fa-product-hunt"></i><span> Product </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.product') }}"><i class="far fa-plus"></i> Add Product</a></li>
                                    <li><a href="{{ route('all.product') }}"><i class="fas fa-border-all"></i> All Product</a></li>
                                    <li><a href="{{ route('import.product') }}"><i class="fas fa-file-import"></i>Import Product</a></li>
                                    
                                </ul>
                            </li>
                            {{-- Expense section --}}
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fas fa-balance-scale-right"></i><span> Expense </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.expense') }}"><i class="fas fa-plus"></i> Add Expense</a></li>
                                    <li><a href="{{ route('today.expense') }}"><i class="fas fa-calendar-week"></i> Today's Expense</a></li>
                                    <li><a href="{{ route('month.expense') }}"><i class="fas fa-stream"></i> This Month</a></li>
                                    <li><a href="{{ route('year.expense') }}"><i class="fas fa-layer-group"></i> Yearly expense</a></li>
                                    
                                </ul>
                            </li>
                             {{-- orders section --}}
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fal fa-sort-size-down"></i><span> Orders </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    {{-- <li><a href="{{ route('pending.order') }}"><i class="fas fa-bell-exclamation"></i> Pending Order </a></li> --}}
                                    {{-- <li><a href="{{ route('success.order') }}"><i class="fas fa-smile"></i> Approved Order</a></li> --}}
                                    <li><a href="{{ route('view.order') }}"><i class="fas fa-smile"></i> View Order</a></li>
                                </ul>
                            </li>
                             {{-- Sales report section --}}
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fas fa-hotel"></i><span> Sales Report </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('daily.report') }}"><i class="fas fa-calendar-week"></i> Daily Report </a></li>
                                    <li><a href="{{ route('monthly.report') }}"><i class="fas fa-calendar-week"></i> Monthly Report </a></li>
                                   
                                </ul>
                            </li>

                            {{-- profit --}}
                             <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fas fa-hotel"></i><span> Profit</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('monthly.profit') }}"><i class="fas fa-calendar-week"></i> Monthly Profit </a></li>
                                   
                                </ul>
                            </li>
                             {{-- Attendences section --}}
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fas fa-satellite"></i><span> Attendence </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('take.attendence') }}"><i class="far fa-hand-point-right"></i> Take Attendence </a></li>
                                    <li><a href="{{ route('all.attendence') }}"><i class="fas fa-eye"></i> All Attendence</i> </a></li>
                                    <li><a href="{{ route('monthly.attendence') }}"><i class="fas fa-eye"></i>Monthly Attendence Report</i> </a></li>
                                  
                                    
                                </ul>
                            </li>
                            {{-- Settings section --}}
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fas fa-cogs"></i><span> Settings </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('settings') }}"><i class="fas fa-cog"></i> Settings </a></li>
                                  
                                </ul>
                            </li>

                           
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
         

    </div>

  
    
    {{-- javascript --}}
        <script>
            var resizefunc = [];
        </script>
    

        <!-- jQuery  -->
        <script src="{{ asset('/admin/js/jquery.min.js') }}"></script>
        <script src="{{ asset('/admin/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/admin/js/waves.js') }}"></script>
        <script src="{{ asset('/admin/js/wow.min.js') }}"></script>
        <script src="{{ asset('/admin/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/admin/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('/admin/assets/chat/moment-2.2.1.js') }}"></script>
        <script src="{{ asset('/admin/assets/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('/admin/assets/jquery-detectmobile/detect.js') }}"></script>
        <script src="{{ asset('/admin/assets/fastclick/fastclick.js') }}"></script>
        <script src="{{ asset('/admin/assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('/admin/assets/jquery-blockui/jquery.blockUI.js') }}"></script>

        <!-- sweet alerts -->
        <script src="{{ asset('/admin/assets/sweet-alert/sweet-alert.min.js') }}"></script>
        <script src="{{ asset('/admin/assets/sweet-alert/sweet-alert.init.js') }}"></script>

        <!-- flot Chart -->
        {{-- <script src="{{ asset('/admin/assets/flot-chart/jquery.flot.js') }}"></script>
        <script src="{{ asset('/admin/assets/flot-chart/jquery.flot.time.js') }}"></script>
        <script src="{{ asset('/admin/assets/flot-chart/jquery.flot.tooltip.min.js') }}"></script>
        <script src="{{ asset('/admin/assets/flot-chart/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('/admin/assets/flot-chart/jquery.flot.public/admin/pie.js') }}"></script>
        <script src="{{ asset('/admin/assets/flot-chart/jquery.flot.selection.js') }}"></script>
        <script src="{{ asset('/admin/assets/flot-chart/jquery.flot.stack.js') }}"></script>
        <script src="{{ asset('/admin/assets/flot-chart/jquery.flot.crosshair.js') }}"></script> --}}

        <!-- Counter-up -->
        <script src="{{ asset('/admin/assets/counterup/waypoints.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/admin/assets/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
        
        <!-- datatable JS -->
        {{-- <script src="js/jquery.app.js"></script> --}}

        <script src="{{ asset('admin/assets/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admin/assets/datatables/dataTables.bootstrap.js') }}"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>
        <!-- CUSTOM JS -->
        <script src="{{ asset('/admin/js/jquery.app.js') }}"></script>

        <!-- Dashboard -->
        <script src="{{ asset('/admin/js/jquery.dashboard.js') }}"></script>

        <!-- Chat -->
        <script src="{{ asset('/admin/js/jquery.chat.js') }}"></script>

        <!-- Todo -->
        <script src="{{ asset('/admin/js/jquery.todo.js') }}"></script>

        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });public/admin/
        </script>
</body>
</html>
