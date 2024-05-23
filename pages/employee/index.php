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
    <?php echo "<link rel='stylesheet' href='assets/css/style.css'>" ?>
    <?php echo "<link rel='stylesheet' href='assets/css/styleclsses.css'>" ?>
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
            <!-- <div class="" style="width: 40%">
                <canvas id="myChart"></canvas>
            </div> -->
            <div style="width: 60%; margin: 20px auto">
                <canvas id="myChart2"></canvas>
            </div>
        </div>
    </div>

    <div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php 
$jsonData = json_encode([$incompeletdTasks, $compeletdTasks]);
?>
    <script>
        const ctx = document.getElementById('myChart');
        const ctx2 = document.getElementById('myChart2');

        const data = {
            labels: [
                'Incompeleted',
                'Compeleted',
                // 'متوقفة',
                // 'ملغاه',
            ],
            datasets: [{
                label: 'tasks',
                data:  <?php echo $jsonData; ?>,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(75, 192, 192)',
                    // 'rgb(255, 205, 86)',
                    // 'rgb(201, 203, 207)'
                ]
            }]
        };
        const config = {
            type: 'polarArea',
            data: data,
            options: {}
        };

        new Chart(ctx2, config)
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>

</html>