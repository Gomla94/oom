<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="apple-touch-icon" sizes="57x57" href="{{ $admin_temp }}/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ $admin_temp }}/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ $admin_temp }}/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ $admin_temp }}/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ $admin_temp }}/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ $admin_temp }}/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ $admin_temp }}/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ $admin_temp }}/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ $admin_temp }}/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ $admin_temp }}/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ $admin_temp }}/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ $admin_temp }}/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $admin_temp }}/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{ $admin_temp }}/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ $admin_temp }}/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title>{{ Helper::admin_title(View::getSection('title')) }}</title>
    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="{{ $admin_temp }}vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    @if (App::getLocale() == 'ar')
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
    @endif
    <!-- Font Awesome -->
    <link href="{{ $admin_temp }}vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ $admin_temp }}vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ $admin_temp }}vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Flag-icon -->
    <link href="{{ $general_temp }}vendors/flag-icon/css/flag-icon.min.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ $admin_temp }}vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ $admin_temp }}vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ $admin_temp }}vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">


    @stack('styles')

    @toastr_css

    <!-- Custom Theme Style -->
    <link href="{{ $admin_temp }}css/custom.css" rel="stylesheet">
    @if (App::getLocale() == 'ar')
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
    <link href="{{ $admin_temp }}css/rtl.css" rel="stylesheet">
    @endif
    <style>
            
        /* width */
::-webkit-scrollbar {
  width: 12px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #ff7f00; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #ff7f00; 
}
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
