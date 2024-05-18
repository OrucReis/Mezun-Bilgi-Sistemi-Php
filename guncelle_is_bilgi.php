<?php
    include "config.php";
    session_start();

    $komut = $conn->prepare("UPDATE `tblisbilgiler` SET `isegiristarih` = ?, `istencikistarih` = ?, `kamuozel` = ?," .
        " `sektor` = ?, `unvan` = ?, `pozisyon` = ?, `ogrno` = ?, `mezuntarih` = ? WHERE `tblisbilgiler`.`ogrno` = ?");

    $komut->bind_param("ssssssssi", $pisegiris, $pistencikis, $pkamuozel, $psektor, $punvan, $ppozisyon, $pogrno, $pmezun, $pogrno);

    $pisegiris = $_POST["txtIseGirisTarihi"];
    $pistencikis = $_POST["txtIstenCikisTarihi"];
    $pkamuozel = $_POST["txtKamuOzel"];
    $psektor = $_POST["txtSektor"];
    $punvan = $_POST["txtUnvan"];
    $ppozisyon = $_POST["txtPozisyon"];
    $pogrno = $_SESSION["ogrno"];
    $pmezun = $_SESSION['mezuntarih'];

    $komut->execute();

    $satir = $komut->affected_rows;
    if ($satir > 0) {
        header("Location: yenikayitogrenci.php?guncellendi=true");
    } else {
        echo "Hata: Güncellenemedi";
    }

    $komut->close();
    $conn->close();
?>
