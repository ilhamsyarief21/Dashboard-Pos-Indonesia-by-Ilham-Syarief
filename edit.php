<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "pdb");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Cek apakah ada data yang dikirim melalui parameter NIK
if (isset($_GET['NIK'])) {
    $NIK = $_GET['NIK'];

    // Query ke database untuk mendapatkan data dengan NIK yang sesuai
    $sql = "SELECT * FROM pdb WHERE NIK = '$NIK'";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);

    // Cek apakah data ditemukan
    if ($row) {
        // Tampilkan form edit dengan data yang telah diambil
        ?>
        <form method="post" action="update.php">
            <input type="hidden" name="NIK" value="<?php echo $row['NIK']; ?>">
            <label>Keterangan:</label>
            <input type="text" name="keterangan" value="<?php echo $row['keterangan']; ?>">
            <button type="submit">Update</button>
        </form>
        <?php
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "NIK tidak ditemukan.";
}

mysqli_close($koneksi);
?>
