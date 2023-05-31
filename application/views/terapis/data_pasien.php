<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class="btn btn-primary btn-sm mb-3" href="<?php echo base_url('terapis/data_pasien/tambah_data') ?>">
        <i class="fas fa-solid fa-user-injured mr-2">
        </i>
        Tambahkan Pasien
    </a>

    <?php echo $this->session->flashdata('pesan') ?>

    <table class="table table-bordered table-striped table-hover mt-4 mb-4">
        <tr>
            <th class="text-center">
                No.
            </th>

            <th class="text-center">
                Tipe
            </th>

            <th class="text-center">
                Nama Pasien
            </th>

            <th class="text-center">
                Tempat Lahir
            </th>

            <th class="text-center">
                Tanggal Lahir
            </th>

            <th class="text-center">
                Alamat
            </th>

            <th class="text-center">
                Nomor Telepon
            </th>

            <th class="text-center">
                Username
            </th>

            <th class="text-center">
                Password
            </th>

            <th class="text-center">
                Photo
            </th>

            <th class="text-center">
                Action
            </th>
        </tr>

        <?php
        $no = 1;
        foreach ($user as $u) : ?>

            <tr>
                <td><?php echo $no++ ?></td>
                <td>
                    <?php
                    if ($u->id_tipeUser == "1") {
                        echo "Admin";
                    } else if ($u->id_tipeUser == "2") {
                        echo "Terapis";
                    } else if ($u->id_tipeUser == "3") {
                        echo "Pasien";
                    }
                    ?>
                </td>
                <td><?php echo $u->nama ?></td>
                <td><?php echo $u->tempat_lahir ?></td>
                <td><?php echo $u->tanggal_lahir ?></td>
                <td><?php echo $u->alamat ?></td>
                <td><?php echo $u->no_telp ?></td>
                <td><?php echo $u->username ?></td>
                <td><?php echo $u->password ?></td>
                <td>
                    <img src="<?php echo base_url() . 'assets/photo/' . $u->photo ?>" width="55px">
                </td>
                <td>
                    <center>
                        <a class="btn btn-warning btn-sm mr-2" style="width: 33px; height:33px" href="<?php echo base_url('terapis/data_pasien/update_data/' . $u->id_user) ?>">
                            <i class="fas fa-edit">

                            </i>
                        </a>

                        <a onclick="return confirm('Ingin Menghapus Data Pasien ?')" style="width: 33px; height:33px" class="btn btn-danger btn-sm" href="<?php echo base_url('terapis/data_pasien/delete_data/' . $u->id_user) ?>">
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