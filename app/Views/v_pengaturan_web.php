<div class="col-md-12">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form
                <?= $judul ?>
            </h3>
        </div>



        <?php
        echo form_open_multipart('Pengaturan/UpdateWeb');
        ?>
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
            <div class="row">
                <div class="col-sm-2">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <img src="<?= base_url('logo/' . $web['logo']) ?>" width="180px" height="180px">
                            </div>
                            <div class="form-group">
                                <label>Ganti Logo</label>
                                <input type="file" name="logo" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Sekolah</label>
                                <input class="form-control" name="nama_sekolah" value="<?= $web['nama_sekolah'] ?>"
                                    placeholder="Nama Sekolah">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input class="form-control" name="alamat" value="<?= $web['alamat'] ?>"
                                    placeholder="Alamat">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input class="form-control" name="kecamatan" value="<?= $web['kecamatan'] ?>"
                                    placeholder="Kecamatan">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kabupaten/Kota</label>
                                <input class="form-control" name="kab_kota" value="<?= $web['kab_kota'] ?>"
                                    placeholder="Kabupaten/Kota">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kode Pos</label>
                                <input class="form-control" name="pos" value="<?= $web['pos'] ?>"
                                    placeholder="Kode Pos">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>No Telpon</label>
                                <input class="form-control" name="no_telpon" value="<?= $web['no_telpon'] ?>"
                                    placeholder="No Telpon">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Sejarah</label>
                        <textarea name="sejarah" class="form-control" cols="" rows="5"><?= $web['sejarah'] ?></textarea>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Visi</label>
                        <textarea name="visi" class="form-control" cols="" rows="5"><?= $web['visi'] ?></textarea>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Misi</label>
                        <textarea name="misi" class="form-control" cols="" rows="5"><?= $web['misi'] ?></textarea>
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