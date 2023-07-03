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
                    <li>
                        <label for="nomor_resi">NOMOR RESI</label>
                        <input type="text" id="nomor_resi" name="nomor_resi" required>
                    </li>
                    <li>
                        <label for="nopend">NOPEND</label>
                        <input type="text" id="nopend" name="nopend" required>
                    </li>
                    <li>
                        <label for="kcu_kc">KCU_KC</label>
                        <input type="text" id="kcu_kc" name="kcu_kc" required>
                    </li>
                    <li>
                        <label for="status_cekpos">STATUS_CEKPOS</label>
                        <input type="text" id="status_cekpos" name="status_cekpos" required>
                    </li>
                    <li>
                        <label for="tanggal_cair">TANGGAL_CAIR</label>
                        <input type="datetime-local" id="tanggal_cair" name="tanggal_cair" required>
                    </li>
                    <li>
                        <label for="link_foto_ktp_tahap1">LINK_FOTO_KTP_tahap1</label>
                        <input type="file" id="link_foto_ktp_tahap1" name="link_foto_ktp_tahap1" accept="image/*" capture="camera" style="width: 78vw;" required>
                    </li>
                    <li>
                        <label for="link_foto_penerima_tahap1">LINK_FOTO_PENERIMA_tahap1</label>
                        <input type="file" id="link_foto_penerima_tahap1" name="link_foto_penerima_tahap1" accept="image/*" capture="camera" style="width: 78vw;" required>
                    </li>
                    <li>
                        <label for="link_foto_ktp_tahap2">LINK_FOTO_KTP_tahap2</label>
                        <input type="file" id="link_foto_ktp_tahap2" name="link_foto_ktp_tahap2" accept="image/*" capture="camera" style="width: 78vw;" required>
                    </li>
                    <li>
                        <label for="link_foto_penerima_tahap2">LINK_FOTO_PENERIMA_tahap2</label>
                        <input type="file" id="link_foto_penerima_tahap2" name="link_foto_penerima_tahap2" accept="image/*" capture="camera" style="width: 78vw;" required>
                    </li>
                    <li>
                        <input type="submit" name="submit" value="Submit">
                    </li>
                </ul>
            </div>
        </form>
    </div>
</body>
</html>
