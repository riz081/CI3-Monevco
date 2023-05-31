<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 65%; margin-bottom: 100px">
        <div class="card-body">

            <form action="<?php echo base_url('terapis/riwayat_pasien/tambah_data_aksi') ?>" method="POST">

                <div class="form-group">
                    <label>Catatan</label>
                    <input type="text" name="catatan" class="form-control">
                    <?php echo form_error('catatan', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label>Nama Terapis</label>
                    <select name="nama_terapis" class="form-control">
                        <option value="">== Nama Terapis ==</option>
                        <?php foreach ($userT as $up) : ?>
                            <option value="<?php echo $up->nama ?>">
                                <?php echo $up->nama ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('nama_terapis', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label>Nama Pasien</label>
                    <select name="nama_pasien" class="form-control">
                        <option value="">== Nama Pasien ==</option>
                        <?php foreach ($userP as $up) : ?>
                            <option value="<?php echo $up->nama ?>">
                                <?php echo $up->nama ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('nama_pasien', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1"> Baik </option>
                        <option value="2"> Cukup Baik </option>
                        <option value="3"> Kurang Baik</option>
                    </select>
                    <?php echo form_error('status', '<div class="text-small text-danger">', '</div>') ?>
                </div>
                <!-- <div class="form-group">
                    <label>Status Pasien</label>
                    <select name="status" class="form-control">
                        <option value="">== Status Pasien ==</option>
                        <?php foreach ($hasil_terapi as $ht) : ?>
                            <option value="<?php echo $ht->status ?>">
                                <?php echo $ht->status ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('status', '<div class="text-small text-danger">', '</div>') ?>
                </div> -->

                <div class="form-group">
                    <label>Hari</label>
                    <select name="hari" class="form-control">
                        <option value="Senin"> Senin </option>
                        <option value="Selasa"> Selasa </option>
                        <option value="Rabu"> Rabu</option>
                        <option value="Kamis"> Kamis</option>
                        <option value="Jum'at"> Jum'at</option>
                        <option value="Sabtu"> Sabtu</option>
                        <option value="Minggu"> Minggu</option>
                    </select>
                    <?php echo form_error('hari', '<div class="text-small text-danger">', '</div>') ?>
                </div>


                <button type="submit" class="btn btn-primary mt-3">
                    Simpan
                </button>

            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->