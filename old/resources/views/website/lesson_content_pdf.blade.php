@extends('website.layouts.layouts')
@section('content')
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">{{ $itemsnames }}</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                href="{{ url('/') }}">{{ Helper::admin_trans('home') }}</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">{{ $itemsnames }}</li>
							</ol>
						</div>
					</div>
					<!-- start widget -->

					<div class="state-overview">
						<div class="row">
							<div class="col-sm-12">
								<ul class="list-unstyled">
									<li class="theme-option">
										<div class="theme-color logo-theme" style="text-align: center">
											<a href="{{ url($item->month_id.'/lessons/'.$item->id) }}" data-theme="logo-white">ملفات الفيديو</a>
											<a href="{{ url($item->month_id.'/lessons_pdf/'.$item->id) }}" class="title-active" data-theme="logo-dark">شرح PDF</a>
											<a href="#" data-theme="logo-blue">الإختبارات</a>
											
											
										</div>
									</li>
								</ul>
							</div>
							@foreach($items as $item)
							<div class="col-xl-2 col-md-6 col-6">

								<a download="" href="{{ Helper::storage_image($item->file_src) }}">
									<div class="info-box">
										<span class=" push-bottom"></span>
										<img src="{{asset('asset/website/assets/img/pdf.png') }}" width="100%">
										<h4>{{ $item->title }}</h4>
										<!-- /.info-box-content -->
									</div>
								</a>
								<!-- /.info-box -->
							</div>
							@endforeach
						</div>
					</div>
					<!-- end widget -->
					
				</div>
			</div>
			<!-- end page content -->
			
		</div>
		<!-- end page container -->
	@endsection
