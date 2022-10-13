
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta name="description" content="Responsive Web Oomzaker" />
        <meta name="author" content="websolla.com" />
        <title>OOm Zaker</title>
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
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap');
      html,
        body * {
            box-sizing: border-box;
            font-family: 'Tajawal', sans-serif;
        }
        .whatsapp {
            color: #fff;
            font-size: 35px;
            width: 55px;
            padding: 7px;
            text-align: center;
            border-radius: 39px;
            position: fixed;
            bottom: 10px;
            margin-left: 19px;
            z-index: 15;
        }
        .face {
            color: #fff;
            font-size: 35px;
            width: 55px;
            padding: 7px;
            text-align: center;
            border-radius: 39px;
            position: fixed;
            bottom: 80px;
            margin-left: 19px;
            z-index: 15;
        }

        body {
            background: url('{{ asset("asset/website/assets/img/pattern.png") }}') no-repeat center center fixed;
            background-size: cover
        }

        .container {
            width: 100%;
            padding-top: 60px;
            padding-bottom: 100px
        }
        .links{
            padding: 0px
        }

        .frame {
            height: 635px;
            width: 100%;
            background: url('{{ asset("asset/website/assets/img/pattern.png") }}') no-repeat center center;
            background-size: cover;
            
            margin-right: auto; 
            border-top: solid 1px rgba(255, 255, 255, .5);
            border-radius: 5px;
            box-shadow: 0px 2px 7px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transition: all .5s ease
        }

        .frame-long {
            height: 615px
        }

        .frame-short {
            height: 400px;
            margin-top: 50px;
            box-shadow: 0px 2px 7px rgba(0, 0, 0, 0.1)
        }

        .nav {
            width: 100%;
            height: 100px;
            padding-top: 40px;
            opacity: 1;
            transition: all .5s ease
            align-items: center;
            justify-content: center;
        }

        .nav-up {
            transform: translateY(-100px);
            opacity: 0
        }

        li {
            padding-left: 10px;
            font-size: 18px;
            display: inline;
            text-align: left;
            text-transform: uppercase;
            padding-right: 10px;
            color: #ffffff
        }

        .signin-active a {
            padding-bottom: 10px;
            color: #ffffff;
            text-decoration: none;
            border-bottom: solid 2px #1059FF;
            transition: all .25s ease;
            cursor: pointer
        }

        .signin-inactive a {
            padding-bottom: 0;
            color: #fff;
            text-decoration: none;
            border-bottom: none;
            cursor: pointer
        }

        .signup-active a {
            cursor: pointer;
            color: #ffffff;
            text-decoration: none;
            border-bottom: solid 1px #1059FF;
            padding-bottom: 10px
        }

        .signup-inactive a {
            cursor: pointer;
            color: #fff;
            text-decoration: none;
            transition: all .25s ease
        }

        .form-signin {
            width: 100%;
            height: 375px;
            font-size: 16px;
            font-weight: 300;
            padding-left: 37px;
            padding-right: 37px;
            padding-top: 55px;
            transition: opacity .5s ease, transform .5s ease;
            direction: rtl;
            text-align: right;
        }

        .form-signin-left {
            transform: translateX(-400px);
            opacity: .0
        }

        .form-signup {
            width: 100%;
            height: 375px;
            font-size: 12px;
            font-weight: 300;
            padding-left: 37px;
            padding-right: 37px;
            padding-top: 55px;
            position: relative;
            top: -375px;
            left: 400px;
            opacity: 0;
            transition: all .5s ease;
            direction: rtl;
            text-align: right;
        }

        .form-signup-left {
            transform: translateX(-399px);
            opacity: 1
        }

        .form-signup-down {
            top: 0px;
            opacity: 0
        }

        .success {
            width: 80%;
            height: 150px;
            text-align: center;
            position: relative;
            top: -890px;
            left: 450px;
            opacity: .0;
            transition: all .8s .4s ease
        }

        .success-left {
            transform: translateX(-406px);
            opacity: 1
        }

        .successtext {
            color: #ffffff;
            font-size: 16px;
            font-weight: 300;
            margin-top: -35px;
            padding-left: 37px;
            padding-right: 37px
        }

        #check path {
            stroke: #ffffff;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke-width: .85px;
            stroke-dasharray: 60px 300px;
            stroke-dashoffset: -166px;
            fill: rgba(255, 255, 255, .0);
            transition: stroke-dashoffset 2s ease .5s, fill 1.5s ease 1.0s
        }

        #check.checked path {
            stroke-dashoffset: 33px;
            fill: rgba(255, 255, 255, .03)
        }

        .form-signin input,
        .form-signup input {
           
            font-size: 13px
        }

        .form-styling {
            width: 100%;
            color:#ff7e00;
            height: 35px;
            padding-left: 15px;
            border: none;
            border-radius: 20px;
            margin-bottom: 20px;
            background: rgba(255, 255, 255, .2)
        }

        label {
            font-weight: 400;
            text-transform: uppercase;
            font-size: 13px;
            padding-left: 15px;
            padding-bottom: 10px;
            color: #fff;
            display: block
        }

        :focus {
            outline: none
        }

        .form-signin input:focus,
        textarea:focus,
        .form-signup input:focus,
        textarea:focus {
            background: #fff;
            border: none;
            padding-right: 40px;
            transition: background .5s ease
        }

        [type="checkbox"]:not(:checked),
        [type="checkbox"]:checked {
            position: absolute;
            display: none
        }

        [type="checkbox"]:not(:checked)+label,
        [type="checkbox"]:checked+label {
            position: relative;
            padding-left: 85px;
            padding-top: 2px;
            cursor: pointer;
            margin-top: 8px
        }

        [type="checkbox"]:not(:checked)+label:before,
        [type="checkbox"]:checked+label:before,
        [type="checkbox"]:not(:checked)+label:after,
        [type="checkbox"]:checked+label:after {
            content: '';
            position: absolute
        }

        [type="checkbox"]:not(:checked)+label:before,
        [type="checkbox"]:checked+label:before {
            width: 65px;
            height: 30px;
            background: rgba(255, 255, 255, .2);
            border-radius: 15px;
            left: 0;
            top: -3px;
            transition: all .2s ease
        }

        [type="checkbox"]:not(:checked)+label:after,
        [type="checkbox"]:checked+label:after {
            width: 10px;
            height: 10px;
            background: rgba(255, 255, 255, .7);
            border-radius: 50%;
            top: 7px;
            left: 10px;
            transition: all .2s ease
        }

        [type="checkbox"]:checked+label:before {
            background: #0F4FE6
        }

        [type="checkbox"]:checked+label:after {
            background: #ffffff;
            top: 7px;
            left: 45px
        }

        [type="checkbox"]:checked+label .ui,
        [type="checkbox"]:not(:checked)+label .ui:before,
        [type="checkbox"]:checked+label .ui:after {
            position: absolute;
            left: 6px;
            width: 65px;
            border-radius: 15px;
            font-size: 14px;
            font-weight: bold;
            line-height: 22px;
            transition: all .2s ease
        }

        [type="checkbox"]:not(:checked)+label .ui:before {
            content: "no";
            left: 32px;
            color: rgba(255, 255, 255, .7)
        }

        [type="checkbox"]:checked+label .ui:after {
            content: "yes";
            color: #ffffff
        }

        [type="checkbox"]:focus+label:before {
            box-sizing: border-box;
            margin-top: -1px
        }

        .btn-signup {
            float: left;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 13px;
            text-align: center;
            color: #ffffff;
            padding-top: 8px;
            width: 100%;
            height: 35px;
            border: none;
            border-radius: 20px;
            margin-top: 23px;
            background-color: #1059FF
        }

        .btn-signin {
            float: left;
            padding-top: 8px;
            width: 100%;
            height: 35px;
            border: none;
            border-radius: 20px;
            margin-top: -8px
        }

        .btn-animate {
            float: left;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 13px;
            text-align: center;
            color: rgba(255, 255, 255, 1);
            padding-top: 8px;
            width: 100%;
            height: 35px;
            border: none;
            border-radius: 20px;
            margin-top: 23px;
            background-color: rgba(16, 89, 255, 1);
            left: 0px;
            top: 0px;
            transition: all .5s ease, top .5s ease .5s, height .5s ease .5s, background-color .5s ease .75s
        }

        .btn-animate-grow {
            width: 130%;
            height: 625px;
            position: relative;
            left: -55px;
            top: -420px;
            color: rgba(255, 255, 255, 0);
            background-color: rgba(255, 255, 255, 1)
        }

        a.btn-signup:hover,
        a.btn-signin:hover {
            cursor: pointer;
            background-color: #0F4FE6;
            transition: background-color .5s
        }

        .forgot {
            height: 100px;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            padding-top: 24px;
            margin-top: -535px;
            border-top: solid 1px #fff;
            transition: all 0.5s ease
        }

        .forgot-left {
            transform: translateX(-400px);
            opacity: 0
        }

        .forgot-fade {
            opacity: 0
        }

        .forgot a {
            color: #fff;
            font-weight: 400;
            font-size: 13px;
            text-decoration: none
        }

        .welcome {
            width: 100%;
            height: 50px;
            position: relative;
            color: rgba(35, 43, 85, 0.75);
            opacity: 0;
            transition: transform 1.5s ease .25s, opacity .1s ease 1s
        }

        .welcome-left {
            transform: translateY(-780px);
            opacity: 1
        }

        .cover-photo {
            height: 150px;
            position: relative;
            left: 0px;
            top: -900px;
            background: linear-gradient(rgba(35, 43, 85, 0.75), rgba(35, 43, 85, 0.95)), url(https://img.icons8.com/bubbles/100/000000/user.png);
            background-size: cover;
            opacity: 0;
            transition: all 1.5s ease 0.55s
        }

        .cover-photo-down {
            top: -575px;
            opacity: 1
        }

        .profile-photo {
            height: 125px;
            width: 125px;
            position: relative;
            border-radius: 70px;
            left: 155px;
            top: -1000px;
            background: url(https://img.icons8.com/bubbles/100/000000/user.png);
            background-size: 100% 135%;
            background-position: 100% 100%;
            opacity: 0;
            transition: top 1.5s ease 0.35s, opacity .75s ease .5s;
            border: solid 3px #ffffff
        }

        .profile-photo-down {
            top: -636px;
            opacity: 1
        }

        h1 {
            color: #ffffff;
            font-size: 35px;
            font-weight: 300;
            text-align: center
        }

        .btn-goback {
            position: relative;
            margin-right: auto;
            top: -400px;
            float: left;
            padding: 8px;
            width: 83%;
            margin-left: 37px;
            margin-right: 37px;
            height: 35px;
            border-radius: 20px;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 13px;
            text-align: center;
            color: #1059FF;
            margin-top: -8px;
            border: solid 1px #1059FF;
            opacity: 0;
            transition: top 1.5s ease 0.35s, opacity .75s ease .5s
        }

        .btn-goback-up {
            top: -1080px;
            opacity: 1
        }

        a.btn-goback:hover {
            cursor: pointer;
            background-color: #0F4FE6;
            transition: all .5s;
            color: #ffffff
        }

        #refresh {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #ffffff;
            width: 50px;
            height: 50px;
            border-radius: 25px;
            box-shadow: 0px 2px 7px rgba(0, 0, 0, 0.1);
            padding: 13px 0 0 13px
        }

        .refreshicon {
            fill: #d3d3d3;
            transform: rotate(0deg);
            transition: fill .25s ease, transform .25s ease
        }

        .refreshicon:hover {
            cursor: pointer;
            fill: #1059FF;
            transform: rotate(180deg)
        }
    </style>
<body>
  <div class="container">
    
   
    <div class="row">
        <div class="col-md-6">
            <img style="width: 100%;border-radius:10px" src="{{ asset('asset/website/assets/img/test.jpg') }}">
           </div>
           <div class="col-md-6">
            <div class="frame">
               
        
                <div class="nav">
                    <ul class="links">
                        <li class="signin-active"><a class="btn">تسجيل الدخول</a></li>
                        <li class="signup-inactive"><a class="btn">تسجيل جديد</a></li>
                    </ul>
                </div>
                <div ng-app ng-init="checked = false">
                    <form class="form-signin my-mac" action="{{ route('web/login') }}" method="post" name="form">
                        @csrf
                       <label for="fullname">البريد الإلكتروني</label>
                        <input class="form-styling" type="text" name="email" value="{{ old('email') }}" required   placeholder="" /> 
                     
                          <label for="password">كلمة المرور</label> 
                          <input class="form-styling" type="password" name="password" placeholder="" />
                         
                        <div class=""> <button type="submit" class="btn-signin">تسجيل دخول</button> </div>
                    </form>
                    <form class="form-signup my-mac" method="post" action="{{ route('web/registerr') }}"  name="form">
                      @csrf
                            
                              <div class="row">
                                <div class="col-md-6 col-6">
                                    <label for="fullname">الأسم</label>
                                    <input class="form-styling" type="text" value="{{ old('name') }}" name="name" required placeholder="" />
                                </div>
                                
                                <div class="col-md-6 col-6">
                                    <label for="email">البريد الإلكتروني</label> 
                                    <input class="form-styling" type="text" value="{{ old('email') }}" name="email" required placeholder="" /> 
                                </div>
                                <div class="col-md-6 col-6">
                                    <label for="dlno">رقم التليفون</label> 
                                    <input class="form-styling" type="text" value="{{ old('phone') }}" name="phone" required placeholder="" /> 
                                </div>
                                <div class="col-md-6 col-6">
                                    <label for="dlno"> العنوان</label> 
                                    <input class="form-styling" type="text" value="{{ old('address') }}" required name="address" placeholder="" /> 
                                </div>
                                <div class="col-md-6 col-6">
                                    <label for="dlno"> الصف</label> 
                                    <select class="form-styling thegrade" name="group_id">
                                        <option value="">أختر الصف</option>
                                        @foreach($grade as $gr)
                                        <option value="{{ $gr->id }}">{{ $gr->title }}</option>
                                        @endforeach
                                    
                                      </select>
                                </div>
                                <div class="col-md-6 col-6">
                                    <label for="dlno"> المجموعه</label> 
                                    <select class="form-styling groupp" name="group_id">
                                        <option selected disabled aria-readonly="" value="">املئ الصف اولاً</option>
                                      </select>
                                </div>
                                <div class="col-md-6 col-6">
                                    
                            <label for="password">كلمة المرور</label> 
                            <input class="form-styling" type="password" name="password" placeholder="" /> 
                                </div>
                                <div class="col-md-6 col-6">
                                    
                            <label for="password">تأكيد كلمة المرور</label> 
                            <input class="form-styling" type="password" name="password_confirmation" placeholder="" />
                                </div>
                                
                              </div>
                        <button class="btn-signup" type="submit"  >تسجيل</button>
                    </form>
                   
                </div>
                <div class="forgot"> <a href="#">هل فقدت كلمة السر</a> </div>
               
            </div> 
           </div>
    </div>
    <a id="refresh" value="Refresh" onClick="history.go()"> <svg class="refreshicon" version="1.1" id="Capa_1" x="0px" y="0px" width="25px" height="25px" viewBox="0 0 322.447 322.447" style="enable-background:new 0 0 322.447 322.447;" xml:space="preserve">
        <path d="M321.832,230.327c-2.133-6.565-9.184-10.154-15.75-8.025l-16.254,5.281C299.785,206.991,305,184.347,305,161.224 c0-84.089-68.41-152.5-152.5-152.5C68.411,8.724,0,77.135,0,161.224s68.411,152.5,152.5,152.5c6.903,0,12.5-5.597,12.5-12.5 c0-6.902-5.597-12.5-12.5-12.5c-70.304,0-127.5-57.195-127.5-127.5c0-70.304,57.196-127.5,127.5-127.5 c70.305,0,127.5,57.196,127.5,127.5c0,19.372-4.371,38.337-12.723,55.568l-5.553-17.096c-2.133-6.564-9.186-10.156-15.75-8.025 c-6.566,2.134-10.16,9.186-8.027,15.751l14.74,45.368c1.715,5.283,6.615,8.642,11.885,8.642c1.279,0,2.582-0.198,3.865-0.614 l45.369-14.738C320.371,243.946,323.965,236.895,321.832,230.327z" /> </svg> </a>
</div>

  <!-- Section: Design Block -->
  <div class="whatsapp"><a href="https://wa.me/+01094003093"><img alt="whats-app-web-solla" title="Send To Whatsapp" src="https://websolla.com/website/img/whatss.png" data-rjs="2" data-rjs-processed="true"></a></div>
  <div class="face"><a href="https://www.facebook.com/%D9%82%D9%88%D9%85-%D8%B0%D8%A7%D9%83%D8%B1-Oom-zaker-102930999119382/"><img style=" width: 52px;border-radius: 24px;" alt="whats-app-web-solla" title="Send To Whatsapp" src="{{asset('asset/website/assets/img/Facebook-icon-1.png')}}" data-rjs="2" data-rjs-processed="true"></a></div>


<div class="page-footer">
    <div class="page-footer-inner"> 2022 &copy;
        <a href="https://www.websolla.com" target="_top" class="makerCss">احدى تطبيقات نور بدعم من ويب سولا </a>
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

<script>

    $(function(){ 
      $('.thegrade').on('change', function() {
  var gradid = $(this).val();
  $('.groupp').html("<option selected disabled>أختر </option>");
      
                 
                
  
                      $.ajax({
                          url:'{{ route("mygroup") }}',
                          data:{'gradid':gradid},
                          dataType:'json',
                          type:'get',
                          success: function(json)
                      {
                        console.log(json);
                        $.each(json.data, function(key,val) {                  
                           $('.groupp').append("<option value="+ val['id']+">"+val['title']+"</option>");
                        });     
                     // alert(json.data['id']);
                  
                  
                      },error: function(data_error, exception)
                      {
                  
                        console.log(data_error);
                        
                      }
                    });
              });
                     
              }); 
  
  </script>
  	<script type="text/javascript">
	    document.addEventListener('contextmenu', event => event.preventDefault());
	</script>
<script>
  $(function() {
$(".btn").click(function() {
$(".form-signin").toggleClass("form-signin-left");
$(".form-signup").toggleClass("form-signup-left");
$(".frame").toggleClass("frame-long");
$(".signup-inactive").toggleClass("signup-active");
$(".signin-active").toggleClass("signin-inactive");
$(".forgot").toggleClass("forgot-left");
$(this).removeClass("idle").addClass("active");
});
});

$(function() {
$(".btn-signup").click(function() {
$(".nav").toggleClass("nav-up");

$(".success").toggleClass("success-left");

});
});

$(function() {
    $('.my-mac').append('<input type="hidden" name="mac_address" value="'+navigator.appVersion+'">');
$(".btn-signin").click(function() {
$(".btn-animate").toggleClass("btn-animate-grow");
/* $(".welcome").toggleClass("welcome-left");
$(".cover-photo").toggleClass("cover-photo-down"); */

/* $(".profile-photo").toggleClass("profile-photo-down"); */
$(".btn-goback").toggleClass("btn-goback-up");
$(".forgot").toggleClass("forgot-fade");
});
});
</script>

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
