<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OOMZaker | Dashboard</title>
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
    <!-- Bootstrap -->
    <link href="{{ $admin_temp }}vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ $admin_temp }}vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ $admin_temp }}vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ $admin_temp }}vendors/animate.css/animate.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">

    @toastr_css

    <!-- Custom Theme Style -->
    <link href="{{ $admin_temp }}css/custom.min.css" rel="stylesheet">
  </head>
  <style>
      html, body {
  width: 100%;
  height:100%;
}

body {
    background: linear-gradient(-90deg, #20406f, #ff7f00, #20406f, #ff7f00);
    background-size: 400% 400%;
    animation: gradient 15s ease infinite;
}

@keyframes gradient {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}
.myforma{
    position: absolute;
    right: 0;
    left: 0;
    top: 20%;
}
.hed{
    font-family: 'Tajawal', sans-serif !important;
    color:#fff;
    font-size:36px !important;
    text-shadow:none;
}
.logoForm{
    margin: 0 auto;
    display: block;
}
  </style>

  <body class="">

    <div class="myforma">

      <div class="login_wrapper">
        @include('admin.layouts.partials.alerts')
        <div class="animate form login_form">
            <img class="logoForm" src="{{ $admin_temp }}/images/logo.png" style="width:140px !important">
          <section class="login_content">
            {!! Form::open(
            [
                'route' => 'admin.auth.login',
                'post'  => 'POST'
            ]) !!}
              <h1 class="hed">تسجيل الدخول</h1>
              <div>
                {!! Form::email('email', null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'E-mail ..']) !!}
              </div>
              <div>
                  {!! Form::password('password', ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Password ..']) !!}
              </div>
              <div>
                <button class="btn btn-primary btn-block submit" type="submit">Login</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <br />

                <div>
                  <h1 style="text-shadow: none;color:#fff">OOMZaker Application</h1>
                  <p style="text-shadow: none;color:#fff">©{{ date("Y") }} All Rights Reserved To Noor App Designed & Developed by <a href="https://www.websolla.com" style="color:#ea3c1a;font-weight:bolder">Websolla.</a></p>
                </div>
              </div>
            {!! Form::close() !!}
          </section>
        </div>
      </div>
    </div>

    @jquery

    @toastr_js

    @toastr_render

  </body>
</html>
