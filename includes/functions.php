<?php 
function clean_input($data) {
    // Trim whitespace
    $data = trim($data);
    // Remove backslashes
    $data = stripslashes($data);
    // Convert special characters to HTML entities
    $data = htmlspecialchars($data);
    return $data;
}

function admin_url($path = null) {
    $base_url = dirname($_SERVER['SCRIPT_NAME']);
    return $base_url . '/admin' . $path;
}


function employee_url($path = null) {
    $base_url = dirname($_SERVER['SCRIPT_NAME']);
    return $base_url . '/employee' . $path;
}