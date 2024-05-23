<?php

$sqlm = "select * from tasks where employee_id=".   $_SESSION['employee']['id'];

$stmtm = $conn->query($sqlm);
$tasks = $stmtm->fetchAll(PDO::FETCH_ASSOC); 




$sql = "SELECT status, COUNT(*) AS count FROM tasks WHERE employee_id = :employee_id GROUP BY status";
$stmt = $conn->prepare($sql);
$stmt->execute(['employee_id' => $_SESSION['employee']['id']]);
$task_counts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$incompeletdTasks = 0;
$compeletdTasks =0;
foreach ($task_counts as $count) {
    if ($count['status'] == 0) {
        $incompeletdTasks ++;
    } elseif ($count['status'] == 1) {
       $compeletdTasks ++;
    }
}




