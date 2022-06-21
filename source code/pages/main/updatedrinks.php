<?php
    include("../../config/config.php");
    if (isset($_GET['add'])) {
        
    }
?>
<thead>
    <tr>
        <th style="text-align: center; width: 70px;">NO.</th>
        <th>IMAGE</th>
        <th style="text-align: left; width:  calc(100%/5);">NAME</th>
        <th style="text-align: left; width:  calc(100%/7);">CATEGORY</th>
        <th style="text-align: right; width:  calc(100%/6);">PRICE</th>
        <th style="text-align: center; width:  calc(100%/7);">DATE</th>
        <th style="text-align: center; width:  calc(100%/7);">SOLD</th>
        <th style="text-align: center; width:  calc(100%/7);">STATUS</th>
    </tr>
</thead>
<tbody>
    <?php 
        $query_drinks = mysqli_query($mysqli, "SELECT * FROM drink");
        $order = 0;
        while ($row_drinks = mysqli_fetch_array($query_drinks)) {
            $order++;
    ?>
            <tr onclick="showDetailDrink(<?php echo $row_drinks['id_drink']; ?>)">
                <td style="text-align: center; width: 70px;"><?php echo $order; ?></td>
                <td style="text-align: center; width: 150px;"><img src="./img/drinks/<?php echo $row_drinks['image']; ?>" alt=""></td>
                <td style="text-align: left; width:  calc(100%/5);"><?php echo $row_drinks['name']; ?></td> 
                <td style="text-align: center; width:  calc(100%/7);">
                    <?php
                        $query_get_category = mysqli_query($mysqli, "SELECT * FROM category WHERE id_category={$row_drinks['id_category']}");
                        $row_get_category = mysqli_fetch_array($query_get_category);
                        echo $row_get_category['name'];
                    ?>
                </td>
                <td style="text-align: right; width:  calc(100%/6);"><?php echo number_format($row_drinks['price'], 0, ".", ",")."đ"; ?></td>
                <td style="text-align: center; width:  calc(100%/7);"><?php echo $row_drinks['date']; ?></td>
                <td style="text-align: center; width:  calc(100%/7);"><?php echo $row_drinks['sold']; ?></td>
                <td style="text-align: center; width:  calc(100%/7);"><?php if ($row_drinks['status'] == 1) echo "Visible"; else echo "Hide"; ?></td>
            </tr>
    <?php
        }
    ?> 
</tbody>