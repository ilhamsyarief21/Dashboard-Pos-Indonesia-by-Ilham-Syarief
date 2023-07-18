<!DOCTYPE html>
<html>
<head>
  <title>Kantor Pos - Sign Up</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <style>
    /* CSS styles */
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background-image: url("https://upload.wikimedia.org/wikipedia/commons/1/11/Kantor_Pusat_Pos_Indonesia.JPG");
      background-size: cover;
      background-position: center;
    }

    .blur {
      background: rgba(0, 0, 0, 0.5);
      filter: blur(8px);
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      z-index: -1;
    }

    .navbar {
      background-color: #ff8300;
      color: #fff;
      padding: 20px;
    }

    .navbar ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
      display: flex;
    }

    .navbar li {
      margin-right: 20px;
    }

    .navbar a {
      color: #fff;
      text-decoration: none;
    }

    .navbar a:hover {
      text-decoration: underline;
    }

    .container {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background-color: transparent;
    }

    .signup-form {
      width: 400px;
      background-color: #fff;
      padding: 40px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .signup-form h2 {
      margin-top: 0;
      margin-bottom: 30px;
      text-align: center;
      color: #333;
    }

    .signup-form .form-group {
      margin-bottom: 20px;
    }

    .signup-form label {
      display: block;
      font-weight: bold;
      color: #555;
      margin-bottom: 5px;
    }

    .signup-form input[type="text"],
    .signup-form input[type="password"] {
      width: 100%;
      padding: 10px;
      border-radius: 3px;
      border: 1px solid #ddd;
    }

    .signup-form button {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #ff8300;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    .signup-form button:hover {
      background-color: #e57200;
    }

    .signup-form p {
      text-align: center;
    }

    .signup-form p a {
      color: #ff8300;
      text-decoration: none;
    }

    .signup-form p a:hover {
      text-decoration: underline;
    }

    /* Animation */
    .fade-in {
      animation: fade-in 1s ease-in-out forwards;
      opacity: 0;
    }

    @keyframes fade-in {
      0% { opacity: 0; }
      100% { opacity: 1; }
    }
  </style>
</head>
<body>
    <?php
    // Konfigurasi database
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'pdb';

    // Membuat koneksi ke database
    $connection = mysqli_connect($host, $username, $password, $database);

    // Memeriksa koneksi
    if (!$connection) {
        die('Koneksi database gagal: ' . mysqli_connect_error());
    }

    // Menangani form sign-up
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Mengambil data dari form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Melakukan validasi data (Anda dapat menambahkan validasi tambahan sesuai kebutuhan)

        // Menghash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Membuat query untuk menyimpan data ke database
        $query = "INSERT INTO user1 (username, password) VALUES ('$username', '$hashedPassword')";

        // Menjalankan query
        if (mysqli_query($connection, $query)) {
            echo 'Sign-up berhasil!';
        } else {
            echo 'Error: ' . mysqli_error($connection);
        }
    }

    // Menutup koneksi database
    mysqli_close($connection);
    ?>

  <!-- HTML structure -->
  <div class="blur"></div>
  <div class="navbar">
    <ul>
      <li><a href="login1.php">Login</a></li>
      <li><a href="https://www.posindonesia.co.id/id/content/faqs">FAQ</a></li>
      <li><a href="https://www.posindonesia.co.id/id/kontak/create">Contact Us</a></li>
      <li><a href="https://www.posindonesia.co.id/id/content/penerimaan-karyawan-tetap">Requirement</a></li>
    </ul>
  </div>
  <div class="container">
     <form class="signup-form fade-in" action="signup.php" method="post">
      <h2>Sign Up - Kantor Pos</h2>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your full name" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>
      <button type="submit">Sign Up</button>
      <p>Already have an account? <a href="login1.php">Login</a></p>
    </form>
  </div>
</body>
</html>
