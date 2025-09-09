<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?= base_url('Auth') ?>" class="h2">
                <?= $judul ?>
            </a>
        </div>
        <div class="card-body">
            <?php
            // Notifikasi
            $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
                <div class="alert alert-danger" role="alert">
                    <h4>Periksa Entry Form</h4>
                    <ul>
                        <?php foreach ($errors as $key => $error) { ?>
                            <li><?= esc($error) ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>

            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-danger" role="alert">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
            ?>
            <?php echo form_open('Auth/CekLoginAnggota') ?>
            <div class="input-group mb-3">
                <input class="form-control" name="nis" placeholder="NIS">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <a class="btn btn-success btn-block" href="<?= base_url('Auth') ?>">Kembali</a>
                </div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                </div>
            </div>
            </form>
        </div>
        <?php form_close() ?>

        <div class="text-center mb-3">
            <p class="text-muted"><i>Jika belum memiliki akun, silahkan hubungi petugas perpustakaan</i></p>
        </div>

    </div>
</div>