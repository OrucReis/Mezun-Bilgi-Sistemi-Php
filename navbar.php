<?php
include "config.php";
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
            <img src="./img/baskent_logo.png" width="60" height="60" class="mt-1" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <?php if ($_SESSION['pozisyon'] == 'sekreter'): ?>
                    <li class="nav-item"><a class="nav-link" href="yenikayit.php">Yeni Kayıt</a></li>
                    <li class="nav-item"><a class="nav-link" href="raporlar.php">Diğer Raporlar</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="yenikayitogrenci.php">Kaydımı Getir</a></li>
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><span class="nav-link"><?php echo $_SESSION['ad']; ?></span></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">çık</a></li>
            </ul>
        </div>
    </nav>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
