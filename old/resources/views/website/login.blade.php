
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta name="description" content="Responsive Admin Template" />
        <meta name="author" content="SmartUniversity" />
        <title>My Dashboard</title>
        <!-- icons -->
        <link href="{{ asset('asset/website/assets/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('asset/website/assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <!--bootstrap -->
        <link href="{{ asset('asset/website/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('asset/website/assets/plugins/summernote/summernote.css') }}" rel="stylesheet">
        <!-- morris chart -->
        <link href="{{ asset('asset/website/assets/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
        <!-- Material Design Lite CSS -->
        <link rel="stylesheet" href="{{ asset('asset/website/assets/plugins/material/material.min.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/website/assets/css/material_style.css') }}">
        <!-- animation -->
        <link href="{{ asset('asset/website/assets/css/pages/animate_page.css') }}" rel="stylesheet">
        <!-- Template Styles -->
        <link href="{{ asset('asset/website/assets/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('asset/website/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('asset/website/assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('asset/website/assets/css/theme-color.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('asset/website/assets/img/favicon.ico') }}" />
    </head>
<body>
<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">

    <style>
      .background-radial-gradient {
        background-color: hsl(218, 41%, 15%);
        background-image: radial-gradient(650px circle at 0% 0%,
            hsl(218, 41%, 35%) 15%,
            hsl(218, 41%, 30%) 35%,
            hsl(218, 41%, 20%) 75%,
            hsl(218, 41%, 19%) 80%,
            transparent 100%),
          radial-gradient(1250px circle at 100% 100%,
            hsl(218, 41%, 45%) 15%,
            hsl(218, 41%, 30%) 35%,
            hsl(218, 41%, 20%) 75%,
            hsl(218, 41%, 19%) 80%,
            transparent 100%);
      }
  
      #radius-shape-1 {
        height: 220px;
        width: 220px;
        top: -60px;
        left: -130px;
        background: radial-gradient(#44006b, #ad1fff);
        overflow: hidden;
      }
  
      #radius-shape-2 {
        border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
        bottom: -60px;
        right: -110px;
        width: 300px;
        height: 300px;
        background: radial-gradient(#44006b, #ad1fff);
        overflow: hidden;
      }
  
      .bg-glass {
        background-color: hsla(0, 0%, 100%, 0.9) !important;
        backdrop-filter: saturate(200%) blur(25px);
      }
    </style>
  
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
          <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
            تسجيل الدخول   <br />
            <span style="color: hsl(218, 81%, 75%)">قوم ذاكر</span>
          </h1>
         
        </div>
  
        <div class="col-lg-6 mb-7 mb-lg-0 position-relative">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
  
          <div class="card bg-glass">
            <div class="card-body px-4 py-5 px-md-5">
              <form method="post" action="{{ route('web/login') }}">
                @csrf
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row">

                <!-- Email input -->
                <div class="form-outline mb-4 col-md-12">
                  <label class="form-label"   for="form3Example3">البريد الإلكتروني</label>
                  <input type="email" id="form3Example3" name="email" value="{{ old('email') }}" required  class="form-control" />
                </div>
  
                <!-- Password input -->
                <div class="form-outline mb-4 col-md-12">
                  <label class="form-label" for="form3Example4">كلمة المرور</label>
                  <input type="password" id="form3Example4" name="password" class="form-control" />
                </div>
             
                
  
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">
                  تسجيل الدخول
                </button>
                
              </form>
          
            </div>
            <a class="btn btn-primary  mb-4" href="{{ route('website/reg') }}">تسجيل جديد</a>
          </div>
          <p class="mb-4">أحدى تطبيقات نور بدعم من <a href="https://www.websolla.com">شركة ويب سولا للبرمجيات</a> </p>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->


<div class="page-footer">
    <div class="page-footer-inner"> 2020 &copy;
        <a href="https://www.websolla.com" target="_top" class="makerCss">Websolla </a>
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- end footer -->
<!-- start js include path -->
<script src="{{ asset('asset/website/assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('asset/website/assets/plugins/popper/popper.min.js') }}"></script>
<script src="{{ asset('asset/website/assets/plugins/jquery-blockui/jquery.blockui.min.js') }}"></script>
<script src="{{ asset('asset/website/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- bootstrap -->
<script src="{{ asset('asset/website/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('asset/website/assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('asset/website/assets/js/pages/sparkline/sparkline-data.js') }}"></script>
<!-- Common js-->
<script src="{{ asset('asset/website/assets/js/app.js') }}"></script>
<script src="{{ asset('asset/website/assets/js/layout.js') }}"></script>
<script src="{{ asset('asset/website/assets/js/theme-color.js') }}"></script>
<!-- material -->
<script src="{{ asset('asset/website/assets/plugins/material/material.min.js') }}"></script>
<!-- animation -->
<script src="{{ asset('asset/website/assets/js/pages/ui/animations.js') }}"></script>
<!-- morris chart -->
<script src="{{ asset('asset/website/assets/plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('asset/website/assets/plugins/morris/raphael-min.js') }}"></script>
<script src="{{ asset('asset/website/assets/js/pages/chart/morris/morris_home_data.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
 					 @if ($errors->any())
						
								

								{{-- {{dd($errors->all())}} --}}
									@foreach ($errors->all() as $error)
									<script>
									toastr.warning('{{ $error }}')
									</script>
									
									@endforeach
					  
							
						 @endif
<!-- end js include path -->
</body>

</html>

</body>

</html>
