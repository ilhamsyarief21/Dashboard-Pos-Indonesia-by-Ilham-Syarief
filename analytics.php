<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="style.css">

    <title>Kantor Pos - Dashboard</title>
    <style>
        .status {
            color: black;
        }
        .dark .status {
            color: #fff;
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
            background-color: #5f9ea0;
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
 
        .valid {
            color: green;
        }

        .invalid {
            color: red;
        }




    </style>
</head>

<body>

    <!-- CONTENT -->
        <!-- NAVBAR -->
        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Tabel Penyaluran Beras</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Tampilan Tabel Penyaluran Beras</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="dashboard1.php">Home</a>
                        </li>
                    </ul>

                </div>
            </div>
            <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
               
                    <ul class="breadcrumb">
                     
                        
                    </ul>
                </div>
                <a href="#" class="btn-download" onclick="exportToExcel()">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Download Excel</span>
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
                            $query = "SELECT COUNT(*) as total_users FROM prov";

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
                        <p>Total Provinsi</p>
                    </span>
                </li>
                <li>
                    <i class='bx bx-world' ></i>
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
                            $query = "SELECT COUNT(*) as total_pdb FROM kabkota";

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
                        <p>Jumlah Kabupaten / Kota</p>
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
                            $query = "SELECT COUNT(*) as total_pdb FROM kec";

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
                        <p>Jumlah Kecamatan</p>
                    </span>
                </li>
            </ul>
            <ul>
            
            <div class="box-info">
                <ul>
                    <li>
                
                    </li>
                </ul>
            </div>
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

            

            <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Data Provinsi Penyaluran Beras</h3>
                </div>
                <table id="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Provinsi</th>
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
                        $perPage = 10; // Number of rows to display per page
                        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Current page (default to 1)
                        $startFrom = ($currentPage - 1) * $perPage; // Start index of rows to fetch

                        // Query to fetch data from the database table "prov"
                        $query = "SELECT id, provinsi FROM prov LIMIT $startFrom, $perPage";
                        $result = mysqli_query($connection, $query);

                        if (mysqli_num_rows($result) > 0) {
                            // Loop through each row of data
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Display the data in the table
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['provinsi'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='2'>No records found</td></tr>";
                        }

                    
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

            <script>
        function exportToExcel() {
            // Get the table element
            var table = document.getElementById("data-table");

            // Create a new Excel Workbook
            var workbook = new ExcelJS.Workbook();
            var worksheet = workbook.addWorksheet("Data");

            // Iterate through each row in the table
            for (var i = 0; i < table.rows.length; i++) {
                var row = table.rows[i];
                var rowData = [];

                // Iterate through each cell in the row
                for (var j = 0; j < row.cells.length; j++) {
                    var cell = row.cells[j];
                    rowData.push(cell.innerText);
                }

                // Add the row data to the worksheet
                worksheet.addRow(rowData);
            }

            // Convert the workbook to a Blob
            workbook.xlsx.writeBuffer().then(function (buffer) {
                var blob = new Blob([buffer], {
                    type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                });

                // Create a download link
                var link = document.createElement("a");
                link.href = window.URL.createObjectURL(blob);
                link.download = "data.xlsx";
                link.click();
            });
        }
    </script>
    </body>
            
            
</html>



