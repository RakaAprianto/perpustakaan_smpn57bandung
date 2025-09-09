<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data
                <?= $judul ?>
            </h3>
            <div class="card-tools">
                <a href="<?= base_url('User/AddData') ?>" class="btn btn-primary btn-flat btn-sm">
                    <i class="fas fa-plus"></i> Add
                </a>
            </div>

        </div>

        <div class="card-body">

            <?php
            if(session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Sukses!</h5>';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
            ?>


            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th class>Nama User</th>
                        <th class>Email</th>
                        <th class>No Handphone</th>
                        <th class>Poto</th>
                        <th class>Level</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($user as $key => $value) { ?>
                        <tr>
                            <td>
                                <?= $no++ ?>.
                            </td>
                            <td>
                                <?= $value['nama_user'] ?>
                            </td>
                            <td>
                                <?= $value['email'] ?>
                            </td>
                            <td>
                                <?= $value['no_hp'] ?>
                            </td>
                            <td class="text-center"><img src="<?= base_url('foto/'.$value['foto']) ?>" width="125px"
                                    height="125px"></td>
                            <td class="text-center">
                                <?= $value['level'] == '0' ? '<span class="badge badge-success">Admin</span>' : '<span class="badge badge-primary">Petugas</span>' ?></span>
                            </td>
                            <td>
                                <a href="<?= base_url('User/EditData/'.$value['id_user']) ?>"
                                    class="btn btn-warning btn-flat btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-flat btn-sm" data-toggle="modal"
                                    data-target="#modal-delete<?= $value['id_user'] ?>">
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

<?php foreach($user as $key => $value) { ?>

    <div class="modal fade" id="modal-delete<?= $value['id_user'] ?>">
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
                    <?php echo form_open(base_url('User/DeleteData/'.$value['id_user'])) ?>
                    <div class="form-group">
                        Apakah Data Akan Dihapus? <b>
                            <?= $value['nama_user'] ?>
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