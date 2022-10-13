@extends('admin.layouts.layouts')
@section('content')
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Edit {!! Helper::tr($itemname) !!}</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                href="{{ url('admin') }}">{!! Helper::tr('home') !!}</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>

								<li class="active">Edit {!! Helper::tr($itemname) !!}</li>
							</ol>
						</div>
                    </div>
                    @include('admin.error')
					<div class="row">
						<div class="col-sm-12">
                        <form method="post" action="{{ url('admin/'.$itemsnames.'/'.$items->id) }}"  enctype="multipart/form-data" class="card-box">
                            <input name="_method" type="hidden" value="PUT">
                            @csrf
								<div class="card-head">
									<header>Edit {!! Helper::tr($itemname) !!}  </header>
									<button id="panel-button"
										class="mdl-button mdl-js-button mdl-button--icon pull-right"
										data-upgraded=",MaterialButton">
										<i class="material-icons">more_vert</i>
									</button>
								</div>
								<div class="card-body row">
									<div class="col-lg-12 p-t-20">
									<img style="width:120px;margin: 0 auto; display:block" src="{{ Helper::getImg($items->img) }}">
									
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Which Category</label>
											<select name="cat" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												@foreach($cat as $cats)
													<option @if($cats->id == $items->cat) selected @endif value="{{ $cats->id }}">{{ $cats->title_en }}</option>
												@endforeach
											</select>
										</div>
                                    </div>
									<div class="col-lg-6 p-t-20">
											<video width="220" height="140" controls tyle="width:120px;margin: 0 auto; display:block" >
												<source src="{{ Helper::getImg($items->link) }}" type="video/mp4">
												<source src="{{ Helper::getImg($items->link) }}" type="video/ogg">
										  	</video>
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input type="file" name="link" class="mdl-textfield__input"  >
											<label >Upload Video</label>
											
										</div>
                                    </div>

									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
											<input type="file"  name="img" class="mdl-textfield__input" >
											<input type="hidden" value="{{$items->img }}" name="img_value" class="mdl-textfield__input" >
											<label >Video Background Image</label>
										</div>
									</div>
									
									<div class="col-lg-12 p-t-20 text-center">
										<button type="submit"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
										<button type="button"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->
		
		</div>
		<!-- end page container -->
@endsection
