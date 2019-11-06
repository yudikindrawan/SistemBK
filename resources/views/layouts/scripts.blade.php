    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script src="{{ asset('dist/js/jquery.ui.touch-punch-improved.js') }}"></script>
    <script src="{{ asset('dist/js/jquery-ui.min.js') }}"></script>
    <!--Bootstrap tether Core JavaScript-->
    <script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!--slimscrollbar scrollbar JavaScript-->
    <script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects-->
    <script src="{{ asset('dist/js/waves.js')}}"></script>
    <!--Menu sidebar-->
    <script src="{{ asset('dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript-->
    <script src="{{ asset('dist/js/custom.min.js')}}"></script>
    <!--this page js-->
    <script src="{{ asset('assets/libs/moment/min/moment.min.js') }}"></script>
    <!--Datatables-->
    <script src="{{ asset('assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{ asset('assets/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/DataTables/datatables.min.js')}}"></script>
    <!-- Datepicker-->
    <script src="{{ asset ('assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- Select2-->
    <script src="{{ asset ('assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset ('assets/libs/select2/dist/js/select2.min.js') }}"></script>
    <!--daterangepicker-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <!--chartJS-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        @stack('scripts')