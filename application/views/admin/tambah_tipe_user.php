<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>


    <div class="card" style="width: 50%; margin-bottom: 100px">
        <div class="card-body">

            <form action="<?php echo base_url('admin/data_tipe_user/tambah_data_aksi') ?>" method="POST">

                <div class="form-group">
                    <label><strong>Kode User</strong></label>
                    <input type="text" name="kode_user" class="form-control">
                    <?php echo form_error('kode_user', '<div class="text-small text-danger">', '</div>') ?>
                </div>


                <div class="form-group">
                    <label><strong>Tipe User</strong></label>
                    <input type="text" name="tipe_user" class="form-control">
                    <?php echo form_error('tipe_user', '<div class="text-small text-danger">', '</div>') ?>
                </div>


                <button type="submit" class="btn btn-primary mt-3">
                    Submit
                </button>

                <button type="reset" class="btn btn-warning mt-3">
                    Reset
                </button>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->