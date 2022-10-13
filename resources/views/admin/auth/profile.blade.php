@extends('admin.layouts.app')

@section('title', 'profile')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>{{ Helper::admin_trans('edit', ['el' => Helper::admin_trans('profile')]) }}</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="display: block;">
                        <br>

                        {!! Form::open(
                        [
                            'method'        => 'POST',
                            'route'         => 'admin.auth.profile'
                        ]) !!}

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3" for="name">{{ Helper::admin_trans('name') }}</label>
                                <div class="col-md-9 col-sm-9">
                                    {!! Form::text('name', Helper::admin_user()->name, ['class' => 'form-control osos', 'id' => 'name',  'placeholder' => Helper::admin_trans('name'), 'autofocus']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3" for="email">{{ Helper::admin_trans('email') }}</label>
                                <div class="col-md-9 col-sm-9">
                                    {!! Form::email('email', Helper::admin_user()->email, ['class' => 'form-control osos', 'id' => 'email',  'placeholder' => Helper::admin_trans('email'), 'autofocus']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3" for="password">{{ Helper::admin_trans('password') }}</label>
                                <div class="col-md-9 col-sm-9">
                                    {!! Form::password('password', ['class' => 'form-control osos', 'id' => 'password',  'placeholder' => Helper::admin_trans('password'), 'autofocus']) !!}
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            
                            <div class="form-group row">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    <a href="{{ route('admin.home.index') }}" class="btn btn-danger">{{ Helper::admin_trans('cancel') }}</a>
                                    <button type="submit" class="btn btn-success">{{ Helper::admin_trans('save') }}</button>
                                </div>
                            </div>
                            
                        {!! Form::close() !!}
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- /page content -->

@endsection


@push('scripts')
    <script type="text/javascript">
        $(function()
        {
            $(document).on('keydown', '#name', function(event)
            {
                var name = event.key,
                    regex = /^[A-Za-z_-]+$/;
                    console.log(regex.test(name));
                if(! regex.test(name))
                {
                    event.preventDefault();
                    return false;
                }
            });
        });
    </script>
@endpush