<?php

include 'config.php';
require_once 'includes/functions.php';


// Get the base URL of the application
$base_url = dirname($_SERVER['SCRIPT_NAME']);

// Get the requested URL
$request_uri = $_SERVER['REQUEST_URI'];

// Remove the base URL from the request URI to get the path
$path = str_replace($base_url, '', $request_uri);

// echo "Requested URL: $request_uri<br>";
// echo "Base URL: $base_url<br>";
// echo "Path: $path<br>";


//routes system
switch ($path) {

    case '/migrate':
        require 'database.php';
        break;



    // راوتات المشرفين
    case '/admin/login':
        require __DIR__ . '/pages/admin/adminLogin.php';
        break;
    case '/admin/login-check':
        require __DIR__ . '/controllers/admin/login.php';
        break;
    case '/admin/logout':
        require __DIR__ . '/controllers/admin/logout.php';
        break;
    case '/admin/employees':
        require __DIR__ . '/pages/admin/employees/index.php';
        break;
    case '/admin/employees/create':
        require __DIR__ . '/pages/admin/employees/create.php';
        break;
    case '/admin/employees/store':
        require __DIR__ . '/controllers/admin/employees/store.php';
        break;
    case '/admin/employees/edit':
        require __DIR__ . '/pages/admin/employees/edit.php';
        break;
    case '/admin/employees/update':
        require __DIR__ . '/controllers/admin/employees/update.php';
    case '/admin/employees/destroy':
        require __DIR__ . '/controllers/admin/employees/destroy.php';

    case '/admin/tasks':
        require __DIR__ . '/pages/admin/tasks/index.php';
        break;
    case '/admin/tasks/create':
        require __DIR__ . '/pages/admin/tasks/create.php';
        break;
    case '/admin/tasks/store':
        require __DIR__ . '/controllers/admin/tasks/store.php';
        break;
    case '/admin/tasks/edit':
        require __DIR__ . '/pages/admin/tasks/edit.php';
        break;
    case '/admin/tasks/update':
        require __DIR__ . '/controllers/admin/tasks/update.php';
        break;
    case '/admin/tasks/destroy':
        require __DIR__ . '/controllers/admin/tasks/destroy.php';
        break;

    case '/admin':
        require __DIR__ . '/pages/admin/index.php';
        break;


    //راوتات الموظف
    case '/login':
        // require 'empLogin.php';
        require 'pages/login.php';
        break;
    case '/employee/login-check':
        require __DIR__ . '/controllers/employee/login.php';
    case '/employee/logout':
        require __DIR__ . '/controllers/employee/logout.php';
        break;
    case '/employee':
        require __DIR__ . '/pages/employee/index.php';
        break;
    case '/employee/tasks':
        require __DIR__ . '/pages/employee/tasks.php';
        break;


    // case '/general-login-check':
    //     require __DIR__ . ;
    //     break;

    default:
    
        require 'base.php';
        break;
}
