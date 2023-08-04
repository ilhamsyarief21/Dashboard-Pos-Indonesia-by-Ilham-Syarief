<?php
// Ganti informasi koneksi sesuai dengan database Anda
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pdb";

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
    
}

// Query untuk menghitung jumlah entri per tanggal pada kolom "tanggal_order"
$sql = "SELECT tanggal_order, COUNT(*) as jumlah FROM regional GROUP BY tanggal_order";
$result = $conn->query($sql);

// Buat array untuk menyimpan data
$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Simpan data ke dalam array dengan key tanggal_order dan value jumlah
        $data[$row['tanggal_order']] = $row['jumlah'];
    }
}

// Tutup koneksi
$conn->close();

// Mengembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
