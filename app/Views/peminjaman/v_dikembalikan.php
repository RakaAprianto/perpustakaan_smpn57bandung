<div class="col-md-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">
                <?= $judul ?>
            </h3>

        </div>
        <div class="card-body">
            <?php
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

            <table class="table table-bordered">
                <tr>
                    <th class="text-center">NO</th>
                    <th class="text-center">Nomor Pinjam</th>
                    <th class="text-center">Cover</th>
                    <th class="text-center">Data Buku</th>
                    <th class="text-center">Detail Peminjaman</th>
                    <th class="text-center">Status</th>
                </tr>
                <?php $no = 1;
                foreach ($pengajuandikembalikan as $key => $value) { ?>

                    <tr>
                        <td>
                            <?= $no++ ?>
                        </td>
                        <td>
                            <?= $value['no_pinjam'] ?>
                        </td>
                        <td class="text-center"><img src="<?= base_url('cover/' . $value['cover']) ?>" width="125px"
                                height="125px">
                            <p>
                                <?= $value['kode_buku'] ?>
                            </p>
                        </td>
                        <td>
                            <b>
                                <?= $value['judul_buku'] ?>
                            </b>
                            <p>
                                Kategori :
                                <?= $value['nama_kategori'] ?> <br>
                                ISBN :
                                <?= $value['isbn'] ?> <br>
                                Penulis :
                                <?= $value['nama_penulis'] ?> <br>

                                Penerbit :
                                <?= $value['nama_penerbit'] ?> <br>

                                Halaman :
                                <?= $value['halaman'] ?> <br>

                                Rak :
                                <?= $value['nama_rak'] ?> <br>
                                Bahasa :
                                <?= $value['bahasa'] ?> <br>
                                Tahun :
                                <?= $value['tahun'] ?>
                            </p>
                        </td>
                        <td>
                            <b>Tanggal Pengajuan :</b>
                            <?= $value['tgl_pengajuan'] ?> <br>
                            <b>Tanggal Pinjam :</b>
                            <?= $value['tgl_pinjam'] ?> <br>
                            <b>Lama Pinjam :</b>
                            <?= $value['lama_pinjam'] ?> Hari<br>
                            <b>Tanggal Harus Dikembalikan :</b>
                            <?= $value['tgl_harus_kembali'] ?> <br>
                        </td>
                        <td class="text-center">
                            <span class="right badge badge-success">
                                <?= $value['status_pinjam'] ?>
                            </span>
                        </td>
                    </tr>
                <?php } ?>
            </table>

        </div>
    </div>
</div>