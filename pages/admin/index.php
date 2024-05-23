<?php

// Set the page title
$title = "Dashboard";

include 'controllers/admin/home.php';
// Start output buffering
ob_start();
?>

<!-- content start -------------------------------------------- -->

<div style="display: flex;">
  <div style="margin: auto; width: 60%">
    <canvas id="myChart"></canvas>
  </div>
  
  <div style="margin: auto; width: 40%">
    <h2 style="text-align: center">Most Achieving Employees</h2>
    <canvas id="myChart2"></canvas>
  </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const data = <?php echo $jsonData; ?>;
</script>

<script> 

// const data = {
//   labels: [
//     'سمير',
//     'علي',
//     'طارق'
//   ],
//   datasets: [{
//     label: 'Most Achieving Employees',
//     data: [300, 50, 100],
//     backgroundColor: [
//       'rgb(255, 99, 132)',
//       'rgb(54, 162, 235)',
//       'rgb(255, 205, 86)'
//     ],
//     hoverOffset: 4
//   }]
// };
const config = {
  type: 'doughnut',
  data: data,
};

new Chart (document.getElementById('myChart2'), config)

  const totalCounts = <?php echo json_encode($totalCounts); ?>;
  console.log(totalCounts);
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Tasks', 'Completed tasks', 'Unfinished tasks', 'Employees'],
      datasets: [{
        label: 'Smart Work Management',
        data: totalCounts,
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



<!-- content end -------------------------------------------- -->

<?php
// Get the content from the output buffer
$content = ob_get_clean();

// Include the main layout file
include 'pages/admin/base.php';
?>