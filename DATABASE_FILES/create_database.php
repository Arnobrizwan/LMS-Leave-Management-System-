<?php

$servername = "localhost";
$username = "root";
$password = "";

//  cookie 
$dbCreated = isset($_COOKIE['dbCreated']) && $_COOKIE['dbCreated'] == "true";

if (!$dbCreated) {
    $conn = mysqli_connect($servername, $username, $password);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS mydatabase";
    if (mysqli_query($conn, $sql)) {
        // Set the cookie to indicate successful creation
        setcookie('dbCreated', 'true', time() + (86400 * 30)); // Cookie expires in 30 days
    } else {
        echo "Error creating database: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    // Database already created, no action needed
}


