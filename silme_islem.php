<?php
include "config.php";

session_start();

if(isset($_POST['silme'])) {

    $kisitKaldirSorgu = "SET FOREIGN_KEY_CHECKS=0";
    $conn->query($kisitKaldirSorgu);

    $ogrno = $_POST["silme"]; // Varsayılan olarak post alındı.

    $sorgular = [
        "DELETE FROM tblgenelbilgiler WHERE ogrno = ?",
        "DELETE FROM tblisbilgiler WHERE ogrno = ?",
        "DELETE FROM tblegitimbilgiler WHERE ogrno = ?"
    ];

    foreach ($sorgular as $sorgu) {
        $stmt = $conn->prepare($sorgu);
        $stmt->bind_param("s", $ogrno);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: index.php");

    } 
    else {
        echo "Kayıt Bulunamadı";
    }

?>
