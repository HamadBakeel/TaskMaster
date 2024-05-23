<?php 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $status = $_POST["status"];
    $address = $_POST["address"];
    $department = $_POST["department"];
    $password = $_POST["password"]; // New password field

    // Encrypt the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    // Insert new employee data into the database
    $sql = "INSERT INTO employees (name, phone, status, address,department, password) VALUES (:name, :phone, :status, :address,:department, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':department', $department);
    $stmt->bindParam(':password', $hashed_password); 
    $stmt->execute();

    header("Location:".admin_url('/employees'));
    exit(); 
}