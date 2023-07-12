<!DOCTYPE html>
<html>
<head>
  <title>Tabel dengan CSS</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #ff6000;
      color: #fff;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <table>
    <tr>
      <th>Deskripsi</th>
      <th>Data</th>
    </tr>
    <tr>
      <td>NIK</td>
      <td>Data 1</td>
    </tr>
    <tr>
      <td>NAMA</td>
      <td>Data 2</td>
    </tr>
    <tr>
      <td>ALAMAT</td>
      <td>Data 3</td>
    </tr>
    <tr>
      <td>KODE VOUCHER</td>
      <td>Data 3</td>
    </tr>
    <tr>
      <td>STATUS</td>
      <td>Data 3</td>
    </tr>
    <tr>
      <td>KETERANGAN</td>
      <td>Data 3</td>
    </tr>
    <select>
          <option value="valid">Valid</option>
          <option value="tidak valid">Tidak Valid</option>
    </select>
  
  </table>
</body>
</html>
