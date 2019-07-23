<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>Dashboard | @yield('title')</title>

    <!-- Tell the browser to be responsive to screen width -->

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->

{!! Html::style('admins/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}

<!-- Font Awesome -->

{!! Html::style('admins/bower_components/font-awesome/css/font-awesome.min.css') !!}

<!-- Ionicons -->

{!! Html::style('admins/bower_components/Ionicons/css/ionicons.min.css') !!}

<!-- Theme style -->

{!! Html::style('admins/dist/css/AdminLTE.min.css') !!}

<!-- AdminLTE Skins. Choose a skin from the css/skins

                 folder instead of downloading all of them to reduce the load. -->

{!! Html::style('admins/dist/css/skins/_all-skins.min.css') !!}

<!-- Morris chart -->

{!! Html::style('admins/bower_components/morris.js/morris.css') !!}

<!-- jvectormap -->

{!! Html::style('admins/bower_components/jvectormap/jquery-jvectormap.css') !!}

<!-- Date Picker -->

{!! Html::style('admins/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}

<!-- Daterange picker -->

{!! Html::style('admins/bower_components/bootstrap-daterangepicker/daterangepicker.css') !!}

<!-- bootstrap wysihtml5 - text editor -->

{!! Html::style('admins/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

    <!-- Google Font -->

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

@include('admin.layouts._header')

<!-- Left side column. contains the logo and sidebar -->

    @include('admin.layouts._sidebar')

    <div class="content-wrapper">

        @yield('content')

    </div>

    @include('admin.layouts._footer')

    <div class="control-sidebar-bg"></div>

</div>


<!-- jQuery 3 -->

{!! Html::script('admins/bower_components/jquery/dist/jquery.min.js') !!}

<script src=""></script>

<!-- jQuery UI 1.11.4 -->

{!! Html::script('admins/bower_components/jquery-ui/jquery-ui.min.js') !!}

<script src=""></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>

    $.widget.bridge('uibutton', $.ui.button);

</script>

<!-- Bootstrap 3.3.7 -->

{!! Html::script('admins/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}

<!-- Morris.js charts -->

{!! Html::script('admins/bower_components/raphael/raphael.min.js') !!}

{!! Html::script('admins/bower_components/morris.js/morris.min.js') !!}

<!-- Sparkline -->

{!! Html::script('admins/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') !!}

<!-- jvectormap -->

{!! Html::script('admins/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}

{!! Html::script('admins/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}

<!-- jQuery Knob Chart -->

{!! Html::script('admins/bower_components/jquery-knob/dist/jquery.knob.min.js') !!}

<!-- daterangepicker -->


{!! Html::script('admins/bower_components/moment/min/moment.min.js') !!}

{!! Html::script('admins/bower_components/bootstrap-daterangepicker/daterangepicker.js') !!}

<!-- datepicker -->

{!! Html::script('admins/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}

<!-- Bootstrap WYSIHTML5 -->

{!! Html::script('admins/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}

<!-- Slimscroll -->

{!! Html::script('admins/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}

<!-- FastClick -->

{!! Html::script('admins/bower_components/fastclick/lib/fastclick.js') !!}

<!-- AdminLTE App -->

{!! Html::script('admins/dist/js/adminlte.min.js') !!}

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

{!! Html::script('admins/dist/js/pages/dashboard.js') !!}

<!-- AdminLTE for demo purposes -->

{!! Html::script('admins/dist/js/demo.js') !!}

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>
@include('sweet::alert')
@yield('footer')

</body>

</html>

