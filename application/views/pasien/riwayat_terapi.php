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
                Catatan
            </th>

            <th class="text-center">
                Nama Terapis
            </th>

            <th class="text-center">
                Nama Pasien
            </th>

            <th class="text-center">
                Status
            </th>

            <th class="text-center">
                Hari
            </th>

        </tr>

        <?php
        $no = 1;
        foreach ($riwayat_terapi as $rt) : ?>

            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $rt->catatan ?></td>
                <td><?php echo $rt->nama_terapis ?></td>
                <td><?php echo $rt->nama_pasien ?></td>
                <td><?php echo $rt->status ?></td>
                <td><?php echo $rt->hari ?></td>
            </tr>

        <?php endforeach; ?>
    </table>

</div>
<!-- /.container-fluid -->