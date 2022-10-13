<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="name">{{ Helper::admin_trans('name') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name',  'placeholder' => Helper::admin_trans('name'), 'autofocus']) !!}
    </div>
</div>


<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="email">{{ Helper::admin_trans('email') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email',  'placeholder' => Helper::admin_trans('email')]) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="password">{{ Helper::admin_trans('password') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::password('password', ['class' => 'form-control', 'id' => 'password',  'placeholder' => Helper::admin_trans('password')]) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="roles">{{ Helper::admin_trans('roles') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::select('roles[]', $roles, null, ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'roles']) !!}
    </div>
</div>

<div class="ln_solid"></div>
<div class="form-group row">
    <div class="col-md-9 col-sm-9  offset-md-3">
        <a href="{{ route('admin.' . $route . '.index') }}" class="btn btn-danger">{{ Helper::admin_trans('cancel') }}</a>
        @if(! isset($item))
        <button class="btn btn-warning" type="reset">{{ Helper::admin_trans('reset') }}</button>
        @endif
        <button type="submit" class="btn btn-success">{{ Helper::admin_trans('save') }}</button>
        @if(! isset($item))
        <button type="submit" name="new" value="1" class="btn btn-success">{{ Helper::admin_trans('save_and_new') }}</button>
        @endif
    </div>
</div>


@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(function()
        {
            $('.select2').select2();
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