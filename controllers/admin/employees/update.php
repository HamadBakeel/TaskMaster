<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST["id"]; 
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $status = $_POST["status"];
    $address = $_POST["address"];
    $department = $_POST["department"];
    $password = $_POST["password"]; // New password field

    // Encrypt the password if a new one is provided
    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    }

    // Update employee data in the database
    $sql = "UPDATE employees SET name = :name, phone = :phone, status = :status, address = :address, department= :department";
    if (!empty($password)) {
        $sql .= ", password = :password";
    }
    $sql .= " WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':department', $department);
    $stmt->bindParam(':id', $id);
    if (!empty($password)) {
        $stmt->bindParam(':password', $hashed_password); // Bind hashed password if provided
    }
    $stmt->execute();

    header("Location:".admin_url('/employees'));
    exit(); 
}
