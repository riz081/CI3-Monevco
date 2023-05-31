<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

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
            </tr>

        <?php endforeach; ?>
    </table>

</div>
<!-- /.container-fluid -->