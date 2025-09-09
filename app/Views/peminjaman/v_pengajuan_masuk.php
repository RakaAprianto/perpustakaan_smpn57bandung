<div class="col-12">
    <!-- Notifikasi -->
    <?php if (session()->getFlashdata('tolak')) : ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-times"></i> Gagal!</h5>
            <?= session()->getFlashdata('tolak') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('diterima')) : ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Sukses!</h5>
            <?= session()->getFlashdata('diterima') ?>
        </div>
    <?php endif; ?>

    <?php 
    $db = \Config\Database::connect();
    foreach ($pengajuanmasuk as $value) : 
        $buku = $db->table('tbl_peminjaman')
            ->join('tbl_buku', 'tbl_buku.id_buku = tbl_peminjaman.id_buku', 'left')
            ->where('id_anggota', $value['id_anggota'])
            ->where('status_pinjam', 'D')
            ->get()->getResultArray();
    ?>

        <div class="col-12">
            <div class="card card-widget widget-user-2">
                <div class="widget-user-header bg-warning">
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="<?= base_url('foto/' . $value['foto']) ?>" alt="User Avatar">
                    </div>
                    <h3 class="widget-user-username"><?= $value['nama_siswa'] ?></h3>
                    <h5 class="widget-user-desc"><?= $value['nama_kelas'] ?></h5>
                </div>

                <div class="card-footer p-0">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Cover</th>
                                    <th>Judul Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Lama Pinjam</th>
                                    <th>Tanggal Harus Kembali</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($buku as $data) : ?>
                                    <tr class="text-center">
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['tgl_pengajuan'] ?></td>
                                        <td>
                                            <img src="<?= base_url('cover/' . $data['cover']) ?>" class="img-fluid" style="max-width: 60px; height: 70px;">
                                        </td>
                                        <td><?= $data['judul_buku'] ?></td>
                                        <td><?= $data['tgl_pinjam'] ?></td>
                                        <td><?= $data['lama_pinjam'] ?> Hari</td>
                                        <td><?= $data['tgl_harus_kembali'] ?></td>
                                        <td>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ditolak<?= $data['id_pinjam'] ?>">
                                                <i class="fas fa-times"></i> Tolak
                                            </button>
                                            <a href="<?= base_url('Admin/TerimaBuku/' . $data['id_pinjam']) ?>" class="btn btn-success btn-sm">
                                                <i class="fas fa-check"></i> Terima
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Modal Tolak -->
                                    <div class="modal fade" id="ditolak<?= $data['id_pinjam'] ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h4 class="modal-title">Tolak Peminjaman Buku</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <?= form_open(base_url('Admin/TolakBuku/' . $data['id_pinjam'])) ?>
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <textarea name="ket" rows="3" class="form-control" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger">Tolak</button>
                                                </div>
                                                    <?= form_close() ?>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    <?php endforeach; ?>
</div>
