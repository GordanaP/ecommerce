<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" ></script>


<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

<!-- Custom -->
<script src="{{ asset('js/custom.js') }}" ></script>
<script src="{{ asset('js/handle_checkboxes.js') }}" ></script>
<script src="{{ asset('js/delete_checked.js') }}" ></script>


<!-- Toaster -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if (Session::has('message'))

        var message = "{!! Session::get('message') !!}";
        var type = "{{ Session::get('type') }}";
        toastr.options = {
          "positionClass": "toast-bottom-right",
        }

        switch(type) {
            case('success'):
                toastr.success(message)
                break;
            case('info'):
                toastr.info(message)
                break;
            case('warning'):
                toastr.warning(message)
                break;
            case('error'):
                toastr.error(message)
                break;
        }

    @endif
</script>

@yield('scripts')