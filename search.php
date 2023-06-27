<!DOCTYPE html>
<html>
<head>
  <title>Kantor Pos Dashboard - Search</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
    }

    .sidebar {
      background-color: #FF8C00;
      color: #fff;
      width: 250px;
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      transition: all 0.3s ease-in-out;
    }
    h1 {
      color: #ff6600;
    }

    .sidebar-header {
      padding: 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .sidebar-menu {
      list-style-type: none;
      padding: 0;
    }

    .sidebar-menu li {
      padding: 10px 20px;
    }

    .sidebar-menu li a {
      color: #fff;
      text-decoration: none;
    }

    .content {
      margin-left: 250px;
      padding: 20px;
      transition: all 0.3s ease-in-out;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #ff6600;
      color: #fff;
    }

    tr:nth-child(odd) {
      background-color: #fff;
      color: #000;
    }

    .table-actions {
      display: flex;
      justify-content: flex-end;
      margin-top: 20px;
    }

    .table-actions button {
      margin-left: 10px;
      background-color: #ff6600;
      color: #fff;
      border: none;
      padding: 8px 12px;
      border-radius: 4px;
      cursor: pointer;
    }

    .table-actions button:hover {
      background-color: #e55c00;
    }

    input[type="text"] {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        margin-right: 10px;
        width: 300px;
    }
    
    button[type="submit"] {
        background-color: #ff6600;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
    }

    button[type="submit"]:hover {
        background-color: #e55c00;
    }

    .table-actions button.view-button {
      background-color: #ff6600;
      color: #fff;
      border: none;
      padding: 8px 12px;
      border-radius: 4px;
      cursor: pointer;
    }

    .table-actions button.view-button:hover {
      background-color: #e55c00;
    }

  </style>
</head>
<body>
  <?php
  session_start();
  if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login1.php");
    exit;
  }

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "pdb";

  $conn = new mysqli($servername, $username, $password, $database);

  if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
  }

  // Handle search form submission
  if (isset($_POST['search'])) {
    $searchValue = $_POST['search'];
    $sql = "SELECT NAMA, ALAMAT, NOPEND, KCU_KC, STATATUS_CEKPOS FROM pdb WHERE NAMA LIKE '%$searchValue%'";
    $result = $conn->query($sql);
  } else {
    // Display all records if no search query is provided
    $sql = "SELECT NAMA, ALAMAT, NOPEND, KCU_KC, STATATUS_CEKPOS FROM pdb";
    $result = $conn->query($sql);
  }
  ?>

  <div class="sidebar">
    <div class="sidebar-header">
      <h3>Kantor Pos</h3>
      <div id="user-info"></div>
    </div>
    <ul class="sidebar-menu">
      <li><a href="dashboard.php">Beranda</a></li>
      <li><a href="search.php">Search</a></li>
      <li><a href="#" onclick="logout()">Log Out</a></li>
    </ul>
  </div>
  
  <div class="content">
    <h1>Halaman Pencarian</h1>
    
    <form method="POST" action="search.php">
      <input type="text" name="search" placeholder="Masukkan kata kunci" />
      <button type="submit">Cari</button>
    </form>
    
    <h1></h1>
    <table>
      <tr>
        <th>No</th>
        <th>NAMA</th>
        <th>ALAMAT</th>
        <th>NOPEND</th>
        <th>KCU_KC</th>
        <th>STATUS_CEKPOS</th>
        <th>Aksi</th>
      </tr>
      <?php
      if ($result->num_rows > 0) {
        $counter = 1;
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $counter . "</td>";
          echo "<td>" . $row["NAMA"] . "</td>";
          echo "<td>" . $row["ALAMAT"] . "</td>";
          echo "<td>" . $row["NOPEND"] . "</td>";
          echo "<td>" . $row["KCU_KC"] . "</td>";
          echo "<td>" . $row["STATATUS_CEKPOS"] . "</td>";
          echo "<td><button class=\"view-button\" onclick=\"viewDetails('" . $row["NAMA"] . "')\">Lihat</button></td>";

          echo "</tr>";
          $counter++;
        }
      } else {
        echo "<tr><td colspan='7'>Tidak ada data yang ditemukan</td></tr>";
      }
      ?>
    </table>

    <div class="table-actions">
      <!-- Table actions buttons -->
    </div>

  </div>

  <script>
    function logout() {
      window.location.href = "login1.php";
    }

    function viewDetails(nama) {
      window.location.href = "view.php?nama=" + encodeURIComponent(nama);
    }
  </script>
</body>
</html>
