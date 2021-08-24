{{--<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>--}}
<script src="{{ asset('admin/plugins/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{ asset('admin/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(Session::has('status'))
    <script type="text/javascript">
        Swal.fire({title: '{{ session('status') }}', confirmButtonText: 'تایید', icon: 'success'})
    </script>
@endif
<script src="{{ asset('admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('admin/plugins/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('admin/js/adminlte.min.js') }}"></script>
<script src="{{ asset('admin/js/demo.js') }}"></script>
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
