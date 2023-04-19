<?php
$servername = "localhost";

$username = "root";

$password = "";

$dbname = "blogpostings"; 

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
$sql = "CREATE TABLE IF NOT EXISTS blogpostings (
    author VARCHAR(40) NOT NULL,
    blogtitle VARCHAR(50) PRIMARY KEY NOT NULL,
    blogdescription VARCHAR(200) NOT NULL,
    blogtext VARCHAR(1000) NOT NULL,
    images VARCHAR(100) NOT NULL
    )";
if (!mysqli_query($conn, $sql)) {
    die("Error creating table: " . mysqli_error($conn));
}

if($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

$conn->close();
?>