<?php

require_once("config.php");

$sql = "CREATE TABLE IF NOT EXISTS `user` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,    -- Use auto-incrementing integer ID
    `username` VARCHAR(50) UNIQUE NOT NULL,  -- Unique usernames, not empty
    `password` VARCHAR(255) NOT NULL,        -- Longer password for security, not empty
    `level` INT NOT NULL DEFAULT 0           -- Default level of 0
);";

if (mysqli_query($conn, $sql)) {
    echo "Table 'user' created successfully (or already exists).";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
