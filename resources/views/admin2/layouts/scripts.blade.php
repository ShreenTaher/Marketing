<!--begin::Web font -->
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script>
    WebFont.load({
    google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
    active: function() {
        sessionStorage.fonts = true;
    }
    });
</script>

<!--begin::Global Theme Bundle -->
<script src="{{ asset('admin2/js') }}/vendors.bundle.js" type="text/javascript"></script>
<script src="{{ asset('admin2/js') }}/scripts.bundle.js" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors -->
<script src="{{ asset('admin2/js') }}/datatables/datatables.bundle.js" type="text/javascript"></script>

<!--end::Page Vendors -->

<!--begin::Page Scripts -->
<script src="{{ asset('admin2/js') }}/datatables/buttons.js" type="text/javascript"></script>

<!--begin::Page Scripts -->
<script src="{{ asset('admin2/js') }}/datatables/advanced-search.js" type="text/javascript"></script>

<!--end::Page Scripts -->
<script src="{{ asset('admin2') }}/plugins/sweetalert/sweet-alert.min.js" type="text/javascript"></script>
<script src="{{ asset('admin2') }}/plugins/fileuploads/js/dropify.min.js" type="text/javascript"></script>
<script src="{{ asset('admin2') }}/plugins/parsleyjs/dist/parsley.min.js" type="text/javascript"></script>
<script src="{{ asset('admin2') }}/plugins/toastr/toastr.min.js" type="text/javascript"></script>


<script>

    @if(session()->has('success'))
        setTimeout(function () {
                showMessage('{{ session()->get('success') }}' , 'success');
            }, 3000);
        @endif

    @if(session()->has('error'))
        setTimeout(function () {
                showMessage('{{ session()->get('error') }}' , 'error');
            }, 3000);
    @endif

    function showMessage(message , type) {
            var shortCutFunction = type ;
            var msg = message;
            var title = '';
            toastr.options = {
                positionClass: 'toast-top-center',
                onclick: null,
                showMethod: 'slideDown',
                hideMethod: "slideUp",
            };
            var $toast = toastr[shortCutFunction](msg, title);
            $toastlast = $toast;
        }

    function redirectPage(route) {

        window.history.pushState("", "", route);
    }

    $('.dropify').dropify({
        messages: {
            'default': 'drag and drop the photo',
            'replace': 'replace photo',
            'remove': 'x',
            'error': 'try again'
        },
        error: {
            'fileSize': 'The file size is too big (1M max).'
        }
    });

    $(document).ready(function () {
        $('form').parsley();

        var table = $('#datatable-fixed-header').DataTable({
            fixedHeader: true,
            columnDefs: [{orderable: false, targets: [0]}],
            "language": {
                "lengthMenu": "عرض _MENU_ للصفحة",
                "info": "عرض صفحة _PAGE_ من _PAGES_",
                "infoEmpty": "لا توجد بيانات مسجلة متاحة ",
                "infoFiltered": "(تصفية من _MAX_ الاجمالى)",
                "paginate": {
                    "first": "الاول",
                    "last": "الاخير",
                    "next": "التالى",
                    "previous": "السابق"
                },
                "search": "البحث:",
                "zeroRecords": "لا توجد بيانات متاحة حالياً",

            },
            "order": [] ,
           // "aaSorting": []

        });
    });
</script>