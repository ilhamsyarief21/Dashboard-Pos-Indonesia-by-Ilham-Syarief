<!DOCTYPE html>
<html>
<head>
    <style>
    .container {
    font-family: 'Poppins', sans-serif;
    float: left;
    margin-right: 20px;
    padding: 10px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    }

    .container ul {
        list-style-type: none;
        padding: 0;
    }

    .container li {
        margin-bottom: 10px;
    }

    .container label {
        display: block;
        margin-bottom: 5px;
    }

    .container input[type="text"],
    .container input[type="datetime-local"],
    .container input[type="submit"] {
        width: 78vw;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-family: 'Poppins', sans-serif;
    }

    .container input[type="submit"] {
        background-color: #ff6600;
        color: white;
        cursor: pointer;
    }
    .container input[type="text"],
    .container input[type="datetime-local"],
    .container input[type="submit"],
    .container select {
        width: 78vw;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-family: 'Poppins', sans-serif;
    }
    .file-input {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }

    .file-input input[type="file"] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        cursor: pointer;
    }

    .file-input-label {
        background-color: #ff6600;
        color: white;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
    }
    .container .file-input {
    position: relative;
    overflow: hidden;
    display: inline-block;
    width: 78vw;
    }

    .container .file-input input[type="file"] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        cursor: pointer;
        width: 100%;
        height: 100%;
    }

    .container .file-input-label {
        background-color: #ff6600;
        color: white;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }
    .file-input:hover .file-input-label {
        background-color: #b84e07; /* Ubah warna latar belakang saat dihover */
    }



    </style>
</head>
<body>
    <main>
            <div class="head-title">
                <div class="left">
                    <h1>Input</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Form Inputan Penerima Beras</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="dashboard1.php">Home</a>
                        </li>
                    </ul>
                </div>
                
            </div>
    </main>
    <div class="container">
        <form id="myForm" method="post" action="proses.php">
            <div class="box-info">
                <ul>
                    <li>
                        <label for="nik">NIK</label>
                        <input type="text" id="nik" name="nik" required>
                    </li>
                    <li>
                        <label for="nama">NAMA</label>
                        <input type="text" id="nama" name="nama" required>
                    </li>
                    <li>
                        <label for="alamat">ALAMAT</label>
                        <input type="text" id="alamat" name="alamat" required>
                    </li>
                    <?php
                            function generateResiNumber() {
                                // Mendapatkan tanggal dan waktu saat ini
                                $currentDateTime = new DateTime();
                                // Menghasilkan nomor resi menggunakan timestamp
                                $resiNumber = 'PDB' . $currentDateTime->format('YmdHis');
                                
                                return $resiNumber;
                            }

                            // Mengecek apakah ada data yang dikirimkan melalui metode POST
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                // Jika ada data yang dikirimkan, kita tetap menggunakan nomor resi yang ada
                                $nomorResi = $_POST['nomor_resi'];
                            } else {
                                // Jika tidak ada data yang dikirimkan, kita menghasilkan nomor resi baru
                                $nomorResi = generateResiNumber();
                            }
                            ?>

                            <!-- Menggunakan nilai nomor resi sebagai nilai default pada input -->
                     <li>
                        <label for="nomor_resi">NOMOR RESI</label>
                        <input type="text" id="nomor_resi" name="nomor_resi" value="<?php echo $nomorResi; ?>" readonly required>
                     </li>
                     <li>
                        <label for="nopend">NOPEND</label>
                        <input type="text" id="nopend" name="nopend" required>
                    </li>
                    <li>
                        <label for="kcu_kc">KCU KC</label>
                        <select id="kcu_kc" name="kcu_kc" required>
                            <option value="">Pilih Kota</option>
                            <option value="Aceh">Aceh</option>
                            <option value="Bali">Bali</option>
                            <option value="Bangka Belitung">Bangka Belitung</option>
                            <option value="Banten">Banten</option>
                            <option value="Bengkulu">Bengkulu</option>
                            <option value="Gorontalo">Gorontalo</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Jambi">Jambi</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="Jawa Timur">Jawa Timur</option>
                            <option value="Kalimantan Barat">Kalimantan Barat</option>
                            <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                            <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                            <option value="Kalimantan Timur">Kalimantan Timur</option>
                            <option value="Kalimantan Utara">Kalimantan Utara</option>
                            <option value="Kepulauan Riau">Kepulauan Riau</option>
                            <option value="Lampung">Lampung</option>
                            <option value="Maluku">Maluku</option>
                            <option value="Maluku Utara">Maluku Utara</option>
                            <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                            <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                            <option value="Papua">Papua</option>
                            <option value="Papua Barat">Papua Barat</option>
                            <option value="Riau">Riau</option>
                            <option value="Sulawesi Barat">Sulawesi Barat</option>
                            <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                            <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                            <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                            <option value="Sulawesi Utara">Sulawesi Utara</option>
                            <option value="Sumatra Barat">Sumatra Barat</option>
                            <option value="Sumatra Selatan">Sumatra Selatan</option>
                            <option value="Sumatra Utara">Sumatra Utara</option>
                            <option value="Yogyakarta">Yogyakarta</option>
                            <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                        </select>
                        </li>
                    <li>
                    <label for="status_cekpos">STATUS CEKPOS</label>
                    <select id="status_cekpos" name="status_cekpos" required>
                        <option value="DIBAYAR">DIBAYAR</option>
                        <option value="BELUM DIBAYAR">BELUM DIBAYAR</option>
                    </select>
                    </li>
                    <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $tanggalCair = date("Y-m-d\TH:i");
                        
                    ?>
                    <li>
                        <label for="tanggal_cair">TANGGAL CAIR</label>
                        <input type="datetime-local" id="tanggal_cair" name="tanggal_cair" value="<?php echo $tanggalCair; ?>" required readonly>
                    </li>
                    <li>
                        <label for="petugas">NAMA PETUGAS</label>
                        <input type="text" id="petugas" name="petugas" required>
                    </li>

                    <li>
                        <div class="file-input">
                            <label for="link_foto_ktp_tahap1" class="file-input-label">LINK FOTO KTP TAHAP 1</label>
                            <input type="file" id="link_foto_ktp_tahap1" name="link_foto_ktp_tahap1" accept="image/*" capture="camera" required>
                        </div>
                    </li>
                    <li>
                        <div class="file-input">
                            <label for="link_foto_penerima_tahap1" class="file-input-label">LINK FOTO PENERIMA TAHAP 1</label>
                            <input type="file" id="link_foto_penerima_tahap1" name="link_foto_penerima_tahap1" accept="image/*" capture="camera" required>
                        </div>
                    </li>
                    <li>
                        <div class="file-input">
                            <label for="link_foto_ktp_tahap2" class="file-input-label">LINK FOTO KTP TAHAP 2</label>
                            <input type="file" id="link_foto_ktp_tahap2" name="link_foto_ktp_tahap2" accept="image/*" capture="camera" required>
                        </div>
                    </li>
                    <li>
                        <div class="file-input">
                            <label for="link_foto_penerima_tahap2" class="file-input-label">LINK FOTO PENERIMA TAHAP 2</label>
                            <input type="file" id="link_foto_penerima_tahap2" name="link_foto_penerima_tahap2" accept="image/*" capture="camera" required>
                        </div>
                    </li>

                        <input type="submit" name="submit" value="Submit">
                    </li>
                </ul>
            </div>
        </form>
    </div>
</body>
</html>
