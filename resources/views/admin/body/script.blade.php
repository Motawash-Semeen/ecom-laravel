<script src="https://kit.fontawesome.com/4a3cf85510.js" crossorigin="anonymous"></script>
<script src="{{ asset('backend') }}/js/vendors.min.js"></script>
<script src="{{ asset('') }}assets/icons/feather-icons/feather.min.js"></script>
<script src="{{ asset('') }}assets/vendor_components/easypiechart/dist/jquery.easypiechart.js"></script>
<script src="{{ asset('') }}assets/vendor_components/apexcharts-bundle/irregular-data-series.js"></script>
<script src="{{ asset('') }}assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>
<!-- Vendor JS -->
<script src="{{ asset('') }}assets/vendor_components/datatable/datatables.min.js"></script>
<script src="{{ asset('backend') }}/js/pages/data-table.js"></script>
<script src="{{ asset('') }}assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
<script src="{{ asset('') }}assets/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
<script src="{{ asset('') }}assets/vendor_components/select2/dist/js/select2.full.js"></script>
<script src="{{ asset('') }}assets/vendor_plugins/input-mask/jquery.inputmask.js"></script>
<script src="{{ asset('') }}assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="{{ asset('') }}assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="{{ asset('') }}assets/vendor_components/moment/min/moment.min.js"></script>
<script src="{{ asset('') }}assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="{{ asset('') }}assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('') }}assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="{{ asset('') }}assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="{{ asset('') }}assets/vendor_plugins/iCheck/icheck.min.js"></script>
<script src="{{ asset('backend') }}/js/pages/advanced-form-element.js"></script>

<!-- Sunny Admin App -->
<script src="{{ asset('backend') }}/js/template.js"></script>
<script src="{{ asset('backend') }}/js/pages/dashboard.js"></script>
<script src="{{ asset('') }}assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>
<script src="{{ asset('') }}assets/vendor_components/ckeditor/ckeditor.js"></script>
<script src="{{ asset('') }}assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>
<script src="{{ asset('backend') }}/js/pages/editor.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const showAlertButton = document.querySelector('.delete');

    // Add a click event listener to the button
    $('.delete').on('click', function(e) {
      e.preventDefault();
      var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
               window.location.href = link;
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        });
    });
</script>
<script>
    const showOtherAlertButton = document.querySelector('#confirms');

    // Add a click event listener to the button
    $('#confirms').on('click', function(e) {
      e.preventDefault();
      console.log('clicked')
      var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Change it!'
        }).then((result) => {
            if (result.isConfirmed) {
               window.location.href = link;
                Swal.fire(
                    'Updated!',
                    'Your file has been updated.',
                    'success'
                )
            }
        });
    });
</script>

<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
    @endif
</script>


