<!DOCTYPE html>
<html>
<head>
    <h1>HASIL PENCARIAN</h1>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <link rel="stylesheet" href="styleui.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .hidden {
            display: none;
        }
        #query {
            display: none;
        }
        body {
            font-family: 'Poppins', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <style>
    .logo-container {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .logo-container img {
        margin-left: 10px;
    }
    </style>

</head>
<body>
    
    
    <?php
    error_reporting(0);
    $data = $_GET['keyword'];
    $content = "";
    include 'koneksi.php';

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $keterangan = $_POST['keterangan1'];

        // Update the 'keterangan' field in the 'pdb' table
        $updateQuery = 'UPDATE pdb SET keterangan = "' . $keterangan . '" WHERE NIK = "' . $data . '"';
        $updateResult = mysqli_query($koneksi, $updateQuery);

    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $keterangan = $_POST['status1'];

        // Update the 'keterangan' field in the 'pdb' table
        $updateQuery = 'UPDATE pdb SET status1 = "' . $keterangan . '" WHERE NIK = "' . $data . '"';
        $updateResult = mysqli_query($koneksi, $updateQuery);

    }

    $cari = 'SELECT * FROM pdb WHERE NIK = "' . $data . '"';
    echo '<span id="query">' . $cari . '</span>';
    $respon = mysqli_query($koneksi, $cari);
    echo '<table width="100%">';
    echo '<thead>';
    echo '<tr>';
    echo '<th width="25%">Deskripsi</th>';
    echo '<th width="75%">Data</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($respon as $row) {
        echo '<tr>';
        echo '<td>NIK</td>';
        echo '<td>' . $row['NIK'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>NAMA</td>';
        echo '<td>' . $row['NAMA'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>ALAMAT</td>';
        echo '<td>' . $row['ALAMAT'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>KODE VOUCHER</td>';
        echo '<td>' . $row['NOMOR_RESI'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>STATUS</td>';
        echo '<td>' . $row['STATATUS_CEKPOS'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>TANGGAL BAYAR</td>';
        echo '<td>' . $row['TANGGAL_CAIR'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>STATUS</td>';
        echo '<td>' . $row['status1'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>KETERANGAN</td>';
        echo '<td>' . $row['keterangan'] . '</td>';
        echo '</tr>';
      
        $namaGambarKTP1 = $row['LINK_FOTO_KTP_tahap1'];
        $namaGambarKTP2 = $row['LINK_FOTO_KTP_tahap2'];
        $namaGambarPenerima1 = $row['LINK_FOTO_PENERIMA_tahap1'];
        $namaGambarPenerima2 = $row['LINK_FOTO_PENERIMA_tahap2'];

        $imagePathKTP1 = '' . $namaGambarKTP1;
        $imagePathKTP2 = '' . $namaGambarKTP2;
        $imagePathPenerima1 = '' . $namaGambarPenerima1;
        $imagePathPenerima2 = '' . $namaGambarPenerima2;
    }
    echo '</tbody>';
    echo '</table>';

    echo '<form method="POST" action="">';
    echo '<select id="status1" name="status1" required>';
    echo '<option value="">Pilih status foto...</option>';
    echo '<option value="VALID">VALID</option>';
    echo '<option value="TIDAK VALID">TIDAK VALID</option>';
    echo '</select>';

    echo '<form method="POST" action="">';
    echo '<input type="text" id="keterangan1" name="keterangan1" placeholder="Masukkan keterangan foto..." required>';
    echo '<input type="submit" value="UPDATE">';
    echo '</form>';

    echo '<table width="100%">';
    echo '<tr>';
    echo '<th width="40%" scope="col">Foto KTP (Tahap 1)</th>';
    echo '<th width="40%" scope="col">Foto KTP (Tahap 2)</th>';
    echo '</tr>';
    echo '<tbody>';
    echo '<tr>';
    echo '<td width="10px" align="center"><img src="' . $imagePathKTP1 . '" width="270" height="400" /></td>';
    echo '<td width="10px" align="center"><img src="' . $imagePathKTP2 . '" width="270" height="400" /></td>';
    echo '</tr>';
    echo '</tbody>';
    echo '</table>';

    echo '<table width="100%">';
    echo '<tr>';
    echo '<th width="40%" scope="col">Foto Penerima (Tahap 1)</th>';
    echo '<th width="40%" scope="col">Foto Penerima (Tahap 2)</th>';
    echo '</tr>';
    echo '<tbody>';
    echo '<tr>';
    echo '<td width="10px" align="center"><img src="' . $imagePathPenerima1 . '" width="270" height="400" /></td>';
    echo '<td width="10px" align="center"><img src="' . $imagePathPenerima2 . '" width="270" height="400" /></td>';
    echo '</tr>';
    echo '</tbody>';
    echo '</table>';

    echo '<a href="dashboard1.php" style="position: absolute; top: 0; left: 0;"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjRoPGjWdHgS_TMcPT368VhTHhD4Utc3UnLDoG34I&s" alt="Back" width="30"></a>';

    ?>

    <script>
        var statusSelect = document.getElementById('status1');
        var keteranganInput = document.getElementById('keterangan1');

        statusSelect.addEventListener('change', function() {
            if (statusSelect.value === 'VALID') {
                keteranganInput.setAttribute('disabled', 'disabled');
            } else {
                keteranganInput.removeAttribute('disabled');
            }
        });
    </script>

</body>
</html>
