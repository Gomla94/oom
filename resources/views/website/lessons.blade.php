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
							@foreach($items as $item)
						
							<div class="col-xl-2 col-md-6 col-6">
								<a href="{{ url($item->month_id.'/lessons/'.$item->id.'/'.$item->videos->first()->id) }}">
									<div class="info-box">
										<span class=" push-bottom"></span>
										<img src="{{ Helper::storage_image($item->image) }}" width="100%">
										<h4 class="lesson-title">{{ $item->title }}</h4>
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
