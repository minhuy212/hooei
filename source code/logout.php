<?php
    session_start();
    
    unset($_SESSION['USERNAME']);
    unset($_SESSION['BILL']);  

    header("Location: index.php");
?>