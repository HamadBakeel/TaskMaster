<?php


// Assuming $conn is your PDO connection

// Initial SQL query without filters
$sql = "SELECT tasks.*, employees.name AS employee_name
        FROM tasks 
        LEFT JOIN employees ON tasks.employee_id = employees.id";

// Applying filters if they are set
if (isset($_POST['employee_id'])) {
    $employee_id = $_POST['employee_id'];

    // Filter by employee_id
    if ($employee_id !== 'all') {
        $sql .= " WHERE tasks.employee_id = $employee_id";
    } else {
        $sql .= " WHERE 1=1"; // If all employees are selected, ensure subsequent conditions start correctly
    }
}

if (isset($_POST['status'])) {
    $status = $_POST['status'];

    // Filter by status
    if ($status !== 'all') {
        $status = ($status == 1) ? 1 : 0; // To ensure status is either 0 or 1

        if (strpos($sql, 'WHERE') === false) {
            $sql .= " WHERE tasks.status = $status";
        } else {
            $sql .= " AND tasks.status = $status";
        }
    }
}


$stmt = $conn->query($sql);
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);



$sql = "select * from employees";

$stmt2 = $conn->query($sql);
$employees = $stmt2->fetchAll(PDO::FETCH_ASSOC);

