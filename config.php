<?php

// Enable error display for debuging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$servername = "localhost";
$username = "root";
$password = "";
$database = "smart";

// حساب تجريبي كمشرف
# user:admin , password:12345

//حساب تجريبي كموظف
#user:employee   , password:12345
try {
     $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //   echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage()."<br/>";
    // //   exit;
}

