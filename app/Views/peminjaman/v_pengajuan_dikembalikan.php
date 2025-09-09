<div class="col-12">
    <div class="card">
        <div class="card-header bg-danger">
            <h3 class="card-title text-white">Riwayat Peminjaman Semua Anggota</h3>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <h4>Semua Data Peminjaman</h4>
                <div>
                    <button id="btn-print" class="btn btn-primary btn-sm">🖨 Print</button>
                    <button id="btn-excel" class="btn btn-success btn-sm">📊 Export Excel</button>
                    <button id="btn-csv" class="btn btn-warning btn-sm">📄 Export CSV</button>
                    <button id="btn-pdf" class="btn btn-danger btn-sm">📑 Export PDF</button>
                </div>
            </div>
            <div class="table-responsive">
                <table id="tablehistory" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Cover</th>
                            <th class="text-center">Judul Buku</th>
                            <th class="text-center">Tanggal Pinjam</th>
                            <th class="text-center">Lama Pinjam</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $db = \Config\Database::connect();
                        $no = 1;
                        foreach ($pengajuandikembalikan as $key => $value) {
                            $buku = $db->table('tbl_peminjaman')
                                ->join('tbl_buku', 'tbl_buku.id_buku = tbl_peminjaman.id_buku', 'left')
                                ->where('id_anggota', $value['id_anggota'])
                                ->where('status_pinjam', 'Dikembalikan')
                                ->get()->getResultArray();

                            foreach ($buku as $data) { ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-center"><?= $value['nama_siswa'] ?></td>
                                    <td class="text-center"><?= $value['nama_kelas'] ?></td>
                                    <td class="text-center">
                                        <img src="<?= base_url('cover/' . $data['cover']) ?>" class="img-fluid" style="max-width: 80px;">
                                    </td>
                                    <td class="text-center"><?= $data['judul_buku'] ?></td>
                                    <td class="text-center"><?= $data['tgl_pinjam'] ?></td>
                                    <td class="text-center"><?= $data['lama_pinjam'] ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $data['id_pinjam'] ?>">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="hapus<?= $data['id_pinjam'] ?>" tabindex="-1" aria-labelledby="hapusLabel<?= $data['id_pinjam'] ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <p>Apakah Anda yakin ingin menghapus data <b><?= $data['judul_buku'] ?></b>?</p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <a href="<?= base_url('Peminjaman/DeleteData/' . $data['id_pinjam']) ?>" class="btn btn-danger">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php }
                        } ?>
                    </tbody>
                </table>
            </div>  
        </div>
    </div>
</div>

<!-- DataTables & Buttons -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script>
$(document).ready(function() {
    var table = $('#tablehistory').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                text: '🖨 Print',
                className: 'btn btn-primary btn-sm',
                title: 'Riwayat Peminjaman Semua Anggota',
                exportOptions: { columns: ':visible' }
            },
            {
                extend: 'excelHtml5',
                text: '📊 Export Excel',
                className: 'btn btn-success btn-sm',
                title: 'Riwayat Peminjaman Semua Anggota',
                exportOptions: { columns: ':visible' }
            },
            {
                extend: 'csvHtml5',
                text: '📄 Export CSV',
                className: 'btn btn-warning btn-sm',
                title: 'Riwayat Peminjaman Semua Anggota',
                exportOptions: { columns: ':visible' }
            },
            {
                extend: 'pdfHtml5',
                text: '📑 Export PDF',
                className: 'btn btn-danger btn-sm',
                title: 'Riwayat Peminjaman Semua Anggota',
                exportOptions: { columns: ':visible' }
            }
        ]
    });

    $('#btn-print').on('click', function() { table.button(0).trigger(); });
    $('#btn-excel').on('click', function() { table.button(1).trigger(); });
    $('#btn-csv').on('click', function() { table.button(2).trigger(); });
    $('#btn-pdf').on('click', function() { table.button(3).trigger(); });
});
</script>
