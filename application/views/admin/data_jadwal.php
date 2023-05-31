<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class="btn btn-primary btn-sm mb-3" href="<?php echo base_url('admin/data_jadwal/tambah_data') ?>">
        <i class="fas fa-solid fa-calendar mr-2">
        </i>
        Tambahkan Jadwal
    </a>

    <?php echo $this->session->flashdata('pesan') ?>

    <table class="table table-bordered table-striped table-hover mt-4 mb-4">
        <tr>
            <th class="text-center">
                No.
            </th>

            <th class="text-center">
                Jam
            </th>

            <th class="text-center">
                Hari
            </th>

            <th class="text-center">
                Nama Terapis
            </th>

            <th class="text-center">
                Nama Pasien
            </th>

            <th class="text-center">
                Action
            </th>
        </tr>

        <?php
        $no = 1;
        foreach ($jadwal as $j) : ?>

            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $j->jam ?></td>
                <td><?php echo $j->hari ?></td>
                <td><?php echo $j->nama ?></td>
                <td><?php echo $j->nama_pasien ?></td>
                <td>
                    <center>
                        <a class="btn btn-warning btn-sm mr-2" href="<?php echo base_url('admin/data_jadwal/update_data/' . $j->id_jadwal) ?>">
                            <i class="fas fa-edit">

                            </i>
                        </a>

                        <a onclick="return confirm('Ingin Menghapus Jadwal ?')" class="btn btn-danger btn-sm" href="<?php echo base_url('admin/data_jadwal/delete_data/' . $j->id_jadwal) ?>">
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