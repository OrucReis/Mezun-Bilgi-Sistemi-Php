<?php
include "config.php"; // Veritabanı bağlantısı ve gerekli diğer işlemler

// Doktora yapan öğrencilerin bilgilerini veritabanından çek
$sql = "SELECT * FROM tblegitimbilgiler WHERE not ulke=? AND akademik_egitim=? ORDER BY ogrno";
$stmt = $conn->prepare($sql);
$egitim_tipi = 'yukseklisans';
$ulke='turkiye';
$stmt->bind_param('ss',$ulke,$egitim_tipi);
$stmt->execute();
$result = $stmt->get_result();

// Tablo içeriğini oluştur

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["ogrno"]."</td>";
        echo "<td>".$row["akademik_egitim"]."</td>";
        echo "<td>".$row["baslangic"]."</td>";
        echo "<td>".$row["bitis"]."</td>";
        echo "<td>".$row["ulke"]."</td>";
        echo "<td>".$row["sehir"]."</td>";
        echo "<td>".$row["universite"]."</td>";
        echo "</tr>";
    }
} else {
    // Eğer veri yoksa, tabloda 'Sonuç bulunamadı' mesajını göster
    echo "<tr><td colspan='7'>Sonuç bulunamadı</td></tr>";
}


// Veritabanı bağlantısını kapat
$conn->close();
?>
