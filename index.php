<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PGWEB Acara 8 | Koneksi PHP dengan Basis Data</title>
</head>
<body>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pgweb8";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tabel8";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table border='1px'><tr>
    <th>Kecamatan</th>
    <th>Latitude</th>
    <th>Longitude</th>
    <th>Luas</th>
    <th>Jumlah Penduduk</th>
    <th>Aksi</th>
    </tr>";

  while($row = $result->fetch_assoc()) {
    echo "<tr>
      <td>".$row["kecamatan"]."</td>
      <td align='center'>".$row["latitude"]."</td>
      <td align='center'>".$row["longitude"]."</td>
      <td align='center'>".$row["luas"]."</td>
      <td align='center'>".$row["jumlah_penduduk"]."</td>
      <td align='center'>
        <a href='delete.php?id=".$row["id"]."' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\">Hapus</a>
      </td>
    </tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

$conn->close();
?>

</body>
</html>
