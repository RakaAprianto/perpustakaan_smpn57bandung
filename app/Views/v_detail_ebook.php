<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <?= $judul ?>
            </h3>
        </div>

        <div class="card-body">

            <div class="row">
                <div class="col-sm-3">
                    <img class="img-fluid" src="<?= base_url('cover/' . $ebook['cover']) ?>" width="500px">
                </div>
                <div class="col-sm-8">
                    <table class="table">
                        <tr>
                            <th width="150px">Judul EBook</th>
                            <th width="20px">:</th>
                            <td>
                                <b>
                                    <?= $ebook['judul_ebook'] ?>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <th>:</th>
                            <td>
                                <b>
                                    <?= $ebook['nama_kategori'] ?>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <th>Penulis</th>
                            <th>:</th>
                            <td>
                                <b>
                                    <?= $ebook['nama_penulis'] ?>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <th>Penerbit</th>
                            <th>:</th>
                            <td>
                                <b>
                                    <?= $ebook['nama_penerbit'] ?>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <th>Tahun</th>
                            <th>:</th>
                            <td>
                                <b>
                                    <?= $ebook['tahun'] ?>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <th>ISBN</th>
                            <th>:</th>
                            <td>
                                <b>
                                    <?= $ebook['isbn'] ?>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <th>Bahasa</th>
                            <th>:</th>
                            <td>
                                <b>
                                    <?= $ebook['bahasa'] ?>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <th>Halaman</th>
                            <th>:</th>
                            <td>
                                <b>
                                    <?= $ebook['halaman'] ?>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <th>File Ebook</th>
                            <th>:</th>
                            <td>
                                <?php
                                if (session()->get('level') <> "") { ?>
                                    <a href="<?= base_url('ebooks/' . $ebook['ebooks']) ?>"
                                        class="btn btn-flat btn-sm btn-danger">
                                        <i class="fas fa-file-pdf"> Download E-Book</i>
                                    </a>
                                <?php } else { ?>
                                    <label class="text-red">Silahkan Login Untuk Download File</label>
                                <?php } ?>


                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-12">
                    <?= $ebook['deskripsi'] ?>
                </div>
            </div>
        </div>
    </div>
</div>