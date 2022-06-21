<?php
    include("../../config/config.php");
    $query_drink = mysqli_query($mysqli, "SELECT * FROM drink WHERE id_drink={$_GET['id']}");
    $row_drink = mysqli_fetch_array($query_drink);
?>
<tr>
    <th>CATEGORY</th>
    <td>
        <select class="input" name="" id="">
            <?php
                $query_category = mysqli_query($mysqli, "SELECT * FROM category");
                while ($row_category = mysqli_fetch_array($query_category)) {
            ?>
                <option <?php if ($row_category['id_category'] == $row_drink['id_category']) echo "selected='selected'"; ?> value="<?php echo $row_category['id_category']; ?>"><?php echo $row_category['name']; ?></option>
            <?php
                }
            ?> 
        </select>
    </td>
</tr>
<tr>
    <th>IMAGE</th>
    <td>
        <input class="input" type="file" placeholder="Drink image...">
    </td>
</tr>
<tr>
    <th>NAME</th>
    <td>
        <input class="input" type="text" value="<?php echo $row_drink['name']; ?>" placeholder="Drink name...">
    </td>
</tr>
<tr>
    <th>PRICE</th>
    <td>
        <input class="input" type="text" value="<?php echo $row_drink['price']; ?>" placeholder="Drink price...">
    </td>
</tr>
<tr>
    <th>DATE</th>
    <td>
        <input class="input" type="date" value="<?php echo $row_drink['date']; ?>" placeholder="Drink date...">
    </td>
</tr>
<tr>
    <th>SOLD</th>
    <td>
        <input class="input" type="number" value="<?php echo $row_drink['sold']; ?>" placeholder="Drink sold...">
    </td>
</tr>
<tr>
    <td colspan="2">
        <input onclick="addDrink()" type="submit" name="" class="input" id="" value="ADD">
        <input type="submit" name="" class="input" id="" value="UPDATE">
        <input type="submit" name="" class="input" id="" value="REMOVE">
    </td>
</tr>