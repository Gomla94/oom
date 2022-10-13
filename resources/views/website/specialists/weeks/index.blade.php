@extends('admin.layouts.layouts')
@section('content')

			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
                            <div class="page-title">All {!! Helper::tr($itemsnames) !!}</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                href="{{ url('admin') }}">{!! Helper::tr('home') !!}</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">All {!! Helper::tr($itemsnames) !!}</li>
							</ol>
						</div>
                    </div>
                    @include('admin.error')
					<div class="row">
						<div class="col-md-12">
							<div class="card card-box">
								<div class="card-head">
									<header>All {!! Helper::tr($itemsnames) !!}</header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body ">
                                    <div class="col-md-12">
                                        <div class="row">
                                            @foreach($items as $item)

                                            <div class="col-md-4">
                                                <a href="{{ url('admin/specialists/'.$item->specialist_id.'/meals/'.$item->id.'/week')  }}">
                                                <div class="cards">

                                                    <h1>{{ $item->title_en }}</h1>
                                                    <form class="formdelete"  method="post" action="{{ url('admin/specialists/'.$specialist->id.'/weeks'.'/'.$item->id) }}">
                                                        <input name="_method" type="hidden" value="DELETE">
                                                            @csrf
                                                        <button style="border: none;background: transparent;color: #ce4747;" type="submit" ><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </div>
                                                </a>
                                            </div>
                                            @endforeach
                                            <div class="col-md-4" @if($items->count() >= 10) style="display:none" @endif>
                                                <form method="POST" action="{{ url('admin/specialists/'. $specialist->id .'/weeks') }}">
                                                    @csrf
                                                    <button type="submit" style="    width: 100%;
                                                    border: none;
                                                    background: transparent;
                                                    height: 130px;">

                                                <div class="cards">
                                                    <h1>Add New  +</h1>
                                                </div>
                                            </button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->
		</div>
		<!-- end page container -->
@endsection
