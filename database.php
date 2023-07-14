<?php

// - Uses MAMP and phpMyAdmin

/***********************
  Create Database
**********************/

// Store authentication in variables
$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS myDB";
// if ($conn->query($sql) === TRUE) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . $conn->error;
// }

// Close connetion to reduce overhead
$conn->close();

/***********************
  Create Table
**********************/

$dbname = 'myDB';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// sql to create table with datatypes, character limits and index
$sql = "CREATE TABLE IF NOT EXISTS QBS (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(20) NOT NULL,
firstname VARCHAR(50) NOT NULL,
surname VARCHAR(50) NOT NULL,
age INT(2) NOT NULL
)";

// if ($conn->query($sql) === TRUE) {
//   echo "Table MyGuests created successfully";
// } else {
//   echo "Error creating table: " . $conn->error;
// }

$conn->close();
?>