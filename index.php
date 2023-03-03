<?php
// namaz vakitlerini çek
$html = file_get_contents("https://namazvakitleri.diyanet.gov.tr/tr-TR/9541/istanbul-icin-namaz-vakti");

// verileri parse et
preg_match("/<th>Fajr<\/th>[\s\S]+?<td>(.+?)<\/td>/", $html, $fajr);
preg_match("/<th>Sunrise<\/th>[\s\S]+?<td>(.+?)<\/td>/", $html, $sunrise);
preg_match("/<th>Dhuhr<\/th>[\s\S]+?<td>(.+?)<\/td>/", $html, $dhuhr);
preg_match("/<th>Asr<\/th>[\s\S]+?<td>(.+?)<\/td>/", $html, $asr);
preg_match("/<th>Maghrib<\/th>[\s\S]+?<td>(.+?)<\/td>/", $html, $maghrib);
preg_match("/<th>Isha<\/th>[\s\S]+?<td>(.+?)<\/td>/", $html, $isha);

// verileri veritabanına kaydet
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

$sql = "INSERT INTO prayer_times (city, fajr, sunrise, dhuhr, asr, maghrib, isha)
VALUES ('Istanbul', '$fajr[1]', '$sunrise[1]', '$dhuhr[1]', '$asr', '$maghrib[1]', '$isha[1]')
ON DUPLICATE KEY UPDATE
fajr='$fajr[1]', sunrise='$sunrise[1]', dhuhr='$dhuhr[1]', asr='$asr[1]', maghrib='$maghrib[1]', isha='$isha[1]';";

if ($conn->query($sql) === TRUE) {
    echo "Veriler başarıyla eklendi";
} else {
    echo "Veri ekleme hatası: " . $conn->error;
}

$conn->close();

