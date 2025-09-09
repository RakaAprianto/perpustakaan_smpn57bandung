<div class="col-md-12">
    <div class="card-body">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <?php foreach ($slider as $key => $value) { ?>

                    <div class="carousel-item <?= $value['id_slider'] == 1 ? 'active' : '' ?>">
                        <img class="d-block w-100" src="<?= base_url('slider/' . $value['slider']) ?>" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                        <style>
        body {
            font-family: 'Poppins', sans-serif; /* Font modern dan elegan */
            text-align: center;
            background-color: #f4f4f4; /* Warna background agar lebih nyaman dibaca */
        }
        h5 {
            color: white;
            font-weight: bold;
            font-size: 24px; /* Ukuran lebih besar agar lebih jelas */
        }
        p {
            color: white;
            font-weight: bold;
            font-size: 20px;
        }
    </style>
    <!-- Link Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
</head>
<body>

    <h5>Selamat Datang Diwebsite</h5>
    <p>Perpustakaan SMPN 57 Bandung</p>
                        </div>
                    </div>

                <?php } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h5> <span class="right badge badge-success">Buku Baru</span> </h5>
        </div>

        <div class="card-body">
            <div class="row">
                <?php foreach ($buku as $key => $value) { ?>
                    <div class="col-sm-2">
                        <div class="text-center">
                            <div class="card-body box-profile">
                                <img src="<?= base_url('cover/' . $value['cover']) ?>" width="150px" height="150px">
                            </div>
                            <a href="<?= base_url('Home/DetailBuku/' . $value['id_buku']) ?>" class="text-center">
                                <?= $value['judul_buku'] ?>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>
</div>

<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h5> <span class="right badge badge-success">E-Book Baru</span> </h5>
        </div>

        <div class="card-body">
            <div class="row">
                <?php foreach ($ebook as $key => $value) { ?>
                    <div class="col-sm-2">
                        <div class="text-center">
                            <div class="card-body box-profile">
                                <img src="<?= base_url('cover/' . $value['cover']) ?>" width="150px" height="150px">
                            </div>
                            <a href="<?= base_url('Home/DetailEbook/' . $value['id_ebook']) ?>" class="text-center">
                                <?= $value['judul_ebook'] ?>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>
</div>