@include('admin.layouts.partials.head')

@include('admin.layouts.partials.aside')
@include('admin.layouts.partials.topbar')
@include('admin.layouts.partials.logoutform')
@include('admin.layouts.partials.alerts')

    @section('content')
        @show

@stack('additional')

@include('admin.layouts.partials.footer')
@include('admin.layouts.partials.javascript')