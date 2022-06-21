<?php
    session_start();

    include("../../config/config.php");
    
    if (isset($_GET['update'])) { 
        if (isset($_SESSION['BILL'])) {
            for ($i = 0 ; $i < sizeof($_SESSION['BILL']) ; $i++) {
                if ($_SESSION['BILL'][$i]['id_info'] == $_GET['id']) {
                    if ($_GET['quantity'] != 0) {
                        $_SESSION['BILL'][$i]['amount'] = $_GET['quantity'];
                    }
                    else {
                        unset($_SESSION['BILL'][$i]);
                        $_SESSION['BILL'] = array_values($_SESSION['BILL']);
                    }
                    break;    
                }
            }
        }
    }
    else if (isset($_GET['delete'])) {
        unset($_SESSION['BILL']); 
    }
    else {
        $sql_account = "SELECT * FROM account WHERE username='{$_SESSION['USERNAME']}'";
        $query_account = mysqli_query($mysqli, $sql_account);
        $row_account = mysqli_fetch_array($query_account);

        $price = 0;
        for ($i=0; $i < sizeof($_SESSION['BILL']); $i++) { 
            $price += $_SESSION['BILL'][$i]['price'];
        }
        $discount = 0; 
        $total_price = $price -  $price*(0 /100);
        
        $sql = "INSERT INTO bill(id_account, date, price, discount, total_price) VALUES ({$row_account['id_account']}, CURRENT_TIMESTAMP(), {$price}, {$discount}, {$total_price})"; 
        $query = mysqli_query($mysqli, $sql);

        if ($query) {
            $sql_max = "SELECT MAX(id_bill) FROM bill";
            $query_max = mysqli_query($mysqli, $sql_max);
            $row = mysqli_fetch_array($query_max);  

            for ($i = 0 ; $i < sizeof($_SESSION['BILL']); $i++) {
                $sql_detail = "INSERT INTO bill_info(id_bill_info, id_bill, id_drink, quantity, note) VALUES({$_SESSION['BILL'][$i]['id_info']}, {$row['MAX(id_bill)']}, '{$_SESSION['BILL'][$i]['id']}', '{$_SESSION['BILL'][$i]['amount']}', '{$_SESSION['BILL'][$i]['note']}')"; 
                $query_detail = mysqli_query($mysqli, $sql_detail);
                
                $sql_update = "UPDATE drink SET sold = sold + {$_SESSION['BILL'][$i]['amount']} WHERE id_drink={$_SESSION['BILL'][$i]['id']}";
                $query_update = mysqli_query($mysqli, $sql_update);
                
                // echo $sql_detail;
            } 
            
            unset($_SESSION['BILL']); 
        }
    }
?>

<div class="bill-heading">
    <h2>BILL DETAIL</h2>
    <div class="account-bill-info">
        
        <h2>Date: 
            <?php
                // date_default_timezone_set("Asia/Ho_Chi_Minh");
                // echo date("Y/m/d")." ".date("H:i:s"); 
                date_default_timezone_set("Asia/Ho_Chi_Minh");
                echo date("Y/m/d"); 
            ?>
            </h2>
        <h2>Staff: 
            <?php
                $query = mysqli_query($mysqli, "SELECT * FROM account WHERE username='{$_SESSION['USERNAME']}'");
                $row = mysqli_fetch_array($query);
                echo $row['firstname']." ".$row['lastname']; 
            ?>
        </h2>
    </div>
</div>
<div class="bill-info">
    <table>
        <thead>
            <th style="width: 50%">NAME</th>
            <th style="width: 30%; text-align:center">QUANTITY</th>
            <th style="width: 20%; text-align:right">PRICE</th>
        </thead>
        <tbody>
            <?php
                $total = 0;
                if (isset($_SESSION['BILL'])) {
                    for ($i = 0 ; $i < sizeof($_SESSION['BILL']) ; $i++) {  
                        $total += $_SESSION['BILL'][$i]['price'] * $_SESSION['BILL'][$i]['amount'];
            ?>
                        <tr>
                            <td style="max-width: 50%; text-align:left"><?php echo $i + 1; ?>. <?php echo $_SESSION['BILL'][$i]['name']; ?> <?php if ($_SESSION['BILL'][$i]['note'] != '') echo "- (".$_SESSION['BILL'][$i]['note'].")"; ?></td>
                            <td style="text-align:center">
                                <input type="number" onchange="updateBill('update', <?php echo $_SESSION['BILL'][$i]['id_info']; ?>)" name="" class="quantity" id="<?php echo $_SESSION['BILL'][$i]['id_info']; ?>" min="1" value="<?php echo $_SESSION['BILL'][$i]['amount']; ?>">
                            </td>
                            
                            <td style="text-align:right"><?php echo number_format($_SESSION['BILL'][$i]['price'], 0, ".", ",")."đ"; ?></td>
                        </tr>
            <?php
                    }
                }
            ?>
        </tbody>
    </table>
</div>
<div class="bill-footing">
    <span>PRICE: <h4 id="price"><?php echo number_format($total, 0, ".", ",")."đ"; ?></h4></span>
    <span>DISCOUNT: -<h4 id="discount">0%</h4></span>
    <span>TOTAL PRICE: <h4 id="total"><?php $total -= $total * (0 /100); echo number_format($total, 0, ".", ",")."đ"; ?></h4></span>
</div>
<div class="button-pay">
    <button onclick="updateBill('delete', -1)" id="delete">DELETE</button>
    <!-- <button id="update">UPDATE</button> -->
    <button  onclick="updateBill('pay', -1)" id="pay">PAY</button>
</div>