<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 65%; margin-bottom: 100px">
        <div class="card-body">

            <?php foreach ($jadwal as $j) : ?>

                <form action="<?php echo base_url('admin/data_jadwal/update_data_aksi') ?>" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Jam</label>
                        <input type="text" name="jam" class="form-control" value="<?php echo $j->jam ?>">
                        <input type="hidden" name="id_jadwal" class="form-control" value="<?php echo $j->id_jadwal ?>">
                        <?php echo form_error('jam', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Hari</label>
                        <input type="text" name="hari" class="form-control" value="<?php echo $j->hari ?>">
                        <?php echo form_error('hari', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Nama Terapis</label>
                        <select name="nama" class="form-control">
                            <option value="<?php echo $j->nama ?>">== Pilih Terapis ==</option>
                            <?php foreach ($user as $u) : ?>
                                <option value="<?php echo $u->nama ?>">
                                    <?php echo $u->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('nama', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Nama Pasien</label>
                        <select name="nama_pasien" class="form-control">
                            <option value="<?php echo $j->nama ?>">== Pilih Pasien ==</option>
                            <?php foreach ($userP as $u) : ?>
                                <option value="<?php echo $u->nama ?>">
                                    <?php echo $u->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('nama_pasien', '<div class="text-small text-danger">', '</div>') ?>
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