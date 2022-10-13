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
                        <form method="post" action="{{ url('admin/specialists/'.$specialist->id.'/meals'.'/'.$items->id) }}"  enctype="multipart/form-data" class="card-box">
                            <input name="_method" type="hidden" value="PUT">
                            @csrf
								<div class="card-head">
									<header>Edit {!! Helper::tr($itemname) !!}  </header>
								</div>
								<div class="card-body row">
									<div class="col-lg-12 p-t-20">
										<a href="#" onclick="document.getElementById('myFileInput').click()">
											<img style="width:120px;margin: 0 auto; display:block" src="{{ Helper::getImg($items->img) }}">
										</a>
									</div>
									<input type="hidden" value="{{ $specialist->id }}" name="specialist_id">
									<input type="file" id="myFileInput" name="img">
									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input type="text" name="recipe_en" class="mdl-textfield__input" value="{{ $items->recipe_en }}" >
											<label class="mdl-textfield__label">Recipe In English</label>
										</div>
                                    </div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input type="text" name="recipe_ar" class="mdl-textfield__input" value="{{ $items->recipe_ar }}">
											<label class="mdl-textfield__label">Recipe In Arabic</label>
										</div>
                                    </div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<textarea name="way_to_coock_en" class="mdl-textfield__input" >{{ $items->way_to_coock_en }}</textarea>
											<label class="mdl-textfield__label">Way To Coock English</label>
										</div>
                                    </div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<textarea name="way_to_coock_ar" class="mdl-textfield__input" >{{ $items->way_to_coock_ar }}</textarea>
											<label class="mdl-textfield__label">Way To Coock Arabic</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
											<label style="color:red"> This Meal For ( Breakfast - lunch - dinner )</label>
											<select name="type" class="mdl-textfield__input">
												<option value="1">Breakfast</option>
												<option value="2">lunch</option>
												<option value="3">dinner</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
											<label style="color:red"> Program</label>
											<select name="specialist_program" class="mdl-textfield__input">
												@foreach($programs as $program)
													<option value="{{$program->id}}">{{  $program->title_en  }}</option>
												@endforeach
											</select>
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
