<?php
include "config.php";
session_start();

// Oturum açık mı kontrol et
if(isset($_SESSION['ad'])) {
    // Oturum açıksa sinema sayfasına yönlendir
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Stil eklemek için gerekiyorsa buraya ekleyebilirsiniz */
    </style>
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Giriş Yap</h2>
                    </div>
                    <div class="card-body">
                        <form action="login_islem.php" method="post">
                            <div class="form-group">
                                <label for="username">Kullanıcı Adı:</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Öğrenciyseniz Öğrenci numaranızla giriş yapın" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Şifre:</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Şifre Giriniz" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="girisyap">Giriş Yap</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
