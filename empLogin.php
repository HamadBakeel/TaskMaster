<?php 
session_start();
if(isset($_SESSION['employee']))
{
     // Redirect back to login page
     header("Location: ".employee_url(null));
     exit();
}

?>
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <?php echo "<link rel='stylesheet' href='assets/css/emplogin.css'>" ?>
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
                        <h1>Login As Employee</h1>
                    </div>
                    <div class="form">
                        <form action="<?php echo employee_url('/login-check'); ?>" method="post">
                            <input type="text" name="name" placeholder="Name" id="email" />
                            <input type="password" name="password" placeholder="Password" id="password" />
                            <button>Login</button>
                        </form>

                        <?php
                        // Check if there's an error message in the session
                        if (isset($_SESSION['error'])) {
                            // Display the error message
                            echo "<span>" . $_SESSION['error'] . "</span>";
                            // Clear the error message from the session
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