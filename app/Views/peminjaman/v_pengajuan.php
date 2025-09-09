<div class="col-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
            <div class="card-tools">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-sm">
                    <i class="fas fa-plus"></i> Tambah Pengajuan
                </button>
            </div>
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
                    <tr>
                        <th class="text-center">NO</th>
                        <th class="text-center">Nomor Pinjam</th>
                        <th class="text-center">Cover</th>
                        <th class="text-center">Data Buku</th>
                        <th class="text-center">Detail Peminjaman</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    <?php $no = 1; foreach ($pengajuanbuku as $value) : ?>
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
                                <span class="badge badge-warning"><?= $value['status_pinjam'] ?></span>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete<?= $value['id_pinjam'] ?>">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Pengajuan -->
<div class="modal fade" id="modal-sm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php 
                $id_anggota = session()->get('id_anggota');
                $tgl = date('YmdHis');
                $no_pinjam = $id_anggota . $tgl;
                ?>
                <?= form_open('Peminjaman/AddPengajuan') ?>
                <div class="form-group">
                    <label>No Pinjam</label>
                    <input class="form-control" name="no_pinjam" value="<?= $no_pinjam ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Buku</label>
                    <select name="id_buku" class="form-control select2">
                        <option value="">Pilih Buku</option>
                        <?php foreach ($buku as $value) : ?>
                            <option value="<?= $value['id_buku'] ?>"><?= $value['judul_buku'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal Pinjam</label>
                    <input type="date" name="tgl_pinjam" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Lama Pinjam</label>
                    <input type="number" name="lama_pinjam" class="form-control" value="7" max="7" min="1">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Ajukan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<?php foreach ($pengajuanbuku as $value) : ?>
    <div class="modal fade" id="modal-delete<?= $value['id_pinjam'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $judul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open(base_url('Peminjaman/DeleteData/' . $value['id_pinjam'])) ?>
                    <p>Apakah Data Akan Dihapus? <b><?= $value['judul_buku'] ?></b> ..?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
