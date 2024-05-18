<?php
include "config.php"; // config.php dosyasını dahil et
session_start();
// Oturum açıksa sinema sayfasına yönlendir
if(!isset($_SESSION['ad'])) {
    header("Location: login.php");  
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anasayfa</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Optional CSS to style the table */
        table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }
        th, td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
        th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
        }
        tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }
        tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }
    </style>
</head>
<body>
<?php include "navbar.php"; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">OgrNo</th>
                            <th scope="col">Ad</th>
                            <th scope="col">Soyad</th>
                            <th scope="col">Mezun Tarih</th>
                            <th scope="col">E-Posta</th>
                            <th scope="col">Cep Telefonu</th>
                            <th scope="col">Ev Telefonu</th>
                            <th scope="col">Ev Ulke</th>
                            <th scope="col">Ev Sehir</th>
                            <th scope="col">Ev Adres</th>
                            <th scope="col">Notlar</th>
                            <?php if ($_SESSION['pozisyon'] == 'sekreter'): ?>
                                <th scope="col">Sil</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM tblgenelbilgiler ORDER BY ogrno";
                        $sonuclar = $conn->query($sql);
                        if ($sonuclar->num_rows > 0) {
                            while($satir = $sonuclar->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>".$satir["ogrno"]."</td>";
                                echo "<td>".$satir["ad"]."</td>";
                                echo "<td>".$satir["soyad"]."</td>";
                                echo "<td>".$satir["mezuntarih"]."</td>";
                                echo "<td>".$satir["eposta"]."</td>";
                                echo "<td>".$satir["ceptelefonu"]."</td>";
                                echo "<td>".$satir["evtelefonu"]."</td>";
                                echo "<td>".$satir["evulke"]."</td>";
                                echo "<td>".$satir["evsehir"]."</td>";
                                echo "<td>".$satir["evadres"]."</td>";
                                echo "<td>".$satir["notlar"]."</td>";
                                if ($_SESSION['pozisyon'] == 'sekreter') {
                                    echo "<td>
                                    <form id='silForm_".$satir["ogrno"]."' action='silme_islem.php' method='post'>
                                    <button type='button' class='btn btn-danger btn-sm' onclick=\"onaylaSil('".$satir['ogrno']."')\">Sil</button>
                                    <input type='hidden' name='silme' value='".$satir['ogrno']."'>
                                    </form>
                                    </td>";
                                }
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='11'>Sonuç bulunamadı</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS ve jQuery -->
<script>
    function onaylaSil(ogrno) {
        if (confirm("Bu öğrenciyi silmek istediğinizden emin misiniz?")) {
            // Kullanıcı onayladıysa formu gönder
            document.getElementById("silForm_" + ogrno).submit();
        } else {
            // Kullanıcı onaylamadıysa bir şey yapma
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
