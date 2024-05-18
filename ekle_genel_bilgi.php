<?php
    session_start();
    include "config.php";


    // SQL hazırlama
    $sql = "INSERT INTO tblgenelbilgiler (ogrno, ad, soyad, mezuntarih, eposta, ceptelefonu, evtelefonu, evulke, evsehir, evadres, notlar) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Sorguyu hazırlama
    $stmt = $conn->prepare($sql);
    
    // Parametreleri bağlama
    $stmt->bind_param("sssssssssss", $ogrno, $ad, $soyad, $mezuntarih, $eposta, $ceptelefonu, $evtelefonu, $evulke, $evsehir, $evadres, $notlar);
    
    // Değişkenleri tanımlama
    $ogrno = $_POST['txtOgrNo'];
    $ad = $_POST['txtAd'];
    $soyad = $_POST['txtSoyad'];
    $mezuntarih = $_POST['txtMezunTarih'];
    $eposta = $_POST['txtEposta'];
    $ceptelefonu = $_POST['txtCepTel'];
    $evtelefonu = $_POST['txtEvTel'];
    $evulke = $_POST['txtEvUlke'];
    $evsehir = $_POST['txtEvSehir'];
    $evadres = $_POST['txtEvAdres'];
    $notlar = $_POST['txtNot'];

    $_SESSION['ogrno'] = $ogrno;
    $_SESSION['mezuntarih'] = $mezuntarih;
    
    // Sorguyu çalıştırma
    if ($stmt->execute()) {
        echo "Yeni kayıt oluşturuldu.";
        header("Location: yenikayit.php?eklendi=true");
    } else {
        echo "Hata: " . $conn->error;
    }
    
    // Bağlantıyı kapatma
    $stmt->close();
    $conn->close();
?>