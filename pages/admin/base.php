
<?php
// تمبليت لوحة تحكم المشرف 
session_start();
if(!isset($_SESSION['admin']))
{
     // اذا جلسة المشرف غير موجودة يحول على صفة الدخول
     header("Location: ".admin_url('/login'));
     exit();
}

// Determine the base URL based on the location of the included file
$base_url = '';
if (str_contains($request_uri, "employees/") || str_contains($request_uri, "tasks/") ) {
    $base_url = '../../';
}
elseif (str_contains($request_uri, "/admin/") ) {
    $base_url = '../';
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $title?></title>
            <link rel='stylesheet' href='<?php echo $base_url; ?>assets/css/style.css'>
            <link rel='stylesheet' href='<?php echo $base_url; ?>assets/css/styleclsses.css'>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="preconnect" href="https://fonts.googleapis.com" />
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
            <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&#038;display=swap" rel="stylesheet" />
    </head>
        <body>
            <div class="page d-flex">
                <?php include'includes/sidebar.php'?>
                <div class="content w-full">
                
                <?php include'includes/header.php'?>
                    <!-- <div class="masing-rong">
                        <span>rong</span>
                        <i class="fa-solid fa-exclamation"></i>
                    </div> -->

                    <!-- محتويات الصفحة  -->
                <?php echo $content?? 'no content found for this page'?>

            </div>
        </div>
    </body>
</html>