<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('plugins/images/favicon.png')}}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{asset('plugins/bower_components/morrisjs/morris.css')}}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('css/custom.css')}}" id="theme" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{asset('css/colors/blue-dark.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="http://localhost:3000/socket.io/socket.io.js"></script>
    <script src="{{asset('plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
</head>
<body class="fix-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
    </div>
    <div id="wrapper">
        @include('layouts.partials.header')
        @include('layouts.partials.navigation')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">{{$module_name}} <small>{{ isset($title)?$title:'' }}</small></h4> 
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <?php $segments = Request::segments();?>
                        @if(!empty($segments))
                            <ol class="breadcrumb">
                                <li {{ (( Request::segment(1)=='home') ? 'class=active' : '') }}><a href="{{url('home')}}">Dashboard</a></li>
                                @if(isset($module_name))
                                    <li class="active"><a href="{{url(Request::segment(1))}}">{{ $module_name }}</a></li>
                                @endif
                                @if(isset($title))
                                    <li class="active">{{ ucfirst($title) }}</li>
                                @endif
                            </ol>
                        @endif
                    </div>
                </div>
                @include('layouts.partials.notifications')
                @yield('content')
                <footer class="footer text-center"> {{date('Y')}} &copy; Copy right by {{ config('setup.project_full_name', 'Laravel') }} </footer>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
    <!--slimscroll JavaScript -->
    <script src="{{asset('js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('js/waves.js')}}"></script>
    <!--Counter js -->
    <script src="{{asset('plugins/bower_components/waypoints/lib/jquery.waypoints.js')}}"></script>
    <script src="{{asset('plugins/bower_components/counterup/jquery.counterup.min.js')}}"></script>
    <!--Morris JavaScript -->
    <script src="{{asset('plugins/bower_components/raphael/raphael-min.js')}}"></script>
    <script src="{{asset('plugins/bower_components/morrisjs/morris.js')}}"></script>
    <!-- chartist chart -->
    <script src="{{asset('plugins/bower_components/chartist-js/dist/chartist.min.js')}}"></script>
    <script src="{{asset('plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <!-- Calendar JavaScript -->
    <script src="{{asset('plugins/bower_components/moment/moment.js')}}"></script>
    <script src="{{asset('plugins/bower_components/calendar/dist/fullcalendar.min.js')}}"></script>
    <script src="{{asset('plugins/bower_components/calendar/dist/cal-init.js')}}"></script>
    <script src="{{ asset('js/bootbox.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')}}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('js/mask.js')}}"></script>
    <!-- Custom tab JavaScript -->
    <script src="{{asset('js/cbpFWTabs.js')}}"></script>
    <script type="text/javascript">
    $('.mydatepicker').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-d'
    });
    $('select').select2();
    (function() {
        [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
            new CBPFWTabs(el);
        });
    })();
    </script>
    <script src="{{asset('plugins/bower_components/toast-master/js/jquery.toast.js')}}"></script>
    <!--Style Switcher -->
    <script src="{{asset('plugins/bower_components/styleswitcher/jQuery.style.switcher.js')}}"></script>
</body>

</html>