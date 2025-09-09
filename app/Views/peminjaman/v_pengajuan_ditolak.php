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
    foreach ($pengajuanditolak as $value) : 
        $buku = $db->table('tbl_peminjaman')
            ->join('tbl_buku', 'tbl_buku.id_buku = tbl_peminjaman.id_buku', 'left')
            ->where('id_anggota', $value['id_anggota'])
            ->where('status_pinjam', 'Ditolak')
            ->get()->getResultArray();
    ?>

        <div class="col-12">
            <div class="card card-widget widget-user-2">
                <div class="widget-user-header bg-danger">
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
                                            <img src="<?= base_url('cover/' . $data['cover']) ?>" class="img-fluid" style="max-width: 125px; height: 125px;">
                                        </td>
                                        <td><?= $data['judul_buku'] ?></td>
                                        <td><?= $data['tgl_pinjam'] ?></td>
                                        <td><?= $data['lama_pinjam'] ?> Hari</td>
                                        <td><?= $data['tgl_harus_kembali'] ?></td>
                                        <td>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal<?= $data['id_pinjam'] ?>">
                                                <i class="fas fa-times"></i> Hapus
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    <?php endforeach; ?>
</div>

<!-- Modal Hapus -->
<?php foreach ($pengajuanditolak as $value) : ?>
    <?php 
    $buku = $db->table('tbl_peminjaman')
        ->join('tbl_buku', 'tbl_buku.id_buku = tbl_peminjaman.id_buku', 'left')
        ->where('id_anggota', $value['id_anggota'])
        ->where('status_pinjam', 'Ditolak')
        ->get()->getResultArray();
    ?>

    <?php foreach ($buku as $data) : ?>
        <div class="modal fade" id="hapusModal<?= $data['id_pinjam'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= form_open(base_url('Peminjaman/DeleteData/' . $data['id_pinjam'])) ?>
                        <p>Apakah Anda yakin ingin menghapus data <b><?= $data['judul_buku'] ?></b>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endforeach; ?>
