@if ($errors->any())
    @foreach ($errors->all() as $error)
        @php
            json_decode($error, true);
            if(json_last_error() == JSON_ERROR_NONE)
                $error = json_decode($error, true)['message'];
            toastr()->error($error)
        @endphp
    @endforeach
@endif

@if (Session::has('success'))
    @php
        toastr()->success(Session::get('success'))
    @endphp
@endif
