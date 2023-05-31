<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 65%; margin-bottom: 100px">
        <div class="card-body">

            <form action="<?php echo base_url('terapis/data_pasien/tambah_data_aksi') ?>" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label>Tipe User</label>
                    <select name="id_tipeUser" class="form-control">
                        <option value="3"> Pasien</option>
                    </select>
                    <?php echo form_error('id_tipeUser', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label>Nama Pasien</label>
                    <input type="text" name="nama" class="form-control">
                    <?php echo form_error('nama', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control">
                    <?php echo form_error('tempat_lahir', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control">
                    <?php echo form_error('tanggal_lahir', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control">
                    <?php echo form_error('alamat', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="number" name="no_telp" class="form-control">
                    <?php echo form_error('no_telp', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control">
                    <?php echo form_error('username', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <?php echo form_error('password', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control">
                    <?php echo form_error('photo', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <button type="submit" class="btn btn-primary mt-3">
                    Simpan
                </button>

            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->