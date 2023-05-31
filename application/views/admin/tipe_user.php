<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class="btn btn-primary btn-sm mb-4" href="<?php echo base_url('admin/data_tipe_user/tambah_data') ?>">
        <i class="fas fa-solid fa-user mr-2">
        </i>
        Tambahkan Data
    </a>

    <?php echo $this->session->flashdata('pesan') ?>

    <table class="table table-bordered table-striped table-hover mt-4">
        <tr>
            <th class="text-center">
                No.
            </th>

            <th class="text-center">
                ID Tipe User
            </th>

            <th class="text-center">
                Kode User
            </th>

            <th class="text-center">
                Tipe User
            </th>

            <th class="text-center">
                Action
            </th>
        </tr>

        <?php
        $no = 1;
        foreach ($tipe_user as $tu) : ?>

            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $tu->id_tipeUser ?></td>
                <td><?php echo $tu->kode_user ?></td>
                <td><?php echo $tu->tipe_user ?></td>
                <td>
                    <center>
                        <a class="btn btn-warning btn-sm mr-2" href="<?php echo base_url('admin/data_tipe_user/update_data/' . $tu->id_tipeUser) ?>">
                            <i class="fas fa-edit">

                            </i>
                        </a>

                        <a onclick="return confirm('Ingin Menghapus Data Tipe User ?')" class="btn btn-danger btn-sm" href="<?php echo base_url('admin/data_tipe_user/delete_data/' . $tu->id_tipeUser) ?>">
                            <i class="fas fa-trash">

                            </i>
                        </a>
                    </center>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>

</div>
<!-- /.container-fluid -->