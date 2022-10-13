<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3" for="name">{{ Helper::admin_trans('name') }}</label>
    <div class="col-md-9 col-sm-9">
        {!! Form::text('name', null, ['class' => 'form-control osos', 'id' => 'name',  'placeholder' => Helper::admin_trans('name'), 'autofocus']) !!}
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