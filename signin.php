<?php
    session_start();
    if (isset($_SESSION['USERNAME'])) {
        header("Location: index.php");
        die();
    }

    include("config/config.php");

    $msgUsername = "<span class='error-msg'></span>";
    $msgPassword = "<span class='error-msg'></span>";

    if (isset($_POST['submit'])) {
        if (strlen($_POST['password']) < 8) {
            $msgPassword = "<span class='error-msg'>Password is too short! (< 8)</span>";
        }
        else {
            $query = mysqli_query($mysqli, "SELECT * FROM account WHERE username='{$_POST['username']}' LIMIT 1"); 
            if (!mysqli_num_rows($query)) {
                $msgUsername = "<span class='error-msg'>Invalid username!</span>";
            }
            else {
                $row = mysqli_fetch_array($query);
                if ($row['password'] == md5($_POST['password'])) {
                    $_SESSION['USERNAME'] = $row['username'];
                    header("Location: index.php");
                }
                else {
                    $msgPassword = "<span class='error-msg'>Invalid password!</span>";
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">  
    <title>Sign in hooei's Coffee</title>
</head>
<body class="sign-in__page">
    <div class="form">
        <div class="form-left">
            <h1>hooei's <br>Coffee</h1>
            <p>
                Make you happy with hooei's Coffee.
            </p>
        </div>

        <div class="form-right">
            <h5>Sign in</h5>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="inputs">
                    <div class="input">
                        <input type="text" name="username" id="username" class="username" placeholder="Username" required> 
                        <?php
                            echo $msgUsername;
                        ?>
                    </div>
                    <br> 
                    <div class="input">
                        <input type="password" name="password" id="password" class="password" placeholder="Password" required>
                        <?php
                            echo $msgPassword;
                        ?>
                    </div>
                    <br><br>
                </div>
                <div class="button">
                    <button name="submit" class="sign-in_button">Sign in</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>