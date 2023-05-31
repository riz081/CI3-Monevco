<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class="btn btn-primary btn-sm mb-3" href="<?php echo base_url('admin/hasil_terapi/tambah_data') ?>">
        <i class="fas fa-solid fa-file-archive mr-2">
        </i>
        Input Hasil Terapi
    </a>

    <?php echo $this->session->flashdata('pesan') ?>

    <table class="table table-bordered table-striped table-hover mt-4 mb-4">
        <tr>
            <th class="text-center">
                No.
            </th>

            <th class="text-center">
                ROM
            </th>

            <th class="text-center">
                Dorsifleksi
            </th>

            <th class="text-center">
                Plantarfleksi
            </th>

            <th class="text-center">
                Durasi Langkah
            </th>

            <th class="text-center">
                Jumlah Langkah
            </th>

            <th class="text-center">
                Nama Pasien
            </th>

            <th class="text-center">
                Nama Terapis
            </th>

            <th class="text-center">
                Status
            </th>

            <th class="text-center">
                Action
            </th>
        </tr>

        <?php
        $no = 1;
        foreach ($hasil_terapi as $ht) : ?>

            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $ht->rom ?></td>
                <td><?php echo $ht->dorsifleksi ?></td>
                <td><?php echo $ht->plantarfleksi ?></td>
                <td><?php echo $ht->durasi_langkah ?></td>
                <td><?php echo $ht->jumlah_langkah ?></td>
                <td><?php echo $ht->nama_pasien ?></td>
                <td><?php echo $ht->nama_terapis ?></td>
                <td><?php echo $ht->status ?></td>
                <td>
                    <center>
                        <a class="btn btn-warning btn-sm mr-2" href="<?php echo base_url('admin/hasil_terapi/update_data/' . $ht->id_hasil_terapi) ?>">
                            <i class="fas fa-edit">

                            </i>
                        </a>

                        <a onclick="return confirm('Ingin Menghapus Hasil Terapi ?')" class="btn btn-danger btn-sm" href="<?php echo base_url('admin/hasil_terapi/delete_data/' . $ht->id_hasil_terapi) ?>">
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