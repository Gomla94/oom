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
								<a href="{{ url($item->id.'/lessons') }}">
									<div class="info-box">
										<span class=" push-bottom"></span>
										
										@if($item->subscriptions->count() != 0)
											@if($item->subscriptions->first()->payment_status != 1)
											<img class="lod" src="{{ asset('asset/website/assets/img/load.gif') }}" width="40">
											@endif
										@endif
										<span class="price">{{ $item->price }} ج</span>
										<img src="{{ Helper::storage_image($item->image) }}" width="100%">
										<h4>{{ $item->title }}</h4>
										<!-- /.info-box-content -->
									</div>
								</a>
								
								@if($item->subscriptions->count() < 1 )
								<button style="margin: 0 auto;display:block" type="button" class="btn btn-info" data-toggle="modal" data-target="#app{{ $item->id }}">
									إشترك
								  </button>
								@endif
								<!-- /.info-box -->
							</div>
							<!-- Button trigger modal -->

  
										<!-- Modal -->
										<div class="modal fade" id="app{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
												<h5 style="color:#000" class="modal-title" id="exampleModalLabel">{{ $item->title }}</h5>
												
												</div>
												<div class="modal-body">
												<form method="post" action="{{ url('subscribe') }}" enctype='multipart/form-data'>
													<input type="hidden" value="{{ $item->id }}" name="month_id">
													@csrf
													<div class="form-outline mb-4 col-md-12">
														<label  style="color:#000"  class="form-label" required  for="form3Example3">أختر طريقة الدفع</label>
														<select class="form-control vodafone" name="payment_method">
															<option value="1">عن طريق الدفع في السنتر</option>
															<option value="2">فودافون كاش</option>
														</select>
													</div>

													<!-- Password input -->
													<div class="form-outline mb-4 col-md-12 vodaf" style="display: none" >
														
														<label style="color:#000" class="form-label" for="form3Example4">إيصال الدفع</label>
													
														<input type="file" id="form3Example4" name="attachement_file" class="form-control" />
														<p style="color:#000;text-align:center">
															انت على وشك الأشتراك في {{ $item->title }}
															وقيمته {{ $item->price }} جنيه
															بأحتيارك طريقة الدفع عن طريق فودافون كاش و التحويل إلى رقم {{ Settings::find('phone') }}
															للتأكيد قم برفع الإيصال أولاً ثم قم بالضغط على تأكيد الأشتراك
														</p>
														
													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-primary">الأشتراك</button>
														</div>
												</form>
												</div>
												
											</div>
											</div>
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
		@push('scripts')
		<script>
			$('.vodafone').on('change', function() {
				if(this.value == 2){
					$('.vodaf').fadeIn();
				}else{
					$('.vodaf').fadeOut();
				}

			});
		</script>
		@endpush
	@endsection
