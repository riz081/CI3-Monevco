<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3>Menu</h3>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card text-white bg-gradient-primary text-center">
                <div class="card-content d-flex">
                    <img src="<?php echo base_url('assets/images/kalender.png') ?>" alt="" width="180" class="float-left px-1">
                    <div class="card-body">
                        <h4 class="card-title text-white mt-3">Jadwal Terapi</h4>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <h1 class="text-white">
                                <?php echo $jadwal; ?>
                            </h1>
                        </div>
                        <a href="<?php echo base_url('pasien/jadwal_terapi') ?>" class="btn btn-primary mt-3">Tampilkan</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card text-white bg-gradient-success text-center">
                <div class="card-content d-flex">
                    <img src="<?php echo base_url('assets/images/laporan.png') ?>" alt="" width="180" class="float-left px-1">
                    <div class="card-body">
                        <h4 class="card-title text-white mt-3">Hasil Terapi</h4>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <h1 class="text-white">
                                <?php echo $hasil_terapi; ?>
                            </h1>
                        </div>
                        <a href="<?php echo base_url('pasien/hasil_terapi') ?>" class="btn btn-success mt-3">Tampilkan</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card text-white bg-gradient-info text-center">
                <div class="card-content d-flex">
                    <img src="<?php echo base_url('assets/images/riwayat.png') ?>" alt="" width="180" class="float-left px-1">
                    <div class="card-body">
                        <h4 class="card-title text-white mt-3">Riwayat Terapi</h4>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <h1 class="text-white">
                                <?php echo $riwayat_terapi; ?>
                            </h1>
                        </div>
                        <a href="<?php echo base_url('pasien/riwayat_terapi') ?>" class="btn btn-info mt-3">Tampilkan</a>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
<!-- /.container-fluid -->

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mt-5">
        <h3>Analisa Grafis</h3>
    </div>

    <div class="row mt-2">
        <div class="col-6">
            <canvas id="lineChart"></canvas>
        </div>

        <div class="col-6">
            <canvas id="lineChart2"></canvas>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-4">
            <canvas id="lineChart3"></canvas>
        </div>
        <div class="col-4">
            <canvas id="lineChart4"></canvas>
        </div>
        <div class="col-4">
            <canvas id="lineChart5"></canvas>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script type="text/javascript">
        var ctx = document.getElementById('lineChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    <?php
                    if (count($graph) > 0) {
                        foreach ($graph as $data) {
                            echo "'" . $data->nama_pasien . "',";
                        }
                    }
                    ?>
                ],
                datasets: [{
                    label: 'Rom',
                    backgroundColor: '#B9A8F0',
                    borderColor: '#92459B',
                    data: [
                        <?php
                        if (count($graph) > 0) {
                            foreach ($graph as $data) {
                                echo $data->rom . ", ";
                            }
                        }
                        ?>
                    ]
                }]
            },
        });
    </script>

    <script type="text/javascript">
        var ctx = document.getElementById('lineChart2').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    <?php
                    if (count($graph) > 0) {
                        foreach ($graph as $data) {
                            echo "'" . $data->nama_pasien . "',";
                        }
                    }
                    ?>
                ],
                datasets: [{
                    label: 'Dorsifleksi',
                    backgroundColor: '#EDD1FA',
                    borderColor: '#4120A9',
                    data: [
                        <?php
                        if (count($graph) > 0) {
                            foreach ($graph as $data) {
                                echo $data->dorsifleksi . ", ";
                            }
                        }
                        ?>
                    ]
                }]
            },
        });
    </script>

    <script type="text/javascript">
        var ctx = document.getElementById('lineChart3').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    <?php
                    if (count($graph) > 0) {
                        foreach ($graph as $data) {
                            echo "'" . $data->nama_pasien . "',";
                        }
                    }
                    ?>
                ],
                datasets: [{
                    label: 'Plantarfleksi',
                    backgroundColor: '#E390C8',
                    borderColor: '#5D59AF',
                    data: [
                        <?php
                        if (count($graph) > 0) {
                            foreach ($graph as $data) {
                                echo $data->plantarfleksi . ", ";
                            }
                        }
                        ?>
                    ]
                }]
            },
        });
    </script>

    <script type="text/javascript">
        var ctx = document.getElementById('lineChart4').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    <?php
                    if (count($graph) > 0) {
                        foreach ($graph as $data) {
                            echo "'" . $data->nama_pasien . "',";
                        }
                    }
                    ?>
                ],
                datasets: [{
                    label: 'Durasi Langkah',
                    backgroundColor: '#C8F4F9',
                    borderColor: '#E0A030',
                    data: [
                        <?php
                        if (count($graph) > 0) {
                            foreach ($graph as $data) {
                                echo $data->durasi_langkah . ", ";
                            }
                        }
                        ?>
                    ]
                }]
            },
        });
    </script>

    <script type="text/javascript">
        var ctx = document.getElementById('lineChart5').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    <?php
                    if (count($graph) > 0) {
                        foreach ($graph as $data) {
                            echo "'" . $data->nama_pasien . "',";
                        }
                    }
                    ?>
                ],
                datasets: [{
                    label: 'Jumlah Langkah',
                    backgroundColor: '#7EC8E3',
                    borderColor: '#0000FF',
                    data: [
                        <?php
                        if (count($graph) > 0) {
                            foreach ($graph as $data) {
                                echo $data->jumlah_langkah . ", ";
                            }
                        }
                        ?>
                    ]
                }]
            },
        });
    </script>

</div>
<!-- End of Main Content -->