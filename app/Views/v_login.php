<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Perpustakaan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: url('https://source.unsplash.com/1600x900/?library,books') no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .container {
            text-align: center;
            backdrop-filter: blur(5px);
            padding: 30px;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            color: black;
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .login-box {
            width: 100%;
            margin: 15px 0;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            color: white;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .login-box:hover {
            transform: scale(1.05);
        }

        .admin {
            background: linear-gradient(135deg, #16a085, #2ecc71);
        }

        .anggota {
            background: linear-gradient(135deg, #2980b9, #6dd5fa);
        }

        .login-box i {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .login-box a {
            display: inline-block;
            color: white;
            text-decoration: none;
            font-weight: bold;
            margin-top: 10px;
            padding: 10px 20px;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.3);
            transition: background 0.3s;
        }

        .login-box a:hover {
            background: rgba(255, 255, 255, 0.6);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Perpustakaan SMPN 57 Bandung</h1>
        <div class="login-box admin" onclick="window.location.href='<?= base_url('Auth/LoginUser') ?>'">
            <i class="fas fa-user"></i>
            <h3>Admin</h3>
            <p>Login Untuk Admin</p>
            <a href="<?= base_url('Auth/LoginUser') ?>">Login <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        <div class="login-box anggota" onclick="window.location.href='<?= base_url('Auth/LoginAnggota') ?>'">
            <i class="fas fa-users"></i>
            <h3>Anggota</h3>
            <p>Login Untuk Anggota</p>
            <a href="<?= base_url('Auth/LoginAnggota') ?>">Login <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</body>
</html>
