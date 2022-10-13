@extends('website.layouts.layouts')
@section('content')

		
			<!-- start page content -->
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
					
			
					<div class="row">
						<div class="col-sm-12">
							<ul class="list-unstyled">
								<li class="theme-option">
									<div class="theme-color logo-theme" style="text-align: center">
										<a href="{{ url($month_id.'/lessons/'.$lesson_id) }}" data-theme="logo-white ">ملفات الفيديو</a>
										<a href="{{ url($month_id.'/lessons_pdf/'.$lesson_id) }}" data-theme="logo-dark">شرح PDF</a>
										<a href="#!" data-theme="logo-blue"  class="title-active">الإختبارات</a>
										@if($exam_check->exam_link != null)
										<a style="background:#F5B120;color:#fff" href="{{ $exam_check->exam_link }}" data-theme="logo-red">أختبار خارجي</a>
										@endif

										
										
									</div>
								</li>
							</ul>
						</div>
						
						<div class="col-sm-12">
							<div class="card card-box">
								
								<ul class="nav nav-tabs" id="myTab" role="tablist" style="display: block">
								    @if($questions->count() != 0)
									@foreach($questions as $quest)
								
									<li class="nav-item" style="display: none">
									  <a class="nav-link kind" id="{{$quest->title}}-tab" data-toggle="tab" href="#osama{{$quest->id}}" role="tab" aria-controls="{{ $quest->title }}" >{{ $quest->id }}</a>
									</li>
									@endforeach
									@else
									<div class="col-md-12">
									    	<h3 style="text-align:center">لا يوجد أي أختبارات لهذا الدرس</h3>
									</div>
								
									@endif
								  </ul>
								  <form method="post" action="{{ url($month_id.'/lessons/'.$lesson_id.'/do_test') }}">
									@csrf
									<div class="tab-content" id="myTabContent">
										<input type="hidden" value="{{ $questions->count() }}" name="number_quest">
										@foreach($questions as $quest)
										
										{{-- <input type="text" value="{{ $quest->id }}" name="questions[]"> --}}
									
								
									<div style="text-align: center" class="tab-pane fade kinds" id="osama{{$quest->id}}" role="tabpanel" aria-labelledby="{{ $quest->title }}-tab">
										<h3>{{ $quest->title }}</h3>
										<img width="250" src="{{ Helper::storage_image($quest->image) }}" class="image-responsive">
									  <p>
										{!! $quest->description !!}
									  </p>
									 
									  <h4>@if($quest->type == 1)  صح أم خطأ؟ @else اختر الإجابة الصحيحة@endif</h4>
									  @if($quest->type == 1)
										@foreach($quest->answers as $answer)
											<label>@if($answer->title == 'true') صح @else غلط @endif</label>
											<input type="checkbox" class="radio" data-id="{{ $quest->id }}" value="{{ $answer->id }}"  name="questions[{{ $quest->id }}]">
											
										@endforeach
									  @else
									  <div class="col-md-4 col-md-offset-4" style="margin:0 auto;padding-bottom: 80px;">
									   @foreach($quest->answers as $answer)
									    <input type="checkbox" id="box{{$answer->id}}" data-id="{{ $quest->id }}" name="questions[{{ $quest->id }}]">
                                        <label class="toggle-control" for="box{{$answer->id}}">{!! $answer->title !!}  </label>
                                       @endforeach
                                       </div>


									 {{-- <ul class="donate-now">
									  @foreach($quest->answers as $answer)
										<li>
											<input type="checkbox" class="radio" data-id="{{ $quest->id }}" id="a25-{{ $answer->id }}" value="{{ $answer->id }}" name="questions[{{ $quest->id }}]" />
											<label for="a25">{!! $answer->title !!}   </label>
										  </li>
										  @endforeach
										</ul>--}}
									  @endif
									  <div class="input-group mb-3 group-end">
										<a class="btn btn-danger btnPrevious" style="position: absolute;right: 6px;bottom: 20px;border-radius: 25px">السؤال السابق</a>
										<a style="position: absolute;left: 6px;bottom: 20px;border-radius: 25px;" class="btn btn-success btnNext">السؤال التالي</a>
										<input type="submit"  style="position: absolute;left: 6px;bottom: 20px;border-radius: 25px;display:none" class="btn btn-success done" value="اتمام الاختبار">
									  </div>
									  <!--/. form element wrap -->
								  
									</div>
									@endforeach
								</form>
							
								  </div>
								  
								
								
								</div>
							
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->
			
		</div>
		@push('scripts')
		
		   <script type="text/javascript">
		
         /* -------------------------------------------------------------
               bootstrapTabControl
           ------------------------------------------------------------- */
		   $(document).ready(function() {
			$('.btnPrevious').first().css('display', 'none');
			$('.btnNext').last().css('display', 'none');
			$('.done').last().css('display', 'block');
		
  $('.btnNext').click(function() {
	
    $('.nav-tabs .active').parent().next('li').find('a').trigger('click');
  });

  $('.btnPrevious').click(function() {
    $('.nav-tabs .active').parent().prev('li').find('a').trigger('click');
  });


  $("input:checkbox").on('click', function() {

  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
 
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[data-id='" + $box.attr("data-id") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});
});



      </script>
		@endpush
		
	@endsection
