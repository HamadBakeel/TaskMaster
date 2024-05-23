<?php
session_start();
if (!isset($_SESSION['employee'])) {
    // Redirect back to login page
    header("Location: " . dirname($_SERVER['SCRIPT_NAME']) . '/login');
    exit();
}
include 'controllers/employee/profile.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php echo "<link rel='stylesheet' href='../assets/css/style.css'>" ?>
    <?php echo "<link rel='stylesheet' href='../assets/css/styleclsses.css'>" ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&#038;display=swap" rel="stylesheet" />
    <style>
        .baoc {
            flex-direction: row-reverse;
        }

        .cb-black {
            color: #000;
            border: 1px solid #ccc;
            margin-inline: 5px;
            border-radius: 10px;
            padding: 5px 10px;
            font: bold;
            font-weight: bold;
        }

        .cb-black.logout {
            color: #ffffff;
            background-color: #fe5f71;
        }

        .icon-t {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="page d-flex">
        <div class="content w-full">
        <div class="baoc head bg-white p-15 between-flex">
                <div class="icons d-flex align-center">
                    <span class="notification p-relative">
                        <?php echo  $_SESSION['employee']['name']; ?>
                    </span>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNL_ZnOTpXSvhf1UaK7beHey2BX42U6solRA&usqp=CAU" alt="">
                </div>
                <div>
                    <span class="notification p-relative">
                        <a class="cb-black logout" href="<?php echo employee_url('/logout'); ?>">
                            <i class="c-white icon-t fa-solid fa-right-from-bracket" style="transform: rotate(180deg);"></i>
                            logout
                        </a>
                    </span>
                    <span class="notification p-relative">
                        <a class="cb-black" href="<?php echo employee_url('/tasks'); ?>">
                            <i class=" icon-t fa-solid fa-list"></i>
                            tasks
                        </a>
                    </span>
                    <span class="notification p-relative">
                        <a class="cb-black" href="<?php echo employee_url(''); ?>">
                            <i class=" icon-t fa-solid fa-home"></i>
                            home
                        </a>
                    </span>
                </div>
            </div>
            <div class="wrapper d-grid">
                <div class="responsiv-tabl">
                    <table>
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>Title</td>
                                <td>Details </td>
                                <td>Status</td>
                                <td>Deadline</td>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($tasks as $task) { ?>
                                <tr>
                                    <td><?php echo $task['id']; ?></td>
                                    <td><?php echo $task['title']; ?></td>
                                    <td><?php echo $task['details']; ?></td>
                                    <td><?php echo $task['status'] === 0 ? 'Incompleted' : 'Completed'; ?></td>
                                    <td><?php echo $task['end_date']; ?></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>