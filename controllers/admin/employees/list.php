<?php


$sql = "select * from employees";

$stmt = $conn->query($sql);
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);


// foreach ($employees as $employee) {
//     echo "<li>Name: " . $employee['name'] . "</li>";
// }

