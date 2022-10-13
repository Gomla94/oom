@extends('admin.layouts.layouts')
@section('content')
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">{{ Helper::tr($itemname) }} Profile</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                href="{{ url('admin') }}">{{ Helper::tr('home') }}</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">{{ Helper::tr($itemname) }} Profile</li>
							</ol>
						</div>
                    </div>
                    @include('admin.error')
					<div class="row">
						<div class="col-md-12">
							<!-- BEGIN PROFILE SIDEBAR -->
							<div class="profile-sidebar">
								<div class="card card-topline-aqua">
									<div class="card-body no-padding height-9">
										<div class="row">
											<div class="profile-userpic">
                                                <a href="#" onclick="document.getElementById('myFileInput').click()">
                                                    <img src="{{ Helper::getImg( $items->img ) }}" class="img-responsive" alt="Profile-Picture">
                                                </a>

                                            </div>
										</div>
										<div class="profile-usertitle">
											<div class="profile-usertitle-name"> {{ $items->name }} </div>
											<div class="profile-usertitle-job"> {{ Helper::tr( $itemname ) }} </div>
										</div>
										<!-- END SIDEBAR USER TITLE -->
										<!-- SIDEBAR BUTTONS -->
										<div class="profile-userbuttons">
                                            <form method="post" action="{{ url('admin/'.$itemsnames.'/'.$items->id) }}">
                                                <input name="_method" type="hidden" value="DELETE">
                                                    @csrf
                                                <button value="DELETE" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-pink">
                                                    <i class="fa fa-trash-o "></i>
                                                </button>
                                            </form>
                                        </div>
										<!-- END SIDEBAR BUTTONS -->
									</div>
								</div>
								<div class="card">
									<div class="card-head card-topline-aqua">
                                        <header>Specialist Data</header>
                                    </div>
									<div class="row list-separated profile-stat">
										<div class="col-md-3 col-sm-3 col-6">
											<div class="uppercase profile-stat-title"> {{ $specialist_blog }} </div>
											<a href="{{ url('admin/'.$itemsnames.'/'.$items->id.'/blogs//') }}"> <button class="uppercase profile-stat-text bt btn-success" >Blogs  </button></a>

										</div>
										<div class="col-md-3 col-sm-3 col-6">
											<div class="uppercase profile-stat-title"> {{$specialist_program }} </div>
											<a href="{{ url('admin/'.$itemsnames.'/'.$items->id.'/program//') }}"><button class="uppercase profile-stat-text bt btn-success"> Food System </button></a>
										</div>
										<div class="col-md-3 col-sm-3 col-6">
											<div class="uppercase profile-stat-title"> {{ $specialist_meals }} </div>
										<a href="{{ url('admin/'.$itemsnames.'/'.$items->id.'/weeks//')  }}"><button class="uppercase profile-stat-text bt btn-success"> Meals </button>
										</div>
										<div class="col-md-3 col-sm-3 col-6">
											<div class="uppercase profile-stat-title"> {{ $specialist_reviews }} </div>
										<a href="{{ url('admin/'.$itemsnames.'/'.$items->id.'/weeks//')  }}"><button class="uppercase profile-stat-text bt btn-success"> Reviews </button>
										</div>
									</div>
								</div>


							</div>
							<!-- END BEGIN PROFILE SIDEBAR -->
							<!-- BEGIN PROFILE CONTENT -->
							<div class="profile-content">
								<div class="row">
									<div class="profile-tab-box">
										<div class="p-l-20">
											<ul class="nav ">
												<li class="nav-item tab-all p-l-20"><a class="nav-link active" href="#tab3"
														data-toggle="tab">Settings</a></li>
											</ul>
										</div>
									</div>
									<div class="white-box">
										<!-- Tab panes -->
										<div class="tab-content">

											<div class="tab-pane active" id="tab3">
												<div class="row">
													<div class="col-md-12 col-sm-12">
														<div class="card-head">
															<header>Edit</header>
														</div>
														<div class="card-body " id="bar-parent1">
															<form method="post" action="{{ url('admin/'.$itemsnames.'/'.$items->id) }}" enctype="multipart/form-data">
                                                                <input name="_method" type="hidden" value="PUT">
                                                                @csrf
																<div class="form-group">
																	<label for="simpleFormEmail"> Name</label>
																	<input type="name" name="name" value="{{$items->name}}" class="form-control"
																		id="simpleFormEmail"
																		placeholder="Enter user name">
                                                                </div>

                                                                <input type="file" id="myFileInput" name="img">
                                                                <input type="hidden"  value="{{ $items->img }}" name="img_value">
                                                                {{-- This Input Is Hidden To call Action of Change Profile Image --}}

                                                                <div class="form-group">
																	<label for="simpleFormEmail">Email</label>
																	<input type="email" name="email" value="{{$items->email}}" class="form-control"
																		id="simpleFormEmail"
																		placeholder="Email Address">
                                                                </div>
                                                                <div class="form-group">
																	<label for="simpleFormEmail">Mobile</label>
																	<input type="number" name="mobile" value="{{$items->mobile}}" class="form-control"
																		id="simpleFormEmail"
																		placeholder="Mobile Number">
																</div>
																<div class="form-group">
																	<label for="simpleFormPassword">
																		Password</label>
																	<input type="password" name="password" class="form-control"
																		id="simpleFormPassword"
																		placeholder="Password">
																</div>
																<div class="form-group">
																	<label for="simpleFormPassword"> Password Confirmation</label>
																	<input type="password" name="password_confirmation" class="form-control"
																		id="newpassword" placeholder="Password Confirmation">
																</div>
																<button type="submit"
																	class="btn btn-primary">Submit</button>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- END PROFILE CONTENT -->
						</div>
					</div>
				</div>
                <!-- end page content -->


			</div>
			<!-- end page container -->
			@endsection
