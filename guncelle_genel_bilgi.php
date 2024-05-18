<?php
    include "config.php";
    session_start();
    $komut = $conn->prepare("UPDATE `tblgenelbilgiler` SET `ad` = ?, `soyad` = ?, `mezuntarih` = ?, `eposta` = ?, `ceptelefonu` = ?, `evtelefonu` = ?, `evulke` = ?, `evsehir` = ?, `evadres` = ?, `notlar` = ? WHERE `tblgenelbilgiler`.`ogrno` = ?");

    // Parametreleri bağlama
    $komut->bind_param("ssssssssssi", $ad, $soyad, $mezuntarih, $eposta, $ceptel, $evtell, $evulke, $evsehir, $evadres, $notlar, $ogrno);
    
    // Değişkenlerin değerlerini ata
    $ad = $_POST["txtAd"];
    $soyad = $_POST["txtSoyad"];
    $mezuntarih = $_POST["txtMezunTarih"];
    $eposta = $_POST["txtEposta"];
    $ceptel = $_POST["txtCepTel"];
    $evtell = $_POST["txtEvTel"];
    $evulke = $_POST["txtEvUlke"];
    $evsehir = $_POST["txtEvSehir"];
    $evadres = $_POST["txtEvAdres"];
    $notlar = $_POST["txtNot"];
    $ogrno = $_SESSION["ogrno"];
    
    // Sorguyu çalıştır
    $satir = $komut->execute();
    
    if ($satir === false) {
        echo "Hata: " . $conn->error;
    } else {
        echo "satır değiştirildi";
        header("Location: yenikayitogrenci.php?guncellendi=true");
    }
    
    // Bağlantıyı kapat
    $conn->close();
?>