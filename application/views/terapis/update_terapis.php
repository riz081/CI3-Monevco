<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 65%; margin-bottom: 100px">
        <div class="card-body">

            <?php foreach ($hasil_terapi as $ht) : ?>

                <form action="<?php echo base_url('terapis/laporan_terapis/update_data_aksi') ?>" method="POST">

                    <div class="form-group">
                        <label>ROM</label>
                        <input type="decimal" name="rom" class="form-control" value="<?php echo $ht->rom ?>">
                        <input type="hidden" name="id_hasil_terapi" class="form-control" value="<?php echo $ht->id_hasil_terapi ?>">
                        <?php echo form_error('rom', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Dorsifleksi</label>
                        <input type="decimal" name="dorsifleksi" class="form-control" value="<?php echo $ht->dorsifleksi ?>">
                        <?php echo form_error('dorsifleksi', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Plantarfleksi</label>
                        <input type="decimal" name="plantarfleksi" class="form-control" value="<?php echo $ht->plantarfleksi ?>">
                        <?php echo form_error('plantarfleksi', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Durasi Langkah</label>
                        <input type="decimal" name="durasi_langkah" class="form-control" value="<?php echo $ht->durasi_langkah ?>">
                        <?php echo form_error('durasi_langkah', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Langkah</label>
                        <input type="decimal" name="jumlah_langkah" class="form-control" value="<?php echo $ht->jumlah_langkah ?>">
                        <?php echo form_error('jumlah_langkah', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Nama Pasien</label>
                        <select name="nama_pasien" class="form-control">
                            <option value="<?php echo $ht->nama_pasien ?>">== <?php echo $ht->nama_pasien ?> ==</option>
                            <?php foreach ($userP as $up) : ?>
                                <option value="<?php echo $up->nama ?>">
                                    <?php echo $up->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('nama_pasien', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Nama Terapis</label>
                        <select name="nama_terapis" class="form-control">
                            <option value="<?php echo $ht->nama_terapis ?>">== <?php echo $ht->nama_terapis ?> ==</option>
                            <?php foreach ($userT as $up) : ?>
                                <option value="<?php echo $up->nama ?>">
                                    <?php echo $up->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('nama_terapis', '<div class="text-small text-danger">', '</div>') ?>
                    </div>


                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="<?php echo $ht->status ?>">== <?php echo $ht->status ?> ==</option>
                            <option value="1" <?php if ($ht->status == 1) {
                                                    echo "selected";
                                                } ?>> Baik </option>
                            <option value="2" <?php if ($ht->status == 2) {
                                                    echo "selected";
                                                } ?>> Cukup Baik </option>
                            <option value="3" <?php if ($ht->status == 3) {
                                                    echo "selected";
                                                } ?>> Kurang Baik</option>
                        </select>
                        <?php echo form_error('status', '<div class="text-small text-danger">', '</div>') ?>
                    </div>


                    <button type="submit" class="btn btn-primary mt-3">
                        Simpan
                    </button>

                </form>

            <?php endforeach; ?>

        </div>
    </div>

</div>
<!-- /.container-fluid -->