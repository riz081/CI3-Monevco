<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 65%; margin-bottom: 100px">
        <div class="card-body">

            <?php foreach ($user as $u) : ?>

                <form action="<?php echo base_url('terapis/data_pasien/update_data_aksi') ?>" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Tipe User</label>
                        <select name="id_tipeUser" class="form-control">
                            <option value="<?php echo $u->id_tipeUser ?>"><?php
                                                                            if ($u->id_tipeUser == 3) {
                                                                                echo "Pasien";
                                                                            } ?></option>
                            ?> </option>
                        </select>
                        <input type="hidden" name="id_user" class="form-control" value="<?php echo $u->id_user ?>">
                        <?php echo form_error('id_tipeUser', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $u->nama ?>">
                        <?php echo form_error('nama', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $u->tempat_lahir ?>">
                        <?php echo form_error('tempat_lahir', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $u->tanggal_lahir ?>">
                        <?php echo form_error('tanggal_lahir', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="<?php echo $u->alamat ?>">
                        <?php echo form_error('alamat', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="number" name="no_telp" class="form-control" value="<?php echo $u->no_telp ?>">
                        <?php echo form_error('no_telp', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $u->username ?>">
                        <?php echo form_error('username', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="<?php echo $u->password ?>">
                        <?php echo form_error('password', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" name="photo" class="form-control" value="<?php echo $u->photo ?>">
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