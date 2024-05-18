<?php
    include "config.php";
    session_start();
    
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raporlar</title>
    <style>
    .bodd {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 70vh;
        margin: 0;
    }
    .buttons-container {
        display: flex;
        flex-direction: column;

    }
    .button {
        padding: 10px 20px;
        margin: 5px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .button:hover {
        background-color: #0056b3;
    }
    .table-container {
        width: 70%;
        overflow: auto;
        margin-right: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
</style>
</head>
<body>
    <?php
        include "navbar.php";
    ?>
    <div class="bodd">
        <div class="buttons-container">
            <button class="button" id="doktora"  onclick="doktora()">Doktora Yapan Öğrencileri Listele</button>
            <button class="button" id="turkiye_doktara"  onclick="turkiye_doktara()">Türkiye'de Doktora Yapan Öğrencileri Listele</button>
            <button class="button" id="yurt_disi_doktora"  onclick="yurt_disi_doktora()">Yurtdışında Doktora Yapan Öğrencileri Listele</button>
            <button class="button" id="yukseklisans"  onclick="yukseklisans()">Yüksek Lisans Yapan Öğrencileri Listele</button>
            <button class="button" id="yukseklisans_turkiye"  onclick="yukseklisans_turkiye()">Türkiye'de Yüksek Lisans Yapan Öğrencileri Listele</button>
            <button class="button" id="yukseklisans_yurt_disi" onclick="yukseklisans_yurt_disi()">Yurt Dışında Yüksek Lisans Yapan Öğrencileri Listele</button>
            <hr>

        </div>
        <div class="table-container">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">OgrNo</th>
                    <th scope="col">Akademik Eğitim</th>
                    <th scope="col">Baslangıç</th>
                    <th scope="col">Bitiş</th>
                    <th scope="col">Ülke</th>
                    <th scope="col">Sehir</th>
                    <th scope="col">Universite</th>
                </tr>
            </thead>
            <!--burda-->
            <tbody id="table-body">
                <tr>
                    <td colspan="7">Veriler yükleniyor...</td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
    <script>
    function doktora() {
        // AJAX kullanarak doktora verilerini al
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.querySelector("tbody").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "doktora.php", true); // Doktora verilerini içeren PHP dosyasının adı
        xhttp.send();
    }
    function turkiye_doktara() {
        // AJAX kullanarak doktora verilerini al
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.querySelector("tbody").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "turkiye_doktora.php", true); // Doktora verilerini içeren PHP dosyasının adı
        xhttp.send();
    }
    function yurt_disi_doktora() {
        // AJAX kullanarak doktora verilerini al
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.querySelector("tbody").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "yurtdisi_doktora.php", true); // Doktora verilerini içeren PHP dosyasının adı
        xhttp.send();
    }
    function yukseklisans() {
        // AJAX kullanarak doktora verilerini al
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.querySelector("tbody").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "yukseklisans.php", true); // Doktora verilerini içeren PHP dosyasının adı
        xhttp.send();
    }
    function yukseklisans_turkiye() {
        // AJAX kullanarak doktora verilerini al
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.querySelector("tbody").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "yukseklisans_turkiye.php", true); // Doktora verilerini içeren PHP dosyasının adı
        xhttp.send();
    }
    function yukseklisans_yurt_disi() {
        // AJAX kullanarak doktora verilerini al
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.querySelector("tbody").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "yukseklisans_yurtdisi.php", true); // Doktora verilerini içeren PHP dosyasının adı
        xhttp.send();
    }


    // Diğer işlevler için aynı yapıyı kullanabilirsiniz, sadece dosya adlarını değiştirin.
</script>
    
</body>
</html>