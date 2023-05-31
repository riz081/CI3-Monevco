<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- COL 3 -->
        <div class="col-md-3 col-sm-6 col-12 search-content">
            <div class="card shadow-lg">
                <div class="card-body text-center bg-gradient-body rounded">
                    <a href="<?php echo base_url('terapis/data_pasien') ?>" class="btn btn-outline-primary">
                        <img src="<?php echo base_url('assets/images/pasien.png') ?>" class="mx-auto mb-2" width="125" alt="">
                        <p style="font-size: 20px; font-weight:bold;">Daftar Pasien</p>
                        <h1 style="font-size: 20px; font-weight:bold;">
                            <?php echo $pasien; ?>
                        </h1>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12 search-content">
            <div class="card shadow-lg">
                <div class="card-body text-center bg-gradient-body rounded">
                    <a href="<?php echo base_url('terapis/jadwal_terapis') ?>" class="btn btn-outline-success">
                        <img src="<?php echo base_url('assets/images/kalender.png') ?>" class="mx-auto mb-2" width="150" alt="">
                        <p style="font-size: 20px; font-weight:bold;">Jadwal Terapis</p>
                        <h1 style="font-size: 20px; font-weight:bold;">
                            <?php echo $jadwal; ?>
                        </h1>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12 search-content">
            <div class="card shadow-lg">
                <div class="card-body text-center bg-gradient-body rounded">
                    <a href="<?php echo base_url('terapis/laporan_terapis') ?>" class="btn btn-outline-dark">
                        <img src="<?php echo base_url('assets/images/laporan.png') ?>" class="mx-auto mb-2" width="150" alt="">
                        <p style="font-size: 20px; font-weight:bold;">Laporan Terapis</p>
                        <h1 style="font-size: 20px; font-weight:bold;">
                            <?php echo $hasil_terapi; ?>
                        </h1>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12 search-content">
            <div class="card shadow-lg">
                <div class="card-body text-center bg-gradient-body rounded">
                    <a href="<?php echo base_url('terapis/riwayat_pasien') ?>" class="btn btn-outline-warning">
                        <img src="<?php echo base_url('assets/images/riwayat.png') ?>" class="mx-auto mb-2" width="150" alt="">
                        <p style="font-size: 20px; font-weight:bold;">Riwayat Terapis</p>
                        <h1 style="font-size: 20px; font-weight:bold;">
                            <?php echo $riwayat_terapi; ?>
                        </h1>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- COL 4  -->
<!-- <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card text-white bg-gradient-primary text-center">
                <div class="card-content d-flex">
                    <img src="<?php echo base_url('assets/images/pasien.png') ?>" alt="" width="180" class="float-left px-1">
                    <div class="card-body">
                        <h4 class="card-title text-white mt-3">Daftar Pasien</h4>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <h1 class="text-white">
                                <?php echo $pasien; ?>
                            </h1>
                        </div>
                        <a href="<?php echo base_url('terapis/data_pasien') ?>" class="btn btn-primary mt-3">Tampilkan</a>
                    </div>
                </div>
            </div>
        </div> -->

<!-- <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card text-white bg-gradient-success text-center">
                <div class="card-content d-flex">
                    <img src="<?php echo base_url('assets/images/kalender.png') ?>" alt="" width="180" class="float-left px-1">
                    <div class="card-body">
                        <h4 class="card-title text-white mt-3">Jadwal Terapis</h4>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <h1 class="text-white">
                                <?php echo $jadwal; ?>
                            </h1>
                        </div>
                        <a href="<?php echo base_url('terapis/jadwal_terapis') ?>" class="btn btn-success mt-3">Tampilkan</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card text-white bg-gradient-info text-center">
                <div class="card-content d-flex">
                    <img src="<?php echo base_url('assets/images/hasil.png') ?>" alt="" width="180" class="float-left px-1">
                    <div class="card-body">
                        <h4 class="card-title text-white mt-3">Hasil Terapis</h4>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <h1 class="text-white">
                                <?php echo $hasil_terapi; ?>
                            </h1>
                        </div>
                        <a href="<?php echo base_url('terapis/laporan_terapis') ?>" class="btn btn-info mt-3">Tampilkan</a>
                    </div>
                </div>
            </div>
        </div>