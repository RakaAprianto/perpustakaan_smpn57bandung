<div class="col-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('errors'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <h4>Periksa Entry Form</h4>
                    <ul>
                        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                    <?= session()->getFlashdata('pesan') ?>
                </div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th>NO</th>
                            <th>Nomor Pinjam</th>
                            <th>Cover</th>
                            <th>Data Buku</th>
                            <th>Detail Peminjaman</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($pengajuanditerima as $value) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $value['no_pinjam'] ?></td>
                                <td class="text-center">
                                    <img src="<?= base_url('cover/' . $value['cover']) ?>" class="img-fluid" style="max-width: 100px;">
                                    <p><?= $value['kode_buku'] ?></p>
                                </td>
                                <td>
                                    <b><?= $value['judul_buku'] ?></b>
                                    <p>
                                        Kategori: <?= $value['nama_kategori'] ?><br>
                                        ISBN: <?= $value['isbn'] ?><br>
                                        Penulis: <?= $value['nama_penulis'] ?><br>
                                        Penerbit: <?= $value['nama_penerbit'] ?><br>
                                        Halaman: <?= $value['halaman'] ?><br>
                                        Rak: <?= $value['nama_rak'] ?><br>
                                        Bahasa: <?= $value['bahasa'] ?><br>
                                        Tahun: <?= $value['tahun'] ?>
                                    </p>
                                </td>
                                <td>
                                    <b>Tanggal Pengajuan:</b> <?= $value['tgl_pengajuan'] ?><br>
                                    <b>Tanggal Pinjam:</b> <?= $value['tgl_pinjam'] ?><br>
                                    <b>Lama Pinjam:</b> <?= $value['lama_pinjam'] ?> Hari<br>
                                    <b>Tanggal Harus Dikembalikan:</b> <?= $value['tgl_harus_kembali'] ?><br>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-success"><?= $value['status_pinjam'] ?></span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
