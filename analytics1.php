<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data provinsi dari database
$sql = "SELECT * FROM prov";
$result = $conn->query($sql);

// Membuat array untuk menyimpan nama provinsi
$provinsi = array();
while ($row = $result->fetch_assoc()) {
    $provinsi[] = $row['prov'];
}

// Fungsi untuk menghasilkan peta berdasarkan nama provinsi
function tampilkanPeta($namaProvinsi)
{
    // Menggunakan API peta tertentu (misalnya Google Maps) untuk menampilkan peta
    // Di sini Anda perlu mengganti API_KEY dengan kunci API peta yang valid
    $api_key = "API_KEY";
    
    // Contoh tampilan peta menggunakan Google Maps
    echo '<iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=' . $api_key . '&q=' . $namaProvinsi . '"></iframe>';
}

// Contoh penggunaan fungsi untuk menampilkan peta berdasarkan nama provinsi tertentu
$namaProvinsi = "Jawa Barat"; // Ganti dengan nama provinsi yang ingin ditampilkan
if (in_array($namaProvinsi, $provinsi)) {
    tampilkanPeta($namaProvinsi);
} else {
    echo "Provinsi tidak ditemukan.";
}

// Menutup koneksi ke database
$conn->close();
?>
