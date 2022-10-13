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
                        <form method="post" action="{{ url('admin/specialists/'.$specialist->id.'/blogs'.'/'.$items->id) }}"  enctype="multipart/form-data" class="card-box">
                            <input name="_method" type="hidden" value="PUT">
                            @csrf
								<div class="card-head">
									<header>Edit {!! Helper::tr($itemname) !!}  </header>
								</div>
								<div class="card-body row">
									<div class="col-lg-12 p-t-20">
									<img style="width:120px;margin: 0 auto; display:block" src="{{ Helper::getImg($items->img) }}">
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input type="text" name="title_en" class="mdl-textfield__input" value="{{ $items->title_en }}" >
											<label class="mdl-textfield__label">Title English</label>
										</div>
                                    </div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input type="text" name="title_ar" class="mdl-textfield__input" value="{{ $items->title_ar }}">
											<label class="mdl-textfield__label">Title Arabic</label>
										</div>
                                    </div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<textarea name="text_en" class="mdl-textfield__input" >{{ $items->text_en }}</textarea>
											<label class="mdl-textfield__label">Text English</label>
										</div>
                                    </div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<textarea name="text_ar" class="mdl-textfield__input" >{{ $items->text_ar }}</textarea>
											<label class="mdl-textfield__label">Text Arabic</label>
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
