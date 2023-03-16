<!--   Core JS Files   -->

<script src="../../assets/js/core/popper.min.js"></script>
<script src="../../assets/js/core/bootstrap.min.js"></script>
<script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="../../assets/js/plugins/chartjs.min.js"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="../../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
@include('sweetalert::alert')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function() {

            $('#provinsi').on('change', function() {
                let id_provinsi = $('#provinsi').val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkabupaten') }}",
                    data: {
                        id_provinsi: id_provinsi
                    },
                    cache: false,

                    success: function(message) {
                        $('#kabupaten').html(message);
                        $('#kecamatan').html('');
                        $('#desa').html('');
                    },
                    error: function(data) {
                        console.log('error:', data);
                    },
                })
            })

            $('#kabupaten').on('change', function() {
                let id_kabupaten = $('#kabupaten').val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkecamatan') }}",
                    data: {
                        id_kabupaten: id_kabupaten
                    },
                    cache: false,

                    success: function(message) {
                        $('#kecamatan').html(message);
                        $('#desa').html('');
                    },
                    error: function(data) {
                        console.log('error:', data);
                    },
                })
            })

            $('#kecamatan').on('change', function() {
                let id_kecamatan = $('#kecamatan').val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('getdesa') }}",
                    data: {
                        id_kecamatan: id_kecamatan
                    },
                    cache: false,

                    success: function(message) {
                        $('#desa').html(message);
                    },
                    error: function(data) {
                        console.log('error:', data);
                    },
                })
            })
        })
    });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@yield('script')
