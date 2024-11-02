<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");

$xValues = [];
$yValues = [];

// Fetch category names
$selX = "SELECT * FROM tbl_deliveryagent";
$resX = $con->query($selX);
while ($dataX = $resX->fetch_assoc()) {
    $xValues[] = $dataX['deliveryagent_name'];

    // Fetch count of items in cart per category
    $selY = "SELECT COUNT(*) as count 
             FROM tbl_cart c 
             INNER JOIN tbl_booking b on b.booking_ID=c.booking_ID WHERE b.deliveryagent_ID=".$dataX['deliveryagent_ID'];
    $resY = $con->query($selY);
    $dataY = $resY->fetch_assoc();
    $yValues[] = $dataY['count'];
}

// Encode PHP arrays to JSON for use in JavaScript
$xValuesJson = json_encode($xValues);
$yValuesJson = json_encode($yValues);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pie Chart of deliveryagent</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Adjust canvas size */
        #myPieChart {
            max-width: 600px;
            max-height: 600px;
        }
        .chart-box{
            display: flex;
            align-items: center;
            flex-direction:column;
        }
    </style>
</head>

<body>
<div class="container mt-5">
    <div class="chart-box p-4 bg-success text-white rounded shadow-lg">
        <h1 class="text-center text-warning mb-4">Delivery Agent Order Acceptance Rate</h1>
        <canvas id="myPieChart" width="400" height="400"></canvas>
    </div>
</div>

<script>
    // Function to generate pastel shades of green and yellow
    function generateGreenYellowColorPalettes(numColors) {
        const fillColors = [];
        const borderColors = [];
        
        // Predefined green and yellow hue ranges in HSL
        const hues = [60, 120]; // 60 for yellow, 120 for green
        const colorStep = hues.length / numColors;

        for (let i = 0; i < numColors; i++) {
            const hue = hues[Math.floor(i * colorStep)];
            
            // Adjust saturation and lightness for pastel effect
            const saturation = 50 + Math.random() * 20; // Adjust the saturation range
            const lightness = 65 + Math.random() * 15;  // Lightness for pastel effect

            const fillColor = `hsla(${hue}, ${saturation}%, ${lightness}%, 0.7)`;  // 0.7 for fill transparency
            const borderColor = `hsla(${hue}, ${saturation}%, ${lightness}%, 1)`;  // Full color for border

            fillColors.push(fillColor);
            borderColors.push(borderColor);
        }

        return { fillColors, borderColors };
    }

    // Retrieve JSON-encoded data from PHP (these variables will be replaced by your PHP backend)
    const xValues = <?php echo $xValuesJson; ?>; // Example: ['Accepted', 'Rejected']
    const yValues = <?php echo $yValuesJson; ?>; // Example: [75, 25]

    // Generate green and yellow color palette for the pie chart
    const { fillColors, borderColors } = generateGreenYellowColorPalettes(xValues.length);

    // Create the pie chart
    const ctx = document.getElementById('myPieChart').getContext('2d');
    const myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: xValues, // Categories
            datasets: [{
                data: yValues, // Counts
                backgroundColor: fillColors, // Green and yellow fill colors
                borderColor: borderColors,  // Green and yellow border colors
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        color: 'white' // Legend text color
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });
</script>

<!-- Bootstrap CSS & JS (Include in the <head> or before closing </body> tag) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>
