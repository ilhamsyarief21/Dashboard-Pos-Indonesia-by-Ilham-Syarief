<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$database = "pdb";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memproses data saat tombol submit diklik
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari input form
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nomor_resi = $_POST['nomor_resi'];
    $nopend = $_POST['nopend'];
    $kcu_kc = $_POST['kcu_kc'];
    $status_cekpos = $_POST['status_cekpos'];
    $tanggal_cair = $_POST['tanggal_cair'];
    $link_foto_ktp_tahap1 = $_POST['link_foto_ktp_tahap1'];
    $link_foto_penerima_tahap1 = $_POST['link_foto_penerima_tahap1'];
    $link_foto_ktp_tahap2 = $_POST['link_foto_ktp_tahap2'];
    $link_foto_penerima_tahap2 = $_POST['link_foto_penerima_tahap2'];

    // Memasukkan data ke tabel "pdb"
    $sql = "INSERT INTO pdb (NIK, NAMA, ALAMAT, `NOMOR_RESI`, NOPEND, KCU_KC, STATATUS_CEKPOS, TANGGAL_CAIR, `LINK_FOTO_KTP_tahap1`, `LINK_FOTO_PENERIMA_tahap1`, `LINK_FOTO_KTP_tahap2`, `LINK_FOTO_PENERIMA_tahap2`)
    VALUES ('$nik', '$nama', '$alamat', '$nomor_resi', '$nopend', '$kcu_kc', '$status_cekpos', '$tanggal_cair', '$link_foto_ktp_tahap1', '$link_foto_penerima_tahap1', '$link_foto_ktp_tahap2', '$link_foto_penerima_tahap2')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan ke database.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi ke database
$conn->close();
?>
