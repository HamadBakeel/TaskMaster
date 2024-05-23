<?php

// Combined SQL query to get both employee data and task counts
$sql = "SELECT 
            e.*, 
            (SELECT COUNT(*) FROM tasks t WHERE t.employee_id = e.id AND t.status = 1) AS completed_tasks,
            (SELECT COUNT(*) FROM tasks t WHERE t.employee_id = e.id AND t.status = 0) AS incomplete_tasks,
            (SELECT COUNT(*) FROM tasks t WHERE t.employee_id = e.id) AS total_tasks
        FROM employees e";

$stmt = $conn->query($sql);
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the count of employees
$employeeCount = count($employees);

// Calculate total completed, incomplete, and all tasks
$totalCompletedTasks = 0;
$totalIncompleteTasks = 0;
$totalTasks = 0;
foreach ($employees as $employee) {
    $totalCompletedTasks += $employee['completed_tasks'];
    $totalIncompleteTasks += $employee['incomplete_tasks'];
    $totalTasks += $employee['total_tasks'];
}

$totalCounts = [$totalTasks,$totalCompletedTasks,$totalIncompleteTasks,$employeeCount];



// Combined SQL query to get both employee data and task counts
$sql = "SELECT 
            e.*, 
            (SELECT COUNT(*) FROM tasks t WHERE t.employee_id = e.id AND t.status = 1) AS completed_tasks,
            (SELECT COUNT(*) FROM tasks t WHERE t.employee_id = e.id AND t.status = 0) AS incomplete_tasks,
            (SELECT COUNT(*) FROM tasks t WHERE t.employee_id = e.id) AS total_tasks
        FROM employees e";

$stmt = $conn->query($sql);
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Calculate achievement ratio for each employee
$employeeAchievements = [];
foreach ($employees as $employee) {
    $totalTasks = $employee['total_tasks'];
    $achievementRatio = $totalTasks != 0 ? ($employee['completed_tasks'] / $totalTasks) * 100 : 0;
    $employeeAchievements[$employee['name']] = $achievementRatio;
}

// Sort employees by achievement ratio in descending order
arsort($employeeAchievements);

// Extract the top achieving employees
$topEmployees = array_slice($employeeAchievements, 0, 3, true);

// Get labels (employee names) and data (achievement counts)
$employeeNames = array_keys($topEmployees);
$achievementCounts = array_values($topEmployees);

// Prepare the JavaScript data object
$data = [
    'labels' => $employeeNames,
    'datasets' => [
        [
            'label' => 'Most Achieving Employees',
            'data' => $achievementCounts,
            'backgroundColor' => [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
            ],
            'hoverOffset' => 4
        ]
    ]
];

// Convert PHP data to JSON
$jsonData = json_encode($data);
