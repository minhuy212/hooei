<?php
    include("../../config/config.php");
    $query = mysqli_query($mysqli, "SELECT * FROM drink WHERE id_drink={$_GET['id']}");
    $row = mysqli_fetch_array($query);

?>

<div class="detail">
    
    <div class="drink-img">
        <img src="img/drinks/<?php echo $row['image']; ?>" alt="">
        <div class="choices-footing">
            <h3><?php echo $row['name']; ?></h3>
        </div>
        <div class="price">
            <h3>Price: <?php echo number_format($row['price'], 0, ".", ",")."đ"; ?></h3>
        </div>
    </div>
    <div class="choices">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="choice size">
                <span class="size-head ">CHOOSE QUANTITY (REQUIRED)</span>
                <div class="chooses">
                    <div class="choose">
                        <input type="hidden" name="id" value="<?php echo $row['id_drink']; ?>">
                        <input type="number" name="quantity" id="quantity" min="1" value="1"> 
                    </div> 
                </div>
            </div>
            <div class="choice ice">
                <span class="size-head ">NOTE</span>
                <div class="chooses">
                    <div class="choose">
                        <textarea name="note" id="note" cols="30" rows="10"></textarea>
                    </div> 
                </div>
            </div> 

            <div class="add-button">
                <button type="submit" name="submit" class="">ADD DRINK</button>
            </div>
        </form>
    </div> 
</div>
