<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Perpustakaan | <?= $judul ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('adminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('adminLTE') ?>/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('adminLTE') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('adminLTE') ?>/dist/css/adminlte.min.css">

    <style>
        @media (max-width: 576px) {
            .brand-text {
                font-size: 14px !important;
                display: block;
                text-align: center;
                width: 100%;
            }
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-block">
    <a href="<?= base_url() ?>" class="nav-link">Website Perpustakaan</a>
</li>

            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Auth/LogOutAnggota') ?>">
                        <i class="fas fa-sign-out-alt"></i> Log-Out
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="<?= base_url('DashboardAnggota') ?>" class="brand-link text-center">
                <img src="<?= base_url('adminLTE') ?>/dist/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light d-block">Anggota Perpustakaan</span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('foto/' . $anggota['foto']) ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $anggota['nama_siswa'] ?></a>
                        <?php if ($anggota['verifikasi'] == 1): ?>
                            <a class="text-success"><i class="fas fa-check-circle"></i> Terverifikasi</a>
                        <?php else: ?>
                            <a class="text-danger"><i class="fas fa-times-circle"></i> Belum Verifikasi</a>
                        <?php endif; ?>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?= base_url('DashboardAnggota') ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item <?= $menu == 'peminjaman' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $menu == 'peminjaman' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-swatchbook"></i>
                                <p>Peminjaman <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Peminjaman/Pengajuan') ?>" class="nav-link <?= $submenu == 'pengajuan' ? 'active' : '' ?>">
                                        <i class="fas fa-circle nav-icon"></i>
                                        <p>Pengajuan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Peminjaman/PengajuanDiterima') ?>" class="nav-link <?= $submenu == 'diterima' ? 'active' : '' ?>">
                                        <i class="fas fa-circle nav-icon"></i>
                                        <p>Diterima</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Peminjaman/PengajuanDitolak') ?>" class="nav-link <?= $submenu == 'ditolak' ? 'active' : '' ?>">
                                        <i class="fas fa-circle nav-icon"></i>
                                        <p>Ditolak</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $judul ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <?= ($page) ? view($page) : '' ?>
                    </div>
                </div>
            </div>
        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">Anything you want</div>
            <strong>Copyright &copy; 2025 <a href="https://adminlte.io">SMPN 57 Bandung</a>.</strong> All rights reserved.
        </footer>
    </div>

    <script src="<?= base_url('adminLTE') ?>/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url('adminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('adminLTE') ?>/plugins/select2/js/select2.full.min.js"></script>
    <script src="<?= base_url('adminLTE') ?>/dist/js/adminlte.min.js"></script>

    <script>
        function bacaGambar(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#gambar_load').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#preview_gambar').change(function () {
            bacaGambar(this);
        });

        $('.select2').select2();
        $('.select2bs4').select2({ theme: 'bootstrap4' });
    </script>
</body>

</html>
