<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>


    <div class="card" style="width: 50%; margin-bottom: 100px">
        <div class="card-body">

            <?php foreach ($tipe_user as $tu) : ?>

                <form action="<?php echo base_url('admin/data_tipe_user/update_data_aksi') ?>" method="POST">

                    <div class="form-group">
                        <label><strong>Kode User</strong></label>
                        <input type="hidden" class="form-control" name="id_tipeUser" value="<?php echo $tu->id_tipeUser ?>">
                        <input type="text" name="kode_user" class="form-control" value="<?php echo $tu->kode_user ?>">
                        <?php echo form_error('kode_user', '<div class="text-small text-danger">', '</div>') ?>
                    </div>


                    <div class="form-group">
                        <label><strong>Tipe User</strong></label>
                        <input type="text" name="tipe_user" class="form-control" value="<?php echo $tu->tipe_user ?>">
                        <?php echo form_error('tipe_user', '<div class="text-small text-danger">', '</div>') ?>
                    </div>


                    <button type="submit" class="btn btn-primary mt-3">
                        Submit
                    </button>

                    <button type="reset" class="btn btn-warning mt-3">
                        Reset
                    </button>

                </form>

            <?php endforeach; ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->