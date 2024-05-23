<?php

// Start a session
session_start();

// Function to validate user credentials
function validateUser($username, $password, $pdo) {
    // Prepare SQL statement to fetch user details
    $stmt = $pdo->prepare("SELECT * FROM employees WHERE name = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if user exists and password is correct
    if ($user && password_verify($password, $user['password'])) {
        return $user; 
    } else {
        return false;
    }
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Validate user credentials
    $user = validateUser($name, $password, $conn);
    if ($user) {
        // Store user details in session
        $_SESSION['employee'] = $user;
        
        // Redirect to dashboard or any other page
        header("Location: ".employee_url(null));
        exit();
    } else {
        // Set error message in session
        $_SESSION['error'] = "Invalid username or password";

        // Redirect back to login page
        header("Location: ".'/login');
        exit();
    }
}
