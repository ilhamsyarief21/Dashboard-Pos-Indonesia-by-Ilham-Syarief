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
    <img class="logo" src="pos.png" width="250" alt="Logo Pos">
    
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
        echo '<td>STATUS</td>';
        echo '<td>' . $row['status1'] . '</td>';
        echo '</tr>';
        echo '<td>KETERANGAN</td>';
        echo '<td>' . $row['keterangan'] . '</td>';
        echo '</tr>';
      
        $potoktp = $row['LINK_FOTO_KTP_tahap1'];
        $potoktp2 = $row['LINK_FOTO_KTP_tahap2'];
        $potopenerima = $row['LINK_FOTO_PENERIMA_tahap1'];
        $potopenerima2 = $row['LINK_FOTO_PENERIMA_tahap2'];
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

    $imageData = file_get_contents($potoktp);
    $imageData3 = file_get_contents($potoktp2);
    $imageData2 = file_get_contents($potopenerima);
    $imageData4 = file_get_contents($potopenerima2);

    echo '<table width="100%">';
    echo '<tr>';
    echo '<th width="40%" scope="col">Foto KTP (Tahap 1)</th>';
    echo '<th width="40%" scope="col">Foto KTP (Tahap 2)</th>';
    echo '<th width="30%" scope="col">Foto Penerima (Tahap 1)</th>';
    echo '<th width="30%" scope="col">Foto Penerima (Tahap 2)</th>';
    echo '</tr>';
    echo '<tbody>';
    echo '<tr>';
    echo '<td width="10px" align="center">' . $imageData . '<img size="30%" src="' . $imageData . '" width="30%", height="30%" align="middle", rotate="180" /><br><a href="' . $potoktp . '" target="_blank">View Photo</a></td>';
    echo '<td width="10px" align="center">' . $imageData2 . '<img size="30%" src="' . $imageData2 . '" width="30%", height="30%" align="middle", rotate="180" /><br><a href="' . $potoktp2 . '" target="_blank">View Photo</a></td>';
    echo '<td width="10px" align="center">' . $imageData3 . '<img size="30%" src="' . $imageData3 . '" width="30%", height="30%" align="middle", rotate="180" /><br><a href="' . $potopenerima . '" target="_blank">View Photo</a></td>';
    echo '<td width="10px" align="center">' . $imageData4 . '<img size="30%" src="' . $imageData4 . '" width="30%", height="30%" align="middle", rotate="180" /><br><a href="' . $potopenerima2 . '" target="_blank">View Photo</a></td>';
    echo '</tr>';
    echo '</tbody>';
    echo '</table>';

    echo '<a href="dashboard1.php" style="position: absolute; top: 0; left: 0;"><img src="icon-back.png" alt="Back" width="30"></a>';

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
