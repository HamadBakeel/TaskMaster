<?php

session_start();
// Check if the user is logged in
if (isset($_SESSION['employee'])) {
    // Unset or destroy the session data associated with the user
    unset($_SESSION['employee']);
    // session_destroy();

    header("Location: " . dirname($_SERVER['SCRIPT_NAME']));
    exit();
} else {
    // If the user is not logged in, redirect them to the login page
    header("Location: " .dirname($_SERVER['SCRIPT_NAME']).'/login');
    exit();
}