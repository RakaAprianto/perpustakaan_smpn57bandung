<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data
                <?= $judul ?>
            </h3>
            <div class="card-tools">
                <a href="<?= base_url('Anggota/AddData') ?>" class="btn btn-primary btn-flat btn-sm">
                    <i class="fas fa-plus"></i> Add
                </a>
            </div>

        </div>
        <div class="card-body">

            <?php
            //notifikasi
            $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
                <div class="alert alert-danger" role="alert">
                    <h4>Periksa Entry Form</h4>
                    <ul>
                        <?php foreach ($errors as $key => $error) { ?>
                            <li>
                                <?= esc($error) ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>



            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Sukses!</h5>';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
            ?>


            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th class>NIS</th>
                        <th class>Nama Siswa</th>
                        <th class>Jenis Kelamin</th>
                        <th class>Kelas</th>
                        <th class>No Handphone</th>
                        <th class>Foto</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($anggota as $key => $value) { ?>
                        <tr>
                            <td>
                                <?= $no++ ?>.
                            </td>
                            <td>
                                <?= $value['nis'] ?>
                            </td>
                            <td>
                                <?= $value['nama_siswa'] ?><br>
                                <?php if ($value['verifikasi'] == 1) { ?>
                                    <a class="text-success"><i class="fa fa-check"></i> Verifikasi</a>
                                <?php } else { ?>
                                    <a class="text-danger"><i class="fa fa-times"></i> Belum Verifikasi</a><br>
                                    <a class="btn btn-success btn-xs"
                                        href="<?= base_url('Anggota/Verifikasi/' . $value['id_anggota']) ?>">
                                        Verifikasikan</a>
                                <?php } ?>
                            </td>
                            <td>
                                <?= $value['jenis_kelamin'] ?>
                            </td>
                            <td>
                                <?= $value['nama_kelas'] ?>
                            </td>
                            <td>
                                <?= $value['no_hp'] ?>
                            </td>
                            <td class="text-center"><img src="<?= base_url('foto/' . $value['foto']) ?>" width="125px"
                                    height="125px"></td>
                            <td class="text-center">
                                <a href="<?= base_url('Anggota/EditData/' . $value['id_anggota']) ?>"
                                    class="btn btn-warning btn-flat btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-flat btn-sm" data-toggle="modal"
                                    data-target="#modal-delete<?= $value['id_anggota'] ?>">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>

    </div>
</div>

<?php foreach ($anggota as $key => $value) { ?>

    <div class="modal fade" id="modal-delete<?= $value['id_anggota'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete
                        <?= $judul ?>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open(base_url('Anggota/DeleteData/' . $value['id_anggota'])) ?>
                    <div class="form-group">
                        Apakah Data Akan Dihapus? <b>
                            <?= $value['nama_siswa'] ?>
                        </b> ..?
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
                <?php echo form_close() ?>
            </div>

        </div>

    </div>

<?php } ?>