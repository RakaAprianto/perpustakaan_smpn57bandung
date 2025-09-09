<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <?= $judul ?>
            </h3>
        </div>

        <div class="card-body">

            <div class="row">
                <div class="col-sm-4">
                    <img class="img-fluid" src="<?= base_url('cover/' . $buku['cover']) ?>" width="500px">
                </div>
                <div class="col-sm-8">
                    <table class="table">
                        <tr>
                            <th>Kode Buku</th>
                            <th>:</th>
                            <td>
                                <b>
                                    <?= $buku['kode_buku'] ?>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <th width="150px">Judul Buku</th>
                            <th width="20px">:</th>
                            <td>
                                <b>
                                    <?= $buku['judul_buku'] ?>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <th>:</th>
                            <td>
                                <b>
                                    <?= $buku['nama_kategori'] ?>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <th>Penulis</th>
                            <th>:</th>
                            <td>
                                <b>
                                    <?= $buku['nama_penulis'] ?>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <th>Penerbit</th>
                            <th>:</th>
                            <td>
                                <b>
                                    <?= $buku['nama_penerbit'] ?>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <th>Tahun</th>
                            <th>:</th>
                            <td>
                                <b>
                                    <?= $buku['tahun'] ?>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <th>ISBN</th>
                            <th>:</th>
                            <td>
                                <b>
                                    <?= $buku['isbn'] ?>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <th>Bahasa</th>
                            <th>:</th>
                            <td>
                                <b>
                                    <?= $buku['bahasa'] ?>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <th>Halaman</th>
                            <th>:</th>
                            <td>
                                <b>
                                    <?= $buku['halaman'] ?>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <th>Rak</th>
                            <th>:</th>
                            <td>
                                <b>
                                    <?= $buku['nama_rak'] ?>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <th>:</th>
                            <td>
                                <b>
                                    <?= $buku['jumlah'] ?>
                                </b>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-12">
                    <?= $buku['deskripsi'] ?>
                </div>
            </div>
        </div>
    </div>
</div>