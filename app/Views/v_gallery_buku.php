<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <?= $judul ?>
            </h3>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-borderless table-hover">
                <thead>
                    <tr class="text-center">
                        <th>Cover</th>
                        <th>Buku</th>
                        <th width="250px">Deskripsi / Sinopsis</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($buku as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><img src="<?= base_url('cover/' . $value['cover']) ?>" width="250px"
                                    height="300px"></td>
                            <td>
                                <p>
                                <h5 class="text-primary">
                                    <?= $value['judul_buku'] ?>
                                </h5>
                                </p>
                                <p> Kategori :
                                    <?= $value['nama_kategori'] ?> <br>

                                    ISBN :
                                    <?= $value['isbn'] ?> <br>

                                    Penulis :
                                    <?= $value['nama_penulis'] ?> <br>

                                    Penerbit :
                                    <?= $value['nama_penerbit'] ?> <br>

                                    Halaman :
                                    <?= $value['halaman'] ?> <br>

                                    Bahasa :
                                    <?= $value['bahasa'] ?> <br>

                                    Tahun :
                                    <?= $value['tahun'] ?> <br>

                                    Rak :
                                    <?= $value['nama_rak'] ?> <br>

                                    Jumlah :
                                    <?= $value['jumlah'] ?>
                                </p>
                            </td>
                            <td>
                                <?= substr($value['deskripsi'], 0, 350) ?>... <a
                                    href="<?= base_url('Home/DetailBuku/' . $value['id_buku']) ?> ">Selengkapnya</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>