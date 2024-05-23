<?php


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    // Retrieve employee ID
    $id = $_POST["id"];

    //Delete employee from the database
    $sql = "DELETE FROM employees WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Redirect back to employees page
    header("Location: ".admin_url('/employees'));
    exit(); // Make sure to exit after redirection
}

