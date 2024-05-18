<?php
    include "config.php";
    session_start();

    /*if (isset($_GET['eklendi']) && $_GET['eklendi'] == "true") {
        echo "<script>alert('Bilgiler başarıyla Eklendi.');</script>";
    }*/
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeni Kayıt</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
       
  .form-container {
            display: none; /* Tüm formları başlangıçta gizle */
            margin-top: 20px;
        }
</style>
</head>
<body>
    <?php
    include "navbar.php";
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <button class="btn btn-primary mr-2" onclick="showForm('form1')">Genel Bilgiler</button>
                <button class="btn btn-primary mr-2" onclick="showForm('form2')">Eğitim Bilgileri</button>
                <button class="btn btn-primary" onclick="showForm('form3')">İş Bilgileri</button>
            </div>
        </div>
        <div class="container justify-content-center"> <!-- Formlar ortalı olacak -->
            <div class="row justify-content-center"> <!-- Formlar ortalı olacak -->
                <div class="col-md-6">
                    <div class="form-container" id="form1">
                        <h3 class="text-center mb-3">Genel Bilgiler</h3>
                        <form action="ekle_genel_bilgi.php" method="post">
                            <div class="form-group">
                                <label for="txtOgrNo">Öğrenci No:</label>
                                <input type="text" class="form-control" id="txtOgrNo" name="txtOgrNo" required>
                            </div>
                            <div class="form-group">
                                <label for="txtAd">Ad:</label>
                                <input type="text" class="form-control" id="txtAd" name="txtAd" required>
                            </div>
                            <div class="form-group">
                            <label for="txtSoyad">Soyad:</label>
                                <input type="text" class="form-control" id="txtSoyad" name="txtSoyad" required>
                            </div>
                            <div class="form-group">
                            <label for="txtMezunTarih">Mezuniyet Tarihi:</label>
                                <input type="text" class="form-control" id="txtMezunTarih" name="txtMezunTarih" required>
                            </div>
                            <div class="form-group">
                            <label for="txtEposta">E-posta:</label>
                                <input type="email" class="form-control" id="txtEposta" name="txtEposta" required>
                            </div>
                            <div class="form-group">
                            <label for="txtCepTel">Cep Telefonu:</label>
                                <input type="text" class="form-control" id="txtCepTel" name="txtCepTel" required>
                            </div>
                            <div class="form-group">
                            <label for="txtEvTel">Ev Telefonu:</label>
                                <input type="text" class="form-control" id="txtEvTel" name="txtEvTel" required>
                            </div>
                            <div class="form-group">
                            <label for="txtEvUlke">Ev Ülke:</label>
                                <input type="text" class="form-control" id="txtEvUlke" name="txtEvUlke" required>
                            </div>
                            <div class="form-group">
                            <label for="txtEvSehir">Ev Şehir:</label>
                                <input type="text" class="form-control" id="txtEvSehir" name="txtEvSehir" required>
                            </div>
                            <div class="form-group">
                            <label for="txtEvAdres">Ev Adres:</label>
                                <input type="text" class="form-control" id="txtEvAdres" name="txtEvAdres" required>
                            </div>
                            <div class="form-group">
                                <label for="txtNot">Notlar:</label>
                                <textarea class="form-control" id="txtNot" name="txtNot" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Ekle</button>
                        </form>
                        </div>
                </div>
            </div>
        </div>
        <div class="container justify-content-center"> <!-- Formlar ortalı olacak -->
            <div class="row justify-content-center"> <!-- Formlar ortalı olacak -->
                <div class="col-md-6">
                    <div class="form-container" id="form2">
                    <h3 class="text-center mb-3">Eğitim Bilgileri</h3>
                    <form action="ekle_egitim_bilgi.php" method="post">
                        <div class="form-group">
                            <label for="txtAkademilEgitim">Akademik Eğitim:</label>
                            <input type="text" class="form-control" id="txtAkademilEgitim" name="txtAkademilEgitim" required>
                        </div>
                        <div class="form-group">
                            <label for="txtBaslangic">Başlangıç Tarihi:</label>
                            <input type="text" class="form-control" id="txtBaslangic" name="txtBaslangic" required>
                        </div>
                        <div class="form-group">
                            <label for="txtBitis">Bitiş Tarihi:</label>
                            <input type="text" class="form-control" id="txtBitis" name="txtBitis" required>
                        </div>
                        <div class="form-group">
                            <label for="txtUlke">Ülke:</label>
                            <input type="text" class="form-control" id="txtUlke" name="txtUlke" required>
                        </div>
                        <div class="form-group">
                            <label for="txtSehir">Şehir:</label>
                            <input type="text" class="form-control" id="txtSehir" name="txtSehir" required>
                        </div>
                        <div class="form-group">
                            <label for="txtUniversite">Üniversite:</label>
                            <input type="text" class="form-control" id="txtUniversite" name="txtUniversite" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Ekle</button>
                    </form>
                    </div>

            </div>
        </div>
        <div class="container justify-content-center"> <!-- Formlar ortalı olacak -->
            <div class="row justify-content-center"> <!-- Formlar ortalı olacak -->
                <div class="col-md-6">
                    <div class="form-container" id="form3">
                    <h3 class="text-center mb-3">İş Bilgileri</h3>
                    <form action="ekle_is_bilgi.php" method="post">
                        <div class="form-group">
                            <label for="txtIseGirisTarihi">İşe Giriş Tarihi:</label>
                            <input type="text" class="form-control" id="txtIseGirisTarihi" name="txtIseGirisTarihi" required>
                        </div>
                        <div class="form-group">
                            <label for="txtIstenCikisTarihi">İşten Çıkış Tarihi:</label>
                            <input type="text" class="form-control" id="txtIstenCikisTarihi" name="txtIstenCikisTarihi" required>
                        </div>
                        <div class="form-group">
                            <label for="txtKamuOzel">Kamu Özel:</label>
                            <input type="text" class="form-control" id="txtKamuOzel" name="txtKamuOzel" required>
                        </div>
                        <div class="form-group">
                            <label for="txtSektor">Sektör:</label>
                            <input type="text" class="form-control" id="txtSektor" name="txtSektor" required>
                        </div>
                        <div class="form-group">
                            <label for="txtUnvan">Ünvan:</label>
                            <input type="text" class="form-control" id="txtUnvan" name="txtUnvan" required>
                        </div>
                        <div class="form-group">
                            <label for="txtPozisyon">Pozisyon:</label>
                            <input type="text" class="form-control" id="txtPozisyon" name="txtPozisyon" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Ekle</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        
                window.onload = function() {
            // Form1'i göster
            document.getElementById("form1").style.display = "block";
        };
        function showForm(formName) {
            // Tüm formları gizle
            var forms = document.getElementsByClassName("form-container");
            for (var i = 0; i < forms.length; i++) {
                forms[i].style.display = "none";
            }
            // İlgili formu göster
            document.getElementById(formName).style.display = "block";
        }
    </script>
</body>
</html>