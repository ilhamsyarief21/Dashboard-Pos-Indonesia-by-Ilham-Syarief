
<?php
session_start();

// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "pdb";
$conn = mysqli_connect($host, $username, $password, $database);

// Memproses data yang di-submit saat login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mengecek data pengguna di database
    $query = "SELECT * FROM user1 WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        // Memverifikasi password
        if (password_verify($password, $hashedPassword)) {
            // Login berhasil
            // Set session sebagai tanda bahwa pengguna sudah login
            // Set the username in session after successful login
            $_SESSION['username'] = $username;

            $_SESSION["logged_in"] = true;
            

            // Redirect ke halaman dashboard1.php
            header("Location: dashboard1.php");
            exit();
        } else {
            // Login gagal
            echo "<script>alert('Username atau password salah!');</script>";
        }
    } else {
        // Login gagal
        echo "<script>alert('Username atau password salah!');</script>";
    }
}


?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
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

    .container {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background-color: transparent;
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
    .login-form {
      width: 400px;
      background-color: #fff;
      padding: 40px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      opacity: 0;
      animation: fade-in 1s forwards;
    }

    .login-form h2 {
      margin-top: 0;
      margin-bottom: 30px;
      text-align: center;
      color: #333;
    }

    .login-form .form-group {
      margin-bottom: 20px;
    }

    .login-form label {
      display: block;
      font-weight: bold;
      color: #555;
      margin-bottom: 5px;
    }

    .login-form input[type="text"],
    .login-form input[type="password"] {
      width: 100%;
      padding: 10px;
      border-radius: 3px;
      border: 1px solid #ddd;
    }

    .login-form button {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #ff8300;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    .login-form button:hover {
      background-color: #e57200;
    }

    /* CSS untuk pop-up alert */
    .alert {
      padding: 10px;
      border-radius: 3px;
      color: #fff;
      font-weight: bold;
      text-align: center;
    }

    .alert-success {
      background-color: #ff8300;
    }

    .alert-error {
      background-color: #ff0000;
    }

    /* CSS untuk animasi fade-in */
    @keyframes fade-in {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    /* CSS untuk warna link signup */
    .login-form p a {
      color: #ff8300;
    }
  </style>
</head>
<body>
  
  <!-- HTML structure -->
  <div class="blur"></div>
  <div class="navbar">
    <ul>
      <li><a href="signup.php">Sign Up</a></li>
      <li><a href="https://www.posindonesia.co.id/id/content/faqs">FAQ</a></li>
      <li><a href="https://www.posindonesia.co.id/id/kontak/create">Contact Us</a></li>
      <li><a href="https://www.posindonesia.co.id/id/content/penerimaan-karyawan-tetap">Requirement</a></li>
    </ul>
  </div>
  <div class="blur"></div>
  <div class="container">
    <form class="login-form" method="post" action="">
      <h2>Login - Kantor Pos</h2>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>
      <button type="submit" name="login">Login</button>
      <p>Already have an account? <a href="signup.php">Sign Up</a></p>
    </form>
  </div>
  
  

  


  <script>
    // Mengatur animasi fade-in pada form login
    window.addEventListener('DOMContentLoaded', (event) => {
      document.querySelector('.login-form').style.opacity = 1;
    });
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }

  </script>
</body>
</html>
