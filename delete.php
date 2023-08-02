<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'pdb';

$connection = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
    
}

// Get the ID of the record to be deleted
$id = $_GET['id'];

// Delete the record from the database
$query = "DELETE FROM pdb WHERE NIK = '$id'";
$result = mysqli_query($connection, $query);

// Check if the delete operation was successful
if ($result) {
    // Redirect back to the previous page
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
} else {
    echo "Error deleting record: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>
