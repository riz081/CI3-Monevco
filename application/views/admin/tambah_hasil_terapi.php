<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 65%; margin-bottom: 100px">
        <div class="card-body">

            <form action="<?php echo base_url('admin/hasil_terapi/tambah_data_aksi') ?>" method="POST">

                <div class="form-group">
                    <label>ROM</label>
                    <input type="decimal" name="rom" class="form-control">
                    <?php echo form_error('rom', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label>Dorsifleksi</label>
                    <input type="decimal" name="dorsifleksi" class="form-control">
                    <?php echo form_error('dorsifleksi', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label>Plantarfleksi</label>
                    <input type="decimal" name="plantarfleksi" class="form-control">
                    <?php echo form_error('plantarfleksi', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label>Durasi Langkah</label>
                    <input type="decimal" name="durasi_langkah" class="form-control">
                    <?php echo form_error('durasi_langkah', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label>Jumlah Langkah</label>
                    <input type="decimal" name="jumlah_langkah" class="form-control">
                    <?php echo form_error('jumlah_langkah', '<div class="text-small text-danger">', '</div>') ?>
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
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1"> Baik </option>
                        <option value="2"> Cukup Baik </option>
                        <option value="3"> Kurang Baik</option>
                    </select>
                    <?php echo form_error('status', '<div class="text-small text-danger">', '</div>') ?>
                </div>


                <button type="submit" class="btn btn-primary mt-3">
                    Simpan
                </button>

            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->