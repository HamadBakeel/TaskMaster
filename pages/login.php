<?php
session_start();
if(isset($_SESSION['employee'])) {
    header("Location: ".employee_url(null));
    exit();
}
if(isset($_SESSION['admin'])) {
    header("Location: ".admin_url(null));
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure your database connection $conn is set
    // $conn = new PDO(...);

    $name = $_POST['name'];
    $password = $_POST['password'];

    // Function to validate user credentials in a given table
    function validateUser($username, $password, $pdo, $table) {
        $stmt = $pdo->prepare("SELECT * FROM {$table} WHERE name = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }

    // First, try to validate as an employee
    $user = validateUser($name, $password, $conn, 'employees');
    if ($user) {
        $_SESSION['employee'] = $user;
        header("Location: " . employee_url(null));
        exit();
    }

    // If not an employee, try to validate as an admin
    $user = validateUser($name, $password, $conn, 'admins');
    if ($user) {
        $_SESSION['admin'] = $user;
        header("Location: " . admin_url(null));
        exit();
    }

    // If neither, set an error message
    $_SESSION['error'] = "Invalid username or password";
    header("Location: " . "/smart/login");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel='stylesheet' href='assets/css/emplogin.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&#038;display=swap" rel="stylesheet" />
</head>
<body>
    <div class="page d-flex">
        <div class="content w-full">
            <div class="container">
                <div class="card">
                    <div class="card_title">
                        <h1>Login</h1>
                    </div>
                    <div class="form">
                        <form action="" method="post">
                            <input type="text" name="name" placeholder="Name" id="email" />
                            <input type="password" name="password" placeholder="Password" id="password" />
                            <button>Login</button>
                        </form>

                        <?php
                        if (isset($_SESSION['error'])) {
                            echo "<span>" . $_SESSION['error'] . "</span>";
                            unset($_SESSION['error']);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
