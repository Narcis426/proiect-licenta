<?php
$servername = "127.0.0.1"; // or "localhost"
$username = "root";
$password = "";
$dbname = "db";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully to the MySQL server.";

// Check database connection
if (!mysqli_select_db($conn, $dbname)) {
    die("Database connection failed: " . mysqli_error($conn));
}
//echo "Connected successfully to the database.";


?>
