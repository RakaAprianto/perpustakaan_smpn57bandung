<div class="col-md-12">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form
                <?= $judul ?>
            </h3>
        </div>

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

        <?php
        echo form_open_multipart('User/SimpanData');
        ?>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-2">
                    <div class="col-sm-12">
                        <img src="<?= base_url('foto/blankfoto.jpeg') ?>" id="gambar_load" class=" img-fluid "
                            width="200px" height="200px">
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Input Foto</label>
                            <input type="file" name="foto" class="form-control" id="preview_gambar" accept="image/*">
                        </div>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama User</label>
                                <input class="form-control" name="nama_user" value="<?= old('nama_user') ?>"
                                    placeholder="Nama User">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" value="<?= old('email') ?>"
                                    placeholder="Email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>No Handphone</label>
                                <input class="form-control" name="no_hp" value="<?= old('no_hp') ?>"
                                    placeholder="No Handphone">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Level</label>
                                <select name="level" class="form-control">
                                    <option value="">--Pilih Level--</option>
                                    <option value="0">Admin</option>
                                    <option value="1">Petugas</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            <a href="<?= base_url('User') ?>" class="btn btn-warning"><i class="fas fa-undo-alt"></i> Kembali</a>
        </div>
        <?php echo form_close() ?>
    </div>
</div>