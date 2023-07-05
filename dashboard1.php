<?php
// Start the session (if not started)
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

// Function to check if the user is logged in
function isLoggedIn()
    {
        return isset($_SESSION['username']);
    }

// Function to redirect to the login page if the user is not logged in
function redirectToLogin()
    {
        if (!isLoggedIn()) {
            header("Location: login1.php");
            exit();
        }
    }

// Function to logout the user
function logout()
    {
        // Clear the session data
        session_unset();
        session_destroy();

        // Redirect to the login page
        header("Location: login1.php");
        exit();
    }

// Call this function at the beginning of your dashboard page
redirectToLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- My CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="1.png" type="image/png">

    <title>Kantor Pos - Dashboard</title>
    <style>
        .status {
            color: black;
        }

        .dark .status {
            color: black;
        }   

        .status {
            color: black;
            font-size: 14px;
        }

        .switch-mode {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 20px;
            border-radius: 10px;
            background-color: #ddd;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .switch-mode:before,
        .switch-mode:after {
            content: "";
            display: block;
            position: absolute;
            top: 2px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            transition: transform 0.3s ease;
        }

        .switch-mode:before {
            left: 2px;
            background-color: orange;
        }

        .switch-mode:after {
            right: 2px;
            background-color: orange;
            transform: scale(0);
        }

        .dark {
            background-color: #06060e;
            color: #fff;
        }

        .dark table {
            background-color: #0d0c1e;
        }

        input[type="checkbox"][id="switch-mode"]:checked+label.switch-mode {
            background-color: ddddd;
        }

        input[type="checkbox"][id="switch-mode"]:checked+label.switch-mode:before {
            transform: translateX(20px);
        }

        input[type="checkbox"][id="switch-mode"]:checked+label.switch-mode:after {
            transform: scale(1);
        }

        .side-menu li.active a {
            color: orange;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            font-family: "Poppins", sans-serif;
            font-size: 20px;
        }

        #nama {
            font-family: "Poppins", sans-serif;
            font-size: 14px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        input[type="text"],
        input[type="date"] {
            padding: 5px;
            width: 150px;
            border-radius: 5px;
        }

        input[type="submit"] {
            padding: 10px 40px;
            background-color: #ff6600;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #ff9933;
        }

        #clearButton {
            background-color: #ff6600;
            border-radius: 5px;
            color: white;
            padding: 10px 40px;
            border: none;
            cursor: pointer;
        }

        #clearButton:hover {
            opacity: 0.8;
        }

        .pagination {
            margin-top: 10px;
            text-align: center;
        }

        .pagination a {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            background-color: #ff6600;
            color: white;
            text-decoration: none;
            margin-right: 5px;
        }

        .pagination a:hover {
            background-color: #ff8000;
        }

        .pagination .prev,
        .pagination .next {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            background-color: #ff6600;
            color: white;
            text-decoration: none;
        }

        .pagination .prev:hover,
        .pagination .next:hover {
            background-color: #ff8000;
        }

        a.delete-button {
            display: inline-block;
            padding: 5px 10px;
            background-color: #FF6000;
            color: #ffffff;
            border-radius: 5px;
            text-decoration: none;
        }

        a.delete-button:hover {
            background-color: #FF8000;
        }
    </style>
</head>


<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="dashboard1.php" class="brand">
            <img src="1.png" width="99" alt="Building House" />
            <span class="text">Pos Indonesia</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="dashboard1.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" id="analytics-link">
                    <i class='bx bx-table'></i>
                    <span class="text">Tabel Penyaluran Beras</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-folder-plus'></i>
                    <span class="text">Input</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="login1.php" class="logout" onclick="logout()">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
        <input type="checkbox" id="switch-mode" hidden>
        <label for="switch-mode" class="switch-mode"></label>
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <a href="#">Pencarian Penyaluran Beras</a>
            <form class="form-inline" action="search4.php" method="GET">
                <div class="form-input">
                    <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Masukkan NIK.." required style="font-family: Poppins;">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download" onclick="exportToExcel()">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Download CSV</span>
                </a>
            </div>

            <ul class="box-info">
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h3>
                            <?php
                            // Assuming you have a database connection already established
                            $host = 'localhost';
                            $username = 'root';
                            $password = '';
                            $database = 'pdb';

                            $connection = mysqli_connect($host, $username, $password, $database);

                            // Check if the connection was successful
                            if (!$connection) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            // Query to fetch data from the database table "user1"
                            $query = "SELECT COUNT(*) as total_users FROM user1";

                            $result = mysqli_query($connection, $query);

                            $totalUsers = 0;

                            if (mysqli_num_rows($result) > 0) {
                                // Fetch the total number of users
                                $row = mysqli_fetch_assoc($result);
                                $totalUsers = $row['total_users'];
                            }

                            // Close the database connection
                            mysqli_close($connection);

                            echo $totalUsers;
                            ?>
                        </h3>
                        <p>Total Admin</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-calendar-check'></i>
                    <span class="text">
                        <h3>
                            <?php
                            // Assuming you have a database connection already established
                            $host = 'localhost';
                            $username = 'root';
                            $password = '';
                            $database = 'pdb';

                            $connection = mysqli_connect($host, $username, $password, $database);

                            // Check if the connection was successful
                            if (!$connection) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            // Query to fetch data from the database table "pdb"
                            $query = "SELECT COUNT(*) as total_pdb FROM pdb";

                            $result = mysqli_query($connection, $query);

                            $totalPDB = 0;

                            if (mysqli_num_rows($result) > 0) {
                                // Fetch the total number of rows in "pdb" table
                                $row = mysqli_fetch_assoc($result);
                                $totalPDB = $row['total_pdb'];
                            }

                            // Close the database connection
                            mysqli_close($connection);

                            echo $totalPDB;
                            ?>
                        </h3>
                        <p>Jumlah Penerima Beras</p>
                    </span>
                </li>
            </ul>

            <ul class="box-info">
                <li>
                    <?php
                    // Assuming you have a database connection already established
                    $host = 'localhost';
                    $username = 'root';
                    $password = '';
                    $database = 'pdb';

                    $connection = mysqli_connect($host, $username, $password, $database);

                    // Check if the connection was successful
                    if (!$connection) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // Query to fetch data from the database table "pdb"
                    $query = "SELECT COUNT(*) as total_valid FROM pdb WHERE status1 = 'valid'";
                    $result = mysqli_query($connection, $query);
                    $totalValid = 0;

                    if (mysqli_num_rows($result) > 0) {
                        // Fetch the total number of valid rows
                        $row = mysqli_fetch_assoc($result);
                        $totalValid = $row['total_valid'];
                    }

                    // Query to fetch data from the database table "pdb"
                    $query = "SELECT COUNT(*) as total_invalid FROM pdb WHERE status1 = 'Tidak Valid'";
                    $result = mysqli_query($connection, $query);
                    $totalInvalid = 0;

                    if (mysqli_num_rows($result) > 0) {
                        // Fetch the total number of invalid rows
                        $row = mysqli_fetch_assoc($result);
                        $totalInvalid = $row['total_invalid'];
                    }

                    // Close the database connection
                    mysqli_close($connection);
                    ?>
                    <span class="text">
                        <h3><?php echo $totalValid; ?></h3>
                        <p>Valid</p>
                    </span>
                </li>
                <li>
                    <span class="text">
                        <h3><?php echo $totalInvalid; ?></h3>
                        <p>Tidak Valid</p>
                    </span>
                </li>
            </ul>
            <ul class="box-info">
                <li>
                    <h3>User Chart</h3>
                    <div>
                        <?php
                        // Memanggil fungsi userchartcreation() untuk membuat chart
                        userchartcreation();
                        ?>
                    </div>
                </li>
                <?php
                function userchartcreation()
                {
                    // Koneksi ke database
                    $host = 'localhost';
                    $username = 'root';
                    $password = '';
                    $database = 'pdb';

                    $conn = mysqli_connect($host, $username, $password, $database);
                    if (!$conn) {
                        die("Koneksi database gagal: " . mysqli_connect_error());
                    }

                    // Mengambil data tanggal pembuatan akun dari tabel user2
                    $query = "SELECT created_at FROM user1";
                    $result = mysqli_query($conn, $query);

                    // Menyusun data tanggal ke dalam array
                    $dates = array();
                    while ($row = mysqli_fetch_assoc($result)) {
                        $date = date('Y-m-d', strtotime($row['created_at']));
                        $dates[] = $date;
                    }

                    // Menghitung jumlah akun yang dibuat berdasarkan tanggal
                    $counts = array_count_values($dates);

                    // Menyusun data untuk chart
                    $chartData = array();
                    foreach ($counts as $date => $count) {
                        $chartData[] = array(
                            'date' => $date,
                            'count' => $count
                        );
                    }

                    // Membuat chart menggunakan Chart.js
                    echo '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';
                    echo '<canvas id="userChart" width="400" height="400"></canvas>';
                    echo '<script>';
                    echo 'var ctx = document.getElementById("userChart").getContext("2d");';
                    echo 'var userChart = new Chart(ctx, {';
                    echo '    type: "bar",';
                    echo '    data: {';
                    echo '        labels: ' . json_encode(array_column($chartData, 'date')) . ',';
                    echo '        datasets: [{';
                    echo '            label: "Jumlah Akun",';
                    echo '            data: ' . json_encode(array_column($chartData, 'count')) . ',';
                    echo '            backgroundColor: "rgba(75, 192, 192, 0.2)",';
                    echo '            borderColor: "rgba(75, 192, 192, 1)",';
                    echo '            borderWidth: 1';
                    echo '        }]';
                    echo '    },';
                    echo '    options: {';
                    echo '        scales: {';
                    echo '            y: {';
                    echo '                beginAtZero: true';
                    echo '            }';
                    echo '        }';
                    echo '    }';
                    echo '});';
                    echo '</script>';

                    // Menutup koneksi ke database
                    mysqli_close($conn);
                }
                ?>


                </li>
                <li>
                <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Graphic Tanggal Cair</h3>
                    </div>
                    <canvas id="userCreationChart"></canvas>
                </div>
            </div>

            <?php
            $koneksi = mysqli_connect("localhost", "root", "", "pdb");
            if (!$koneksi) {
                die("Koneksi gagal: " . mysqli_connect_error());
            }
            $query = "SELECT COUNT(*) AS total, status1 FROM datasampel1 GROUP BY status1";
            $result = mysqli_query($koneksi, $query);

            $validCount = 0;
            $invalidCount = 0;

            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['status1'] == 'status1') {
                    $validCount = $row['total'];
                } else {
                    $invalidCount = $row['total'];
                }
            }

            ?>


            <?php
                // Assuming you have a database connection already established
                $host = 'localhost';
                $username = 'root';
                $password = '';
                $database = 'pdb';

                $connection = mysqli_connect($host, $username, $password, $database);

                // Check if the connection was successful
                if (!$connection) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Query to fetch data from the database table "user1"
                $query = "SELECT DATE_FORMAT(TANGGAL_CAIR, '%Y-%m-%d') AS creation_date, COUNT(*) AS total_users FROM pdb GROUP BY DATE_FORMAT(TANGGAL_CAIR, '%Y-%m-%d')";

                $result = mysqli_query($connection, $query);

                $dates = [];
                $userCounts = [];

                if (mysqli_num_rows($result) > 0) {
                    // Loop through each row of data
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Collect the dates and user counts
                        $dates[] = $row['creation_date'];
                        $userCounts[] = $row['total_users'];
                    }
                }

                // Close the database connection
                mysqli_close($connection);
                ?>

                </li>
            </ul>
            


            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Data Penyaluran Beras</h3>
                    </div>
                    <form method="POST" action="">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="search" placeholder="Cari Nama" />
                        <label for="start_date">Tanggal</label>
                        <input type="date" id="start_date" name="start_date" />
                        <label for="end_date">s.d Tanggal</label>
                        <input type="date" id="end_date" name="end_date" />
                        <input type="submit" name="submit" value="Filter" />
                        <button id="clearButton" onclick="clearFilters()"><i class="fas fa-times"></i> Clear</button>
                    </form>

                    <table id="data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NAMA</th>
                                <th>NIK</th>
                                <th>TANGGAL CAIR</th>
                                <th>STATUS</th>
                                <th>KETERANGAN</th>
                                <th>NAMA PETUGAS</th>
                                <th>DELETE</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                            // Assuming you have a database connection already established
                            $host = 'localhost';
                            $username = 'root';
                            $password = '';
                            $database = 'pdb';

                            $connection = mysqli_connect($host, $username, $password, $database);

                            // Check if the connection was successful
                            if (!$connection) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            // Pagination variables
                            $resultsPerPage = 10; // Number of results to display per page
                            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page number

                            // Handle search and date range filter
                            if (isset($_POST['submit'])) {
                                $search = $_POST['search'];
                                $startDate = $_POST['start_date'];
                                $endDate = $_POST['end_date'];

                                $queryCount = "SELECT COUNT(*) as total FROM pdb WHERE NAMA LIKE '%$search%'";

                                $query = "SELECT NIK, NAMA, TANGGAL_CAIR, status1, keterangan,PETUGAS FROM pdb WHERE NAMA LIKE '%$search%'";

                                // If start date and end date are provided, add them to the query
                                if (!empty($startDate) && !empty($endDate)) {
                                    $queryCount .= " AND TANGGAL_CAIR BETWEEN '$startDate' AND '$endDate'";
                                    $query .= " AND TANGGAL_CAIR BETWEEN '$startDate' AND '$endDate'";
                                }
                            } else {
                                $queryCount = "SELECT COUNT(*) as total FROM pdb";
                                $query = "SELECT NIK, NAMA, TANGGAL_CAIR, status1, keterangan,PETUGAS FROM pdb";
                            }

                            // Get the total number of records
                            $countResult = mysqli_query($connection, $queryCount);
                            $totalRecords = mysqli_fetch_assoc($countResult)['total'];

                            // Calculate the total number of pages
                            $totalPages = ceil($totalRecords / $resultsPerPage);

                            // Calculate the offset for the current page
                            $offset = ($currentPage - 1) * $resultsPerPage;

                            // Add pagination to the query
                            $query .= " LIMIT $offset, $resultsPerPage";

                            $result = mysqli_query($connection, $query);

                            if (mysqli_num_rows($result) > 0) {
                                // Loop through each row of data
                                $counter = $offset + 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Display the data in the table
                                 // Display the data in the table
                                echo "<tr>";
                                echo "<td>" . $counter . "</td>";
                                echo "<td>" . $row['NAMA'] . "</td>";
                                echo "<td>" . $row['NIK'] . "</td>";
                                echo "<td>" . $row['TANGGAL_CAIR'] . "</td>";
                                echo "<td class='status'>" . $row['status1'] . "</td>";
                                echo "<td>" . $row['keterangan'] . "</td>";
                                echo "<td>" . $row['PETUGAS'] . "</td>";
                                echo "<td><a href='delete.php?id=" . $row['NIK'] . "' class='delete-button'>Delete</a></td>"; // Tambahkan tombol delete dengan link ke file delete.php
                                echo "</tr>";
                                $counter++;
                                }
                            } else {
                                echo "<tr><td colspan='6'>No records found</td></tr>";
                            }

                           
                            ?>
                   

                        </tbody>
                    </table>
                    <?php
                     // Generate pagination links
                     echo "<div class='pagination'>";
                     if ($currentPage > 1) {
                         echo "<a href='?page=" . ($currentPage - 1) . "'>&laquo; Prev</a>";
                     }
                     for ($i = 1; $i <= $totalPages; $i++) {
                         echo "<a " . ($i == $currentPage ? "class='active'" : "") . " href='?page=$i'>$i</a>";
                     }
                     if ($currentPage < $totalPages) {
                         echo "<a href='?page=" . ($currentPage + 1) . "'>Next &raquo;</a>";
                     }
                     echo "</div>";

                     // Close the database connection
                     mysqli_close($connection);?>
                </div>
            </div>


            
                


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function clearFilters() {
  // Hapus nilai input pencarian dan tanggal
  document.getElementById("nama").value = "";
  document.getElementById("start_date").value = "";
  document.getElementById("end_date").value = "";

  // Submit form untuk menampilkan semua data
  document.forms[0].submit();
}


document.addEventListener("DOMContentLoaded", function() {
    // Retrieve the data from PHP
    const dates = <?php echo json_encode($dates); ?>;
    const userCounts = <?php echo json_encode($userCounts); ?>;

    // Create the chart
    const ctx = document.getElementById('userCreationChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        
        data: {
            labels: dates,
            datasets: [{
                label: 'Tanggal Cair',
                data: userCounts,
                backgroundColor: '#ff6600',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2
            
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
</main>
<!-- MAIN -->
</section>
<!-- CONTENT -->
</body>
<script>
    // Ambil elemen menu "Analytics" dan elemen utama konten
    const analyticsLink = document.getElementById("analytics-link");
    const mainContent = document.getElementById("content");

    // Tambahkan event listener saat menu "Analytics" diklik
    analyticsLink.addEventListener("click", function(event) {
        event.preventDefault(); // Mencegah perilaku default dari tautan

        // Hapus kelas "active" dari semua elemen menu
        const menuItems = document.querySelectorAll("#sidebar .side-menu li");
        menuItems.forEach(function(item) {
            item.classList.remove("active");
        });

        // Tambahkan kelas "active" pada menu "Analytics"
        analyticsLink.parentElement.classList.add("active");

        // Ganti konten utama dengan konten "Analytics" yang diinginkan
        mainContent.innerHTML = "<h2>Analytics Page</h2><p>Ini adalah halaman Analytics.</p>";
    });


    document.addEventListener("DOMContentLoaded", function() {
        // Ambil elemen menu "Dashboard", "Analytics", dan "Team"
        const dashboardMenu = document.querySelector("#sidebar .side-menu li:first-child");
        const analyticsMenu = document.querySelector("#sidebar .side-menu li:nth-child(2)");
        const teamMenu = document.querySelector("#sidebar .side-menu li:nth-child(3)");

        // Tambahkan event listener saat menu "Analytics" diklik
        analyticsMenu.addEventListener("click", function() {
            // Tambahkan class "active" pada menu "Analytics"
            analyticsMenu.classList.add("active");

            // Hapus class "active" dari menu "Dashboard" dan "Team"
            dashboardMenu.classList.remove("active");
            teamMenu.classList.remove("active");
        });

        // Tambahkan event listener saat menu "Team" diklik
        teamMenu.addEventListener("click", function() {
            // Tambahkan class "active" pada menu "Team"
            teamMenu.classList.add("active");

            // Hapus class "active" dari menu "Dashboard" dan "Analytics"
            dashboardMenu.classList.remove("active");
            analyticsMenu.classList.remove("active");
        });

        // Tambahkan event listener saat menu "Dashboard" diklik
        dashboardMenu.addEventListener("click", function() {
            // Tambahkan class "active" pada menu "Dashboard"
            dashboardMenu.classList.add("active");

            // Hapus class "active" dari menu "Analytics" dan "Team"
            analyticsMenu.classList.remove("active");
            teamMenu.classList.remove("active");
        });

        analyticsMenu.addEventListener("click", function() {
            // Hapus class "active" dari menu "Dashboard" dan "Team"
            dashboardMenu.classList.remove("active");
            teamMenu.classList.remove("active");

            // Fetch content from "search4.php" using AJAX
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Update the main content with the fetched content
                    mainContent.innerHTML = xhr.responseText;
                }
            };
            xhr.open("GET", "analytics.php", true);
            xhr.send();
        });
    });
    // Ambil elemen menu "Team"
    const teamMenu = document.querySelector("#sidebar .side-menu li:nth-child(3)");

    // Tambahkan event listener saat menu "Team" diklik
    teamMenu.addEventListener("click", function() {
        // Fetch content from "https://reportinggln.posindonesia.co.id/login" using AJAX
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Update the main content with the fetched content
                mainContent.innerHTML = xhr.responseText;
            }
        };
        xhr.open("GET", "inputan.php", true);
        xhr.send();

        // Hapus class "active" dari menu "Dashboard" dan "Analytics"
        dashboardMenu.classList.remove("active");
        analyticsMenu.classList.remove("active");

        // Tambahkan class "active" pada menu "Team"
        teamMenu.classList.add("active");
    });

    // Ambil elemen switch mode dan elemen-elemen yang ingin diubah temanya
    const switchMode = document.getElementById("switch-mode");
    const body = document.body;
    const navbar = document.querySelector("nav");
    const table = document.getElementById("data-table");

    // Tambahkan event listener saat switch mode berubah
    switchMode.addEventListener("change", function() {
        // Periksa apakah switch mode dicentang atau tidak
        if (switchMode.checked) {
            // Tambahkan kelas "dark" pada elemen-elemen yang ingin diubah temanya
            body.classList.add("dark");
            navbar.classList.add("dark");
            table.classList.add("dark");
        } else {
            // Hapus kelas "dark" pada elemen-elemen yang ingin diubah temanya
            body.classList.remove("dark");
            navbar.classList.remove("dark");
            table.classList.remove("dark");
        }
    });

    // Tambahkan event listener untuk tombol tutup pada pop-up
    document.getElementsByClassName("close-btn")[0].addEventListener("click", hidePopup);

    function exportToExcel() {
        const table = document.getElementById("data-table");
        const rows = Array.from(table.getElementsByTagName("tr"));
        const csvContent = rows.map(row => Array.from(row.getElementsByTagName("td")).map(cell => cell.innerText)).join("\n");

        const blob = new Blob([csvContent], {
            type: "text/csv;charset=utf-8;"
        });

        const link = document.createElement("a");
        const url = URL.createObjectURL(blob);
        link.setAttribute("href", url);
        link.setAttribute("download", "data_provinsi_penyaluran_beras.csv");
        link.style.visibility = 'hidden';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
</script>
</html>



