<?php 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST["title"];
    $details = $_POST["details"];
    $status = $_POST["status"];
    $end_date = $_POST["end_date"];
    $employee_id = $_POST["employee_id"];
  

    // Insert new employee data into the database
    $sql = "INSERT INTO tasks (title, details, status, end_date,employee_id) VALUES (:title, :details, :status, :end_date,:employee_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':details', $details);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':end_date', $end_date);
    $stmt->bindParam(':employee_id', $employee_id);
    $stmt->execute();

    header("Location:".admin_url('/tasks'));
    exit(); 
}