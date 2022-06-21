<ul>
<?php
    include("../../config/config.php");

    if (isset($_GET['name'])) {
        $sql = "SELECT * FROM drink WHERE name LIKE N'%{$_GET['name']}%'";
        $query = mysqli_query($mysqli, $sql);
    }
    else if ($_GET['id'] != 0) {
        $query = mysqli_query($mysqli, "SELECT * FROM drink WHERE id_category={$_GET['id']}");
    }
    else {
        $query = mysqli_query($mysqli, "SELECT * FROM drink");
    }
    while ($row = mysqli_fetch_array($query)) {
?>
        <li>
            <div onclick="order(<?php echo $row['id_drink']; ?>)" class="drink">
                <div class="image">
                    <img src="img/drinks/<?php echo $row['image']; ?>" alt="">
                </div>
                <div class="name">
                    <span><b><?php echo $row['name']; ?></b></span> 
                </div>
            </div>
        </li>
<?php
    }
?>  
</ul>