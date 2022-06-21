<?php
    include("../../config/config.php");
    
    date_default_timezone_set("Asia/Ho_Chi_Minh");

    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $date = "";
        $sold = 0;
        $image = $_FILES["image"]["name"];
        $image_tmp = $_FILES["image"]["tmp_name"];
        $image = time().'_'.$image;

        move_uploaded_file($image_tmp, '../../img/drinks/'.$image);
        $sql_them = "INSERT INTO drink(id_category, image, name, price, sold, date, status) VALUES ({$category}, '{$image}', '{$name}', {$price}, {$sold}, CURRENT_TIMESTAMP(), 1)";
        mysqli_query($mysqli, $sql_them); 
        header("Location: ../../index.php?drinks");
    }
    else if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $date = $_POST['date'];
        $sold = $_POST['sold'];
        $image = $_FILES["image"]["name"];
        $image_tmp = $_FILES["image"]["tmp_name"]; 

        if ($image != '') {
            $image = time().'_'.$image;
            move_uploaded_file($image_tmp, '../../img/drinks/'.$image);
            $sql = "SELECT * FROM drink WHERE id_drink=".$_POST["id"];
            $query = mysqli_query($mysqli, $sql);
            while ($row = mysqli_fetch_array($query)) {
                unlink('../../img/drinks/'.$row["image"]);
            }

            $sql_capnhat = "UPDATE drink SET id_category={$category}, image='{$image}', name ='{$name}', price={$price}, sold={$sold}, date='{$date}' WHERE id_drink={$_POST['id']}";
            
            
        }
        else {
            $sql_capnhat = "UPDATE drink SET id_category={$category}, name ='{$name}', price={$price}, sold={$sold}, date='{$date}' WHERE id_drink={$_POST['id']}";
        }
        mysqli_query($mysqli, $sql_capnhat);
        header("Location: ../../index.php?drinks");
    }
    else {
        $sql = "SELECT * FROM drink WHERE id_drink=".$_POST["id"]." LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('../../img/drinks/'.$row["image"]);
        }
        $sql_xoa = "DELETE FROM drink WHERE id_drink=".$_POST["id"];
        mysqli_query($mysqli, $sql_xoa);
        header("Location: ../../index.php?drinks");
    }
?>