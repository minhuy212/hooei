<div id="main" class="main">
    <?php
        include("pages/main/header.php");
    ?>
 
    <div id="main-cover" class="main-cover">

        <?php
            if (isset($_GET['statistical'])) {
                include("pages/main/statistical.php");
                // die();
            }
            else if (isset($_GET['drinks'])) {
                include("pages/main/drinks.php");
            }
            else if (isset($_GET['category'])) {
                include("pages/main/category.php");
            }
            else if (isset($_GET['bills'])) {
                include("pages/main/bills.php");
            }
            else if (isset($_GET['accounts'])) {
                include("pages/main/accounts.php");
            }
            else {
                include("pages/main/menu.php");
                // die();
            }
        ?>
        
    </div> 
</div>


