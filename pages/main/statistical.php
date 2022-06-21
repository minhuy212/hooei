<?php  
    include("config/config.php");

    date_default_timezone_set("Asia/Ho_Chi_Minh");
?>

<script>
    document.getElementById('main-cover').classList.add("statistical");
</script>

<div class="box-review">
    <div class="box">
        <i class="fa-solid fa-money-bill-trend-up"></i>
        <span>DAILY INCOME</span>
        <?php
            $sql_income = "SELECT * FROM bill WHERE CAST(date AS date)='".date('Y-m-d')."'";
            // echo $sql_income;
            $query = mysqli_query($mysqli, $sql_income);
            $sumTotal = 0; 
            while ($row = mysqli_fetch_array($query)) {
                $sumTotal += $row['total_price'];
            }
            echo "<span>".number_format($sumTotal, 0, ".", ",")."đ"."</span>";
        ?>
    </div>
    <div class="box">
        <i class="fa-solid fa-barcode"></i>
        <span>DAILY BILL</span>
        <?php
            $sql_income = "SELECT COUNT(id_bill) FROM bill WHERE CAST(date AS date)='".date('Y-m-d')."'";
            $query = mysqli_query($mysqli, $sql_income);
            $row = mysqli_fetch_array($query);
            echo "<span>".$row['COUNT(id_bill)']."</span>";
        ?>
    </div> 
    <!-- <div class="box">
        <i class="fa-solid fa-face-angry"></i>
        <span>DAILY COMPLAINT</span>
        <span>0</span>
    </div> -->
</div>

<div class="box-chart">
    <div class="chart best-type">
        <canvas id="myChart3" style=""></canvas>
    </div> 
    
    <div class="chart best-drink">
        <canvas id="myChart2" style=""></canvas>
    </div>  
</div>

<script>
    var yValues = [101000000, 234000000,156000000,132000000,123000000,415000000,156000000,156000000,116000000,236000000,654000000,145400000];
    var xValues = [1,2,3,5,6,7,8,9,10,11,12];
    
    new Chart("myChart3", {
    type: "line",
    data: {
        labels: xValues,
        datasets: [{
        fill: false,
        lineTension: 0,
        backgroundColor: "#34495e",
        borderColor: "#f092f2",
        data: yValues
        }]
    },
    options: {
        legend: {display: false}, 
        title: {
            display: true,
            text: "MONTHLY INCOME OF THE YEAR 2022"
        }
    }
    });
</script> 

<script>
    var xValues = ["Cà phê đen", "Trà đào cam sả", "Nước ép cam", "Cà phê Macchiato ", "Trà dâu"];
    var yValues = [987, 435, 240, 878, 569];
    var barColors = ["#fd79a8", "#e84393","#f092f2","#fab1a0","#FDA7DF"];

    new Chart("myChart2", {
    type: "doughnut",
    data: {
        labels: xValues,
        datasets: [{
        backgroundColor: barColors,
        data: yValues
        }]
    },
    options: {
        // legend: {display: false},
        title: {
        display: true,
        text: "TOP 5 OF DRINKS IN JULY 2022"
        }
    }
    });
</script> 
