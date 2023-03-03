<?php
// kullanıcının IP adresinden konum bilgilerini çek
$location = json_decode(file_get_contents("http://ipinfo.io/{$_SERVER['REMOTE_ADDR']}/json"));
$city = $location->city;

// veritabanı bağlantısı
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

// veritabanı bağlantısını kur
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// konum bilgilerine göre namaz vakitlerini çek
$sql = "SELECT * FROM prayer_times WHERE city='$city'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $prayer_times = $result->fetch_assoc();
} else {
    echo "Namaz vakitleri bulunamadı.";
}

// şimdiki saati al
$current_time = date("H:i");

// şimdiki vakit namazını belirle
if ($current_time > $prayer_times['fajr'] && $current_time < $prayer_times['sunrise']) {
    $current_prayer = "Fajr";
} else if ($current_time > $prayer_times['sunrise'] && $current_time < $prayer_times['dhuhr']) {
    $current_prayer = "Sunrise";
} else if ($current_time > $prayer_times['dhuhr'] && $current_time < $prayer_times['asr']) {
    $current_prayer = "Dhuhr";
} else if ($current_time > $prayer_times['asr'] && $current_time < $prayer_times['maghrib']) {
    $current_prayer = "Asr";
} else if ($current_time > $prayer_times['maghrib'] && $current_time < $prayer_times['isha']) {
    $current_prayer = "Maghrib";
} else if ($current_time > $prayer_times['isha'] || $current_time < $prayer_times['fajr']) {
    $current_prayer = "Isha";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Namaz Saatleri</title>
</head>
<body>
  <h1>Namaz Saatleri</h1>
  <table>
    <tr>
      <th>Vakit</
    <tr>
      <th>Vakit</th>
      <th>Zaman</th>
    </tr>
    <tr>
      <td>Fajr</td>
      <td><?php echo $prayer_times['fajr']; ?></td>
    </tr>
    <tr>
      <td>Sunrise</td>
      <td><?php echo $prayer_times['sunrise']; ?></td>
    </tr>
    <tr>
      <td>Dhuhr</td>
      <td><?php echo $prayer_times['dhuhr']; ?></td>
    </tr>
    <tr>
      <td>Asr</td>
      <td><?php echo $prayer_times['asr']; ?></td>
    </tr>
    <tr>
      <td>Maghrib</td>
      <td><?php echo $prayer_times['maghrib']; ?></td>
    </tr>
    <tr>
      <td>Isha</td>
      <td><?php echo $prayer_times['isha']; ?></td>
    </tr>
  </table>
  <p>Şimdiki vakit: <?php echo $current_prayer; ?></p>
</body>
</html>
