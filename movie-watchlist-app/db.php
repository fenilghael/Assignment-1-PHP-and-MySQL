<?php
$host = "localhost";
$user = "root"; // This is the default username in XAMPP/MAMP
$password = ""; // Default password is empty in XAMPP
$dbname = "movie_watchlist"; // The name of your database

// Create a new connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
