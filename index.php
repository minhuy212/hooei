<?php
    session_start();
    if (!isset($_SESSION['USERNAME'])) {
        header("Location: signin.php");
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <title>hooei's Coffee</title>
</head>
<body class="main__page">
    <?php
        include("pages/sidebar.php");
        include("pages/main.php");
    ?> 

    <!-- <div class="mymodal" id="mymodal">
        <div onclick="quitModal()" class="modal-layer" id="overlay"></div>
        <div class="modal-body"> 
            <div class="choices">
                <div class="choice size">
                    <span class="size-head ">CHOOSE SIZE (REQUIRED)</span>
                    <div class="chooses">
                        <div class="choose">
                                
                            <input type="radio" name="size" id="sizeM" checked>
                            <label for="sizeM">M + 0đ</label> 
                        </div>
                         
                        <div class="choose">
                            <input type="radio" name="size" id="sizeL">
                            <label for="sizeL">L + 10.000đ</label> 
                        </div>
                    </div>
                </div>
                <div class="choice ice">
                    <span class="size-head ">CHOOSE ICE (REQUIRED)</span>
                    <div class="chooses">
                        <div class="choose">
                            <input type="radio" name="ice" id="ice0" checked>
                            <label for="ice0">0%</label> 
                        </div>
                         
                        <div class="choose">
                            <input type="radio" name="ice" id="ice25">
                            <label for="ice25">25%</label> 
                        </div>
                        <div class="choose">
                            <input type="radio" name="ice" id="ice50">
                            <label for="ice50">50%</label> 
                        </div>
                        <div class="choose">
                            <input type="radio" name="ice" id="ice75">
                            <label for="ice75">75%</label> 
                        </div>
                        <div class="choose">
                            <input type="radio" name="ice" id="ice100" checked>
                            <label for="ice100">100%</label> 
                        </div>
                    </div>
                </div>

                <div class="choice sugar">
                    <span class="size-head ">CHOOSE SUGAR (REQUIRED)</span>
                    <div class="chooses">
                        <div class="choose">
                                
                            <input type="radio" name="sugar" id="sg0" checked>
                            <label for="sg0">0%</label> 
                        </div>
                         
                        <div class="choose">
                            <input type="radio" name="sugar" id="sg25">
                            <label for="sg25">25%</label> 
                        </div>
                        <div class="choose">
                            <input type="radio" name="sugar" id="sg50">
                            <label for="sg50">50%</label> 
                        </div>
                        <div class="choose">
                            <input type="radio" name="sugar" id="sg75">
                            <label for="sg75">75%</label> 
                        </div>
                        <div class="choose">
                            <input type="radio" name="sugar" id="sg100" checked>
                            <label for="sg100">100%</label> 
                        </div>
                    </div>
                </div>

                <div class="choice topping">
                    <span class="size-head ">CHOOSE TOPPING (OPTIONAL)</span>
                    <div class="chooses">
                        <table>
                            <tr>
                                <th>Trân châu đen (+ 7.000đ)</th>
                                <td><input type="number" name="bboba" id="" value="0" min="0"></td>
                            </tr>
                            <tr>
                                <th>Trân châu trắng (+ 7.000đ)</th>
                                <td><input type="number" name="wboba" id="" value="0" min="0"></td>
                            </tr>
                            <tr>
                                <th>Kem phô mai (+ 7.000đ)</th>
                                <td><input type="number" name="cheese" id="" value="0" min="0"></td>
                            </tr>
                            <tr>
                                <th>Đào ngâm (+ 7.000đ)</th>
                                <td><input type="number" name="peach" id="" value="0" min="0"></td>
                            </tr>
                            <tr>
                                <th>Vải ngâm (+ 7.000đ)</th>
                                <td><input type="number" name="lychee" id="" value="0" min="0"></td>
                            </tr>
                            <tr>
                                <th>Nhãn ngâm (+ 7.000đ)</th>
                                <td><input type="number" name="logan" id="" value="0" min="0"></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="choices-footing">
                    <h3>Total: 30.000đ</h3>
                </div>

                <div class="add-button">
                    <button type="submit" class="">ADD DRINK</button>
                </div>
            </div>
        </div>
    </div>     -->

    <!-- <script>
        function quitModal() {
            document.getElementById("mymodal").classList.toggle('active');
        }
    </script> -->
</body>
</html>