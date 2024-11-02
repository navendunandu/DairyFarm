<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
$sql = "
    SELECT MONTH(booking_date) AS month, SUM(booking_amount) AS total_sales 
    FROM tbl_booking 
    WHERE YEAR(booking_date) = YEAR(CURDATE())
    GROUP BY MONTH(booking_date)
    ORDER BY month;
";

$result = $con->query($sql);

$sales_data = [];
$months = range(1, 12);

// Initialize sales_data with 0 for each month
foreach ($months as $month) {
    $sales_data[$month] = 0;
}

// Populate sales_data with actual sales amounts
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sales_data[$row['month']] = $row['total_sales'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Sales Bar Graph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<canvas id="salesChart"></canvas>

<script>
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    const salesData = <?php echo json_encode(array_values($sales_data)); ?>;
    const months = <?php echo json_encode(array_keys($sales_data)); ?>;
    
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months.map(month => monthNames[month - 1]),
            datasets: [{
                label: 'Sales Amount',
                data: salesData,
                backgroundColor: 'rgba(40, 167, 69, 0.7)',  // Bootstrap "success" green
                borderColor: 'rgba(255, 193, 7, 1)',        // Bootstrap "warning" yellow
                borderWidth: 2,
                hoverBackgroundColor: 'rgba(40, 167, 69, 1)',  // Darker green on hover
                hoverBorderColor: 'rgba(255, 193, 7, 1)',     // Yellow border remains on hover
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: 'rgba(40, 167, 69, 1)',   // Y-axis text color in green
                    },
                    grid: {
                        color: 'rgba(255, 193, 7, 0.2)'   // Lighter yellow grid lines
                    }
                },
                x: {
                    ticks: {
                        color: 'rgba(255, 193, 7, 1)',   // X-axis text color in yellow
                    },
                    grid: {
                        color: 'rgba(40, 167, 69, 0.2)'   // Lighter green grid lines
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: 'rgba(40, 167, 69, 1)'    // Legend text color in green
                    }
                }
            }
        }
    });
</script>


</body>
</html>
<?php
            include("Foot.php");
            ob_flush();
            ?>
