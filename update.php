<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "pdb");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Cek apakah ada data yang dikirim melalui metode POST
if (isset($_POST['NIK']) && isset($_POST['keterangan'])) {
    $NIK = $_POST['NIK'];
    $keterangan = $_POST['keterangan'];

    // Query ke database untuk melakukan update data
    $sql = "UPDATE pdb SET keterangan = '$keterangan' WHERE NIK = '$NIK'";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Terjadi kesalahan saat memperbarui data: " . mysqli_error($koneksi);
    }
} else {
    echo "Data tidak lengkap.";
}

mysqli_close($koneksi);
?>
