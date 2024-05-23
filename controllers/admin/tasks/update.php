<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST["id"]; 
    $title = $_POST["title"];
    $details = $_POST["details"];
    $status = $_POST["status"];
    $end_date = $_POST["end_date"];
    $employee_id = $_POST["employee_id"]; // New employee_id field

    

    // Update employee data in the database
    $sql = "UPDATE tasks SET title = :title, details = :details, status = :status, end_date= :end_date, employee_id= :employee_id";

    $sql .= " WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':details', $details);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':end_date', $end_date);
    $stmt->bindParam(':id', $id);

    $stmt->bindParam(':employee_id', $employee_id); 

    $stmt->execute();

    header("Location:".admin_url('/tasks'));
    exit(); 
}
