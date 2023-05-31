<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 65%; margin-bottom: 100px">
        <div class="card-body">

            <?php foreach ($riwayat_terapi as $rt) : ?>

                <form action="<?php echo base_url('admin/riwayat_terapi/update_data_aksi') ?>" method="POST">

                    <div class="form-group">
                        <label>Catatan</label>
                        <input type="text" name="catatan" class="form-control" value="<?php echo $rt->catatan ?>">
                        <input type="hidden" name="id_riwayatTerapi" class="form-control" value="<?php echo $rt->id_riwayatTerapi ?>">
                        <?php echo form_error('catatan', '<div class="text-small text-danger">', '</div>') ?>
                    </div>


                    <div class="form-group">
                        <label>Nama Terapis</label>
                        <select name="nama_terapis" class="form-control">
                            <option value="<?php echo $rt->nama_terapis ?>">== <?php echo $rt->nama_terapis ?> ==</option>
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
                            <option value="<?php echo $rt->nama_pasien ?>">== <?php echo $rt->nama_pasien ?> ==</option>
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
                            <option value="<?php echo $rt->status ?>">== <?php echo $rt->status ?> ==</option>
                            <option value="1"> Baik </option>
                            <option value="2"> Cukup Baik </option>
                            <option value="3"> Kurang Baik</option>
                        </select>
                        <?php echo form_error('status', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Hari</label>
                        <select name="hari" class="form-control">
                            <option value="<?php echo $rt->hari ?>">== <?php echo $rt->hari ?> ==</option>
                            <option value="Senin"> Senin </option>
                            <option value="Selasa"> Selasa </option>
                            <option value="Rabu"> Rabu</option>
                            <option value="Kamis"> Kamis </option>
                            <option value="Jum'at"> Jum'at </option>
                            <option value="Sabtu"> Sabtu </option>
                            <option value="Minggu"> Minggu </option>
                        </select>
                        <?php echo form_error('hari', '<div class="text-small text-danger">', '</div>') ?>
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