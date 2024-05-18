<?php
include "config.php";
session_start();

if(isset($_POST['girisyap'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sorgu1 = "SELECT * FROM tblgenelbilgiler WHERE ogrno = ? AND sifre = ?";
    $sorgu2 = "SELECT * FROM kullanicilar WHERE id = ? AND sifre = ? AND pozisyon = 'sekreter'";

    $stmt1 = $conn->prepare($sorgu1);
    $stmt2 = $conn->prepare($sorgu2);

    $stmt1->bind_param("ss", $username, $password);
    $stmt2->bind_param("ss", $username, $password);

    $stmt1->execute();
    $result1 = $stmt1->get_result();

    if ($result1->num_rows > 0) {
        $cikti = $result1->fetch_array();
        $_SESSION['ogrno']=$cikti[0];
        $_SESSION['ad'] = $cikti[1]; 
        $_SESSION['mezuntarih'] = $cikti[4];
        $_SESSION['pozisyon']='ogrenci';
        header("Location: index.php");
        exit();
    } else {
        $stmt1->close(); // İlk sorgunun sonuç setini kapatalım.

        $stmt2->execute();
        $result2 = $stmt2->get_result();

        if ($result2->num_rows > 0) {
            $cikti = $result2->fetch_array();
            $_SESSION['ad'] = $cikti[0];
            $_SESSION['pozisyon']=$cikti[2];
            header("Location: index.php");
            exit();
        } 
        else {
            echo "Geçersiz kullanıcı adı veya şifre.";
        }

        $stmt2->close();
    }

    $conn->close();
}
?>
