        <!-- jQuery -->
        <script src="{{ $admin_temp }}vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="{{ $admin_temp }}vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- FastClick -->
        <script src="{{ $admin_temp }}vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="{{ $admin_temp }}vendors/nprogress/nprogress.js"></script>
        <!-- Chart.js -->
        <script src="{{ $admin_temp }}vendors/Chart.js/dist/Chart.min.js"></script>
        <!-- gauge.js -->
        <script src="{{ $admin_temp }}vendors/gauge.js/dist/gauge.min.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="{{ $admin_temp }}vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="{{ $admin_temp }}vendors/iCheck/icheck.min.js"></script>
        <!-- Skycons -->
        <script src="{{ $admin_temp }}vendors/skycons/skycons.js"></script>
        <!-- Flot -->
        <script src="{{ $admin_temp }}vendors/Flot/jquery.flot.js"></script>
        <script src="{{ $admin_temp }}vendors/Flot/jquery.flot.pie.js"></script>
        <script src="{{ $admin_temp }}vendors/Flot/jquery.flot.time.js"></script>
        <script src="{{ $admin_temp }}vendors/Flot/jquery.flot.stack.js"></script>
        <script src="{{ $admin_temp }}vendors/Flot/jquery.flot.resize.js"></script>
        <!-- Flot plugins -->
        <script src="{{ $admin_temp }}vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
        <script src="{{ $admin_temp }}vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
        <script src="{{ $admin_temp }}vendors/flot.curvedlines/curvedLines.js"></script>
        <!-- DateJS -->
        <script src="{{ $admin_temp }}vendors/DateJS/build/date.js"></script>
        <!-- JQVMap -->
        <script src="{{ $admin_temp }}vendors/jqvmap/dist/jquery.vmap.js"></script>
        <script src="{{ $admin_temp }}vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="{{ $admin_temp }}vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="{{ $admin_temp }}vendors/moment/min/moment.min.js"></script>
        <script src="{{ $admin_temp }}vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

        @stack('scripts')

        <!-- Custom Theme Scripts -->
        <script src="{{ $admin_temp }}js/custom.min.js"></script>

        <script type="text/javascript">
            $.ajaxSetup(
            {
                headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(function ()
            {
                'use strict';

                $(document).on('click', '#notifications-btn', function ()
                {
                    $.post("{{ route('admin.read_notifications') }}", function (response)
                    {
                        $('.notifications-badge').remove();
                    });
                });
            });
        </script>

        @toastr_js

        @toastr_render

    </body>
</html>
