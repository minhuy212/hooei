<?php 
    include("config/config.php");

    date_default_timezone_set("Asia/Ho_Chi_Minh");
    
    if (isset($_POST['submit'])) {
        $query = mysqli_query($mysqli, "SELECT * FROM drink WHERE id_drink={$_POST['id']}");
        $row = mysqli_fetch_array($query);
        if ($row) {
            $new_drink = array(array('id_info' => date("Ymd").date(His).$row['id_drink'], 'id' => $row['id_drink'], 'name' => $row['name'], 'price' => $row['price'], 'amount' => $_POST['quantity'], 'note' => $_POST['note']));
            if (isset($_SESSION['BILL'])) {
                $found = 0;
                // for ($i = 0 ; $i < sizeof($_SESSION['BILL']) ; $i++) {
                //     if ($_SESSION['BILL'][$i]['id'] == $_POST['id']) { 
                //         $_SESSION['BILL'][$i]['amount'] = $_POST['quantity'] + $_SESSION['BILL'][$i]['amount'];
                //         $found = 1;
                //         break;
                //     }
                // }
                if ($found == 0) {
                    array_push($_SESSION['BILL'], array('id_info' => date("Ymd").date(His).$row['id_drink'], 'id' => $row['id_drink'], 'name' => $row['name'], 'price' => $row['price'], 'amount' => $_POST['quantity'], 'note' => $_POST['note']));
                }
            }
            else {
                $_SESSION['BILL'] = $new_drink;
            } 
            header("Location: index.php");
            // unset($_SESSION['BILL']); 
        }
        // print_r($_SESSION['BILL']);
    }
?>
<div id="bill-detail" class="bill-detail">
    
</div>
<div class="drinks">
    <div class="tab">
        <div class="tabs">
            <button onclick="showDrink(0)" id="0" class="tabLinks active">All</button>
            <?php
                
                $query = mysqli_query($mysqli, "SELECT * FROM category");
                while ($row = mysqli_fetch_array($query)) {
            ?>
                <button onclick="showDrink(<?php echo $row['id_category']; ?>)" id="<?php echo $row['id_category']; ?>" class="tabLinks"><?php echo $row['name']; ?></button>  
            <?php
                }
            ?>
        </div>  
        <div class="tab-search">
            <input onkeyup="showSearchDrink()" type="text" class="search" id="search-bar" placeholder="Search...">
        </div>
    </div>

    <div id="tab-content" class="tab-content">
        
    </div>
</div>  

<script>
    function updateBill(type, id, price, discount, total) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("bill-detail").innerHTML = this.responseText;
            } 
        };    
        var path = "";
        if (type == 'update') {
            var quantity = document.getElementById(id).value; 
            path = `pages/main/updatebill.php?${type}&id=${id}&quantity=${quantity}`;
        }
        else if (type == 'delete') {
            path = `pages/main/updatebill.php?${type}`;
        }
        else {
            var price = document.getElementById('price').innerHTML;
            var discount = document.getElementById('discount').innerHTML;
            var total = document.getElementById('total').innerHTML;
            path = `pages/main/updatebill.php?${type}&price=${price}&discount=${discount}&total=${total}`;
        }
        xhttp.open("GET", path, true);
        xhttp.send();
    }
    updateBill('update', 0);

    function showDrink(id) {
        var i, tablinks;
        tablinks = document.getElementsByClassName("tabLinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove('active');
        }  
        document.getElementById(id).classList.add('active');
          
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tab-content").innerHTML = this.responseText;
            } 
        };    
        var path = `pages/main/showdrinks.php?id=${id}`;
        xhttp.open("GET", path, true);
        xhttp.send(); 
    }
    showDrink(0); 

    function showSearchDrink() {  
        var i, tablinks;
        tablinks = document.getElementsByClassName("tabLinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove('active');
        }  
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tab-content").innerHTML = this.responseText;
            } 
        };    
        var name = document.getElementById('search-bar').value;
        // alert(name);
        var path = `pages/main/showdrinks.php?name=${name}`;
        xhttp.open("GET", path, true);
        xhttp.send(); 
    }
    
    function order(id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tab-content").innerHTML = this.responseText;
            } 
        };    
        var path = `pages/main/orderdrink.php?id=${id}`;
        xhttp.open("GET", path, true);
        xhttp.send(); 
    }

</script>