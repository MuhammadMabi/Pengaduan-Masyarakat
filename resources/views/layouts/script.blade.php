<!--   Core JS Files   -->
    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap.min.js"></script>
    <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../../assets/js/plugins/chartjs.min.js"></script>
    {{-- <script>
        var ctx1 = document.getElementById("chart-line");

        // var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script> --}}
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
    @include('sweetalert::alert')
    {{-- <script>
        if ($('#table-data')) {
            $('#table-data').DataTable()
        }
    </script> --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btndelete').click(function(e) {
                e.preventDefault();

                var deleteid = $(this).closest("tr").find('.delete_id').val();
                console.log(deleteid);
                swal({
                        title: "Apakah Anda Yakin Ingin Menghapus Data Ini?",
                        // text: "Setelah dihapus, Anda tidak dapat memulihkan Tag ini lagi!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            var data = {
                                "_token": $('input[name=_token]').val(),
                                'id': deleteid,
                            };
                            $.ajax({
                                type: "DELETE",
                                url: 'pengaduan/destroy/' + deleteid,
                                data: data,
                                success: function(response) {
                                    swal(response.status, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }
                            });
                        }
                    });
            });

        });
    </script> --}}
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
    
                    // console.log(id_provinsi);
                    
                    $.ajax({
                        type : 'POST',
                        url : "{{ route('getkabupaten') }}",
                        data : {id_provinsi:id_provinsi},
                        cache : false,
    
                        success: function(message){
                            $('#kabupaten').html(message);
                            $('#kecamatan').html('');
                            $('#desa').html('');
                        },
                        error: function(data){
                            console.log('error:',data);
                        },
                    })
                })

                $('#kabupaten').on('change', function() {
                    let id_kabupaten = $('#kabupaten').val();
    
                    // console.log(id_provinsi);
                    
                    $.ajax({
                        type : 'POST',
                        url : "{{ route('getkecamatan') }}",
                        data : {id_kabupaten:id_kabupaten},
                        cache : false,
    
                        success: function(message){
                            $('#kecamatan').html(message);
                            // $('#kecamatan').html('');
                            $('#desa').html('');
                        },
                        error: function(data){
                            console.log('error:',data);
                        },
                    })
                })

                $('#kecamatan').on('change', function() {
                    let id_kecamatan = $('#kecamatan').val();
    
                    // console.log(id_provinsi);
                    
                    $.ajax({
                        type : 'POST',
                        url : "{{ route('getdesa') }}",
                        data : {id_kecamatan:id_kecamatan},
                        cache : false,
    
                        success: function(message){
                            $('#desa').html(message);
                            // $('#kecamatan').html('');
                            // $('#desa').html('');
                        },
                        error: function(data){
                            console.log('error:',data);
                        },
                    })
                })
            })
        });