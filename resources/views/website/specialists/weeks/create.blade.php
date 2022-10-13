@extends('admin.layouts.layouts')
@section('content')
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Add {!! Helper::tr($itemname) !!}</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                href="{{ url('admin') }}">{!! Helper::tr('home') !!}</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active"> New {!! Helper::tr($itemname) !!}</li>
							</ol>
						</div>
                    </div>
                   @include('admin.error')
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>Add {!! Helper::tr($itemname) !!}</header>
								</div>
                            <form method="POST" action="{{ url('admin/specialists/'. $specialist->id .'/weeks') }}" class="card-body row"  enctype="multipart/form-data">
								@csrf
							<input type="hidden" value="{{ $specialist->id }}" name="specialist_id">
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<textarea name="recipe_en" class="mdl-textfield__input"></textarea>
											<label class="mdl-textfield__label">Recipe English</label>
										</div>
                                    </div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<textarea name="recipe_ar" class="mdl-textfield__input"></textarea>
											<label class="mdl-textfield__label">Recipe Arabic</label>
										</div>
                                    </div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<textarea name="way_to_coock_en" class="mdl-textfield__input"></textarea>
											<label class="mdl-textfield__label">Way To Cook English</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<textarea name="way_to_coock_ar" class="mdl-textfield__input"></textarea>
											<label class="mdl-textfield__label">Way To Cook Arabic</label>
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
                                            <input type="file" name="img" class="mdl-textfield__input" >
											<label> Image</label>
										</div>
									</div>
									<div class="col-lg-12 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
											<label style="color:red"> Program</label>
											<select name="specialist_program" class="mdl-textfield__input">
												{{-- @foreach($programs as $program)
													<option value="{{$program->id}}">{{  $program->title_en  }}</option>
												@endforeach --}}
											</select>
										</div>
									</div>
									<div class="col-lg-12 p-t-20 text-center">
										<button type="submit"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
										<button type="button"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->
		</div>
		<!-- end page container -->
@endsection
