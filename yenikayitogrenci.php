<?php
    include "config.php";
    session_start();
    try {
        
        $query1 = "SELECT * FROM tblgenelbilgiler WHERE ogrno = ?";
        $stmt1 = $conn->prepare($query1);
        $kullaniciadi=$_SESSION["ogrno"];
        $stmt1->bind_param("s", $kullaniciadi);

        $stmt1->execute();
        $result1 = $stmt1->get_result();
        
        if ($result1->num_rows > 0) {
            $row1 = $result1->fetch_assoc();
            // tblgenelbilgiler tablosundan veri okunduğunda yapılacak işlemler
            $txtOgrNo = $_SESSION["ogrno"];
            $txtAd = $row1["ad"];
            $txtSoyad = $row1["soyad"];
            $txtMezunTarih = $row1["mezuntarih"];
            $txtEposta = $row1["eposta"];
            $txtCepTel = $row1["ceptelefonu"];
            $txtEvTel = $row1["evtelefonu"];
            $txtEvUlke = $row1["evulke"];
            $txtEvSehir = $row1["evsehir"];
            $txtEvAdres = $row1["evadres"];
            $txtNot = $row1["notlar"];
        }
    } catch (Exception $ex) {
        echo "Bir hata oluştu: " . $ex->getMessage();
    }

    try {
        $query2 = "SELECT * FROM tblegitimbilgiler WHERE ogrno = ?";
        $stmt2 = $conn->prepare($query2);
        $stmt2->bind_param("s", $kullaniciadi);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        
        if ($result2->num_rows > 0) {
            $row2 = $result2->fetch_assoc();
            // tblegitimbilgiler tablosundan veri okunduğunda yapılacak işlemler
            $txtAkademilEgitim = $row2["akademik_egitim"];
            $txtBaslangic = $row2["baslangic"];
            $txtBitis = $row2["bitis"];
            $txtUlke = $row2["ulke"];
            $txtSehir = $row2["sehir"];
            $txtUniversite = $row2["universite"];
        }
    } catch (\Throwable $th) {
        echo "Bir hata oluştu: " . $ex->getMessage();
    }
    try {
        $query3 = "SELECT * FROM tblisbilgiler WHERE ogrno = ?";
        $stmt3 = $conn->prepare($query3);
        $stmt3->bind_param("s", $kullaniciadi);
        $stmt3->execute();
        $result3 = $stmt3->get_result();
        
        if ($result3->num_rows > 0) {
            $row3 = $result3->fetch_assoc();
            // tblisbilgiler tablosundan veri okunduğunda yapılacak işlemler
            $txtIseGirisTarihi = $row3["isegiristarih"];
            $txtIstenCikisTarihi = $row3["istencikistarih"];
            $txtKamuOzel = $row3["kamuozel"];
            $txtSektor = $row3["sektor"];
            $txtUnvan = $row3["unvan"];
            $txtPozisyon = $row3["pozisyon"];
        }
    } catch (\Throwable $th) {
        echo "Bir hata oluştu: " . $ex->getMessage();
    }   
        
    if (isset($_GET['guncellendi']) && $_GET['guncellendi'] == "true") {
        echo "<script>alert('Bilgiler başarıyla güncellendi.');</script>";
    }
       
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeni Kayıt Öğrenci</title>
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
        <div class="container justify-content-center">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-container" id="form1">
                        <h3 class="text-center mb-3">Genel Bilgiler</h3>
                        <form action="guncelle_genel_bilgi.php" method="post">
                            <div class="form-group">
                                <label for="txtOgrNo">Öğrenci No:</label>
                                <input type="text" class="form-control" id="txtOgrNo" name="txtOgrNo" value="<?php echo  $txtOgrNo; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="txtAd">Ad:</label>
                                <input type="text" class="form-control" id="txtAd" name="txtAd" value="<?php echo  $txtAd; ?>" required>
                            </div>
                            <div class="form-group">
                            <label for="txtSoyad">Soyad:</label>
                                <input type="text" class="form-control" id="txtSoyad" name="txtSoyad" value="<?php echo  $txtSoyad; ?>" required>
                            </div>
                            <div class="form-group">
                            <label for="txtMezunTarih">Mezuniyet Tarihi:</label>
                                <input type="text" class="form-control" id="txtMezunTarih" name="txtMezunTarih" value="<?php echo  $txtMezunTarih; ?>" required>
                            </div>
                            <div class="form-group">
                            <label for="txtEposta">E-posta:</label>
                                <input type="email" class="form-control" id="txtEposta" name="txtEposta" value="<?php echo  $txtEposta; ?>" required>
                            </div>
                            <div class="form-group">
                            <label for="txtCepTel">Cep Telefonu:</label>
                                <input type="text" class="form-control" id="txtCepTel" name="txtCepTel" value="<?php echo  $txtCepTel; ?>" required>
                            </div>
                            <div class="form-group">
                            <label for="txtEvTel">Ev Telefonu:</label>
                                <input type="text" class="form-control" id="txtEvTel" name="txtEvTel" value="<?php echo  $txtEvTel; ?>" required>
                            </div>
                            <div class="form-group">
                            <label for="txtEvUlke">Ev Ülke:</label>
                                <input type="text" class="form-control" id="txtEvUlke" name="txtEvUlke" value="<?php echo  $txtEvUlke; ?>" required>
                            </div>
                            <div class="form-group">
                            <label for="txtEvSehir">Ev Şehir:</label>
                                <input type="text" class="form-control" id="txtEvSehir" name="txtEvSehir" value="<?php echo  $txtEvSehir; ?>" required>
                            </div>
                            <div class="form-group">
                            <label for="txtEvAdres">Ev Adres:</label>
                                <input type="text" class="form-control" id="txtEvAdres" name="txtEvAdres" value="<?php echo  $txtEvAdres; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="txtNot">Notlar:</label>
                                <textarea class="form-control" id="txtNot" name="txtNot" required><?php echo  $txtNot;?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Guncelle</button>
                        </form>
                        </div>
                </div>
            </div>
        </div>
        <div class="container justify-content-center">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-container" id="form2">
                    <h3 class="text-center mb-3">Eğitim Bilgileri</h3>
                    <form action="guncelle_egitim_bilgi.php" method="post">
                        <div class="form-group">
                            <label for="txtAkademilEgitim">Akademik Eğitim:</label>
                            <input type="text" class="form-control" id="txtAkademilEgitim" name="txtAkademilEgitim" value="<?php echo $txtAkademilEgitim; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="txtBaslangic">Başlangıç Tarihi:</label>
                            <input type="text" class="form-control" id="txtBaslangic" name="txtBaslangic" value="<?php echo $txtBaslangic; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="txtBitis">Bitiş Tarihi:</label>
                            <input type="text" class="form-control" id="txtBitis" name="txtBitis" value="<?php echo $txtBitis; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="txtUlke">Ülke:</label>
                            <input type="text" class="form-control" id="txtUlke" name="txtUlke" value="<?php echo $txtUlke; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="txtSehir">Şehir:</label>
                            <input type="text" class="form-control" id="txtSehir" name="txtSehir" value="<?php echo $txtSehir; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="txtUniversite">Üniversite:</label>
                            <input type="text" class="form-control" id="txtUniversite" name="txtUniversite" value="<?php echo $txtUniversite; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guncelle</button>
                    </form>
                    </div>

            </div>
        </div>
        <div class="container justify-content-center">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-container" id="form3">
                    <h3 class="text-center mb-3">İş Bilgileri</h3>
                    <form action="guncelle_is_bilgi.php" method="post">
                        <div class="form-group">
                            <label for="txtIseGirisTarihi">İşe Giriş Tarihi:</label>
                            <input type="text" class="form-control" id="txtIseGirisTarihi" name="txtIseGirisTarihi" value="<?php echo $txtIseGirisTarihi; ?>"required>
                        </div>
                        <div class="form-group">
                            <label for="txtIstenCikisTarihi">İşten Çıkış Tarihi:</label>
                            <input type="text" class="form-control" id="txtIstenCikisTarihi" name="txtIstenCikisTarihi" value="<?php echo $txtIstenCikisTarihi; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="txtKamuOzel">Kamu Özel:</label>
                            <input type="text" class="form-control" id="txtKamuOzel" name="txtKamuOzel" value="<?php echo $txtKamuOzel; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="txtSektor">Sektör:</label>
                            <input type="text" class="form-control" id="txtSektor" name="txtSektor" value="<?php echo $txtSektor; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="txtUnvan">Ünvan:</label>
                            <input type="text" class="form-control" id="txtUnvan" name="txtUnvan" value="<?php echo $txtUnvan; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="txtPozisyon">Pozisyon:</label>
                            <input type="text" class="form-control" id="txtPozisyon" name="txtPozisyon" value="<?php echo $txtPozisyon; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guncelle</button>
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