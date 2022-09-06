@extends('pegawai.layout')
@section('content')
    <!-- /.content-header -->
    @if (session()->has('loginSukses'))
        <script>
            alert('Selamat Datang <?= $nama = session()->get('nama') ?> ');
        </script>
    @endif
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid text-center">
            <div class="row" style="padding-top: 60px">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalJumlah }}</h3>

                            <p>Total Obat Terjual</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $totalPasien }}</h3>

                            <p>Total Pasien Terdaftar</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ 'Rp. ' . number_format($totalBayar, 0, '.', '.') }}</h3>

                            <p>Jumlah Pemasukan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <div id="chartContainer"></div>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                //theme: "light2",
                title: {
                    text: "Jumlah Pasien Dari Bulan Januari - Desember 2022"
                },
                axisX: {
                    crosshair: {
                        enabled: true,
                        snapToDataPoint: true
                    }
                },
                axisY: {
                    title: "in Metric Tons",
                    includeZero: true,
                    crosshair: {
                        enabled: true,
                        snapToDataPoint: true
                    }
                },
                toolTip: {
                    enabled: false
                },
                data: [{
                    type: "area",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
@endsection
