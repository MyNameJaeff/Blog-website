<?php
$servername = "localhost";

$username = "root";

$password = "";

$dbname = "blogwebsite"; 

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "CREATE TABLE IF NOT EXISTS blogposts (
    author VARCHAR(40) NOT NULL,
    blogtitle VARCHAR(50) PRIMARY KEY NOT NULL,
    blogdescription VARCHAR(200) NOT NULL,
    blogtext VARCHAR(1000) NOT NULL,
    images VARCHAR(100) NOT NULL
    )";
if (!mysqli_query($conn, $sql)) {
    die("Error creating table: " . mysqli_error($conn));
}

$sql = "CREATE TABLE IF NOT EXISTS logins (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(40) NOT NULL,
    email VARCHAR(50) NOT NULL,
    passwrd VARCHAR(50) NOT NULL,
    profilepicture VARCHAR(50)
    )";
if (!mysqli_query($conn, $sql)) {
    die("Error creating table: " . mysqli_error($conn));
}

if($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

$conn->close();
?>