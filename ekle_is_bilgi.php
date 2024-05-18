<?php
    include "config.php";
    session_start();

    $sql =("INSERT INTO tblisbilgiler (isegiristarih, istencikistarih, kamuozel, sektor, unvan, pozisyon, ogrno, mezuntarih) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssssssss", $pisegiris, $pistencikis, $pkamuozel, $psektor, $punvan, $ppozisyon, $pogrno, $pmezun);

    $pisegiris = $_POST['txtIseGirisTarihi'];
    $pistencikis = $_POST['txtIstenCikisTarihi'];
    $pkamuozel = $_POST['txtKamuOzel'];
    $psektor = $_POST['txtSektor'];
    $punvan = $_POST['txtUnvan'];
    $ppozisyon = $_POST['txtPozisyon'];

    $pogrno = $_SESSION['ogrno'];
    $pmezun = $_SESSION['mezuntarih'];


    if ($stmt->execute()) {
        echo "Yeni kayıt oluşturuldu.";
        header("Location: yenikayit.php?eklendi=true");
    } else {
        echo "Hata: " . $conn->error;
    }
    $stmt->close();
    $conn->close();

?>