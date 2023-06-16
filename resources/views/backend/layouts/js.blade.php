<script>
    (function ($) {
        'use strict';
        $(window).on('load', function () {
            $('#preloader').delay(200)
                           .fadeOut('slow', function () {
                               $(this).remove();
                           });
        });
    })(window.jQuery);
</script>
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('admin-assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('admin-assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('admin-assets/js/sb-admin-2.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/select2.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="{{ asset('admin-assets/js/toaster.js') }}"></script>
<script src="{{ asset('admin-assets/js/custom_script.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

<script src="{{ asset('admin-assets/js/vue.min.js') }}"></script>
<script src="https://unpkg.com/vuex"></script>
<script src="{{ asset('admin-assets/js/axios.min.js') }}"></script>
<script src="{{ asset('js/vuex-master.js') }}"></script>

<script>
    const pdf_header = '';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var data_table = $('#dataTable, #custom_table').DataTable({
        responsive: true,
        oLanguage: {
            sLengthMenu: "Show _MENU_",
        },
    });
</script>

@yield('scripts')

</body>

</html>
