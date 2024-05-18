<?php
    include "config.php";
    session_start();

    $sql = ("INSERT INTO `tblegitimbilgiler` (`akademik_egitim`, `baslangic`, `bitis`, `ulke`, `sehir`, `universite`, `ogrno`) VALUES (?, ?, ?, ?, ?, ?, ?)");

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sssssss", $akademik_egitim, $baslangic, $bitis, $ulke, $sehir, $universite, $ogrno);

    $akademik_egitim = $_POST['txtAkademilEgitim'];
    $baslangic = $_POST['txtBaslangic'];
    $bitis = $_POST['txtBitis'];
    $ulke = $_POST['txtUlke'];
    $sehir = $_POST['txtSehir'];
    $universite = $_POST['txtUniversite'];
    
    $ogrno = $_SESSION['ogrno'];

   

    if ($stmt->execute()) {
        echo "Yeni kayıt oluşturuldu.";
        header("Location: yenikayit.php?eklendi=true");
    } else {
        echo "Hata: " . $conn->error;
    }
    $stmt->close();
    $conn->close();

?>