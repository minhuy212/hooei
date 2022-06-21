<?php
    include("../../config/config.php");
    $query_drink = mysqli_query($mysqli, "SELECT * FROM drink WHERE id_drink={$_GET['id']}");
    $row_drink = mysqli_fetch_array($query_drink);
?>
<tr>
    <th>CATEGORY</th>
    <td>
        <select class="input" name="category" id="">
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
        <input class="input" type="hidden" name="id" value="<?php echo $row_drink['id_drink']; ?>">
        <input class="input" type="file" name="image" placeholder="Drink image...">
    </td>
</tr>
<tr>
    <th>NAME</th>
    <td>
        <input class="input" type="text" name="name" value="<?php echo $row_drink['name']; ?>" placeholder="Drink name..." required>
    </td>
</tr>
<tr>
    <th>PRICE</th>
    <td>
        <input class="input" type="text" name="price" value="<?php echo $row_drink['price']; ?>" placeholder="Drink price..." required>
    </td>
</tr>
<tr>
    <th>DATE</th>
    <td>
        <input class="input" type="date" name="date" value="<?php echo $row_drink['date']; ?>" placeholder="Drink date..." required>
    </td>
</tr>
<tr>
    <th>SOLD</th>
    <td>
        <input class="input" type="number" name="sold" value="<?php echo $row_drink['sold']; ?>" placeholder="Drink sold..." required>
    </td>
</tr>
<tr>
    <td colspan="2">
        <input type="submit" name="add" class="input disabled" id="" value="ADD">
        <input type="submit" name="update" class="input" id="" value="UPDATE">
        <input type="submit" name="remove" class="input" id="" value="REMOVE">
    </td>
</tr>