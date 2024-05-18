<?php

include "config.php";
session_start();

$pakademikegitim = $_POST["txtAkademilEgitim"];
$baslangic = $_POST["txtBaslangic"];
$pbitis = $_POST["txtBitis"];
$pulke = $_POST["txtUlke"];
$psehir = $_POST["txtSehir"];
$puniversite = $_POST["txtUniversite"];
$pogrno = $_SESSION["ogrno"];

$komut = $conn->prepare("UPDATE tblegitimbilgiler SET akademik_egitim = ?, baslangic = ?, bitis = ?, ulke = ?, sehir = ?, universite = ? WHERE ogrno = ?");
$komut->bind_param("ssssssi", $pakademikegitim, $baslangic, $pbitis, $pulke, $psehir, $puniversite, $pogrno);

$komut->execute();
$satir = $komut->affected_rows;

$komut->close();
$conn->close();

if ($satir > 0) {
    header("Location: yenikayitogrenci.php?guncellendi=true");
} else {
    echo "Hata: Güncellenemedi";
}

?>
