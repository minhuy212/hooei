<?php 
    include("config/config.php");
?>

<div class="form-add">
    <div class="form-heading">
        <h2>DRINK</h2>
    </div>
    <!-- <form action=""> -->
        <table id="showDetailDrink">
            <tr>
                <th>CATEGORY</th>
                <td>
                    <select class="input" name="" id="category">
                        <?php
                            $query_category = mysqli_query($mysqli, "SELECT * FROM category");
                            while ($row_category = mysqli_fetch_array($query_category)) {
                        ?>
                            <option value="<?php echo $row_category['id_category']; ?>"><?php echo $row_category['name']; ?></option>
                        <?php
                            }
                        ?> 
                    </select>
                </td>
            </tr>
            <tr>
                <th>IMAGE</th>
                <td>
                    <input class="input" type="file" id="drinkimage" placeholder="Drink image...">
                </td>
            </tr>
            <tr>
                <th>NAME</th>
                <td>
                    <input class="input" type="text" id="drinkname" placeholder="Drink name...">
                </td>
            </tr>
            <tr>
                <th>PRICE</th>
                <td>
                    <input class="input" type="text" placeholder="Drink price...">
                </td>
            </tr>
            <tr>
                <th>DATE</th>
                <td>
                    <input class="input" type="date" placeholder="Drink date...">
                </td>
            </tr>
            <tr>
                <th>SOLD</th>
                <td>
                    <input class="input" type="number" placeholder="Drink sold...">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input onclick="addDrink()" type="submit" name="" class="input" id="" value="ADD">
                    <input type="submit" name="" class="input" id="" value="UPDATE">
                    <input type="submit" name="" class="input" id="" value="REMOVE">
                </td>
            </tr>
        </table>
    <!-- </form> -->
</div>

<div class="table-right">
    <div class="search-bar">
        <input type="text" class="input" placeholder="Search...">
    </div>
    <table id="manage_drinks">
        
    </table>
</div>

<script>
    function showManageDrinks() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("manage_drinks").innerHTML = this.responseText;
            } 
        };   
        var path = "pages/main/showmanagedrinks.php";
        xhttp.open("GET", path, true);
        xhttp.send();
    }
    showManageDrinks();

    function showDetailDrink(id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("showDetailDrink").innerHTML = this.responseText;
            } 
        };   
        var path = `pages/main/showdetaildrink.php?id=${id}`;
        xhttp.open("GET", path, true);
        xhttp.send();
    }

    function addDrink() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("manage_drinks").innerHTML = this.responseText;
            } 
        };   
        var category = document.getElementById('category').value; 
        var image = document.getElementById('drinkimage').value; 
        // alert(image);
        var path = "pages/main/updatedrinks.php?add";
        xhttp.open("GET", path, true);
        xhttp.send();
    }
</script>