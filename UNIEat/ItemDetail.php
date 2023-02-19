<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Detail</title>

   <?php require_once('links.php') ?>
    <script src="register.js"></script>
</head>
<body style="background-color: rgb(242,236,236);"> 
    <?php
        require_once('navbar.php');
    ?>
        
    <div class="w-50 container" style="height: 800px"> 

        <?php
            echo"
            <div class='w-100 h-75 shop flex justify-content-center' style='margin-top:10px; background-color: white; padding : 40px 40px'>
                <form method='post' action='process_addcart.php' id='add-form'>
                <div class='d-flex flex-column bd-highlight mb-3' style =' align-items: center; '>
                ";
            require('mysql.php');
            $id = $_GET["product"];
            $result = $con->query("SELECT * FROM `Product` WHERE ProductID = '$id'");

            while ($row = $result->fetch_assoc()) {
                $pic = $row["ProductPicture"];
                $name = $row["ProductName"];
                $desc = $row["ProductDescription"];

                echo"
                     <div><img src ='$pic' class='align-middle'></div>
                    <div class='p-2 bd-highlight' style='margin-top:10px;'>$name</div>
                </div>

                <div class='d-flex flex-column' style =' align-items: left; padding : 10px'>
                     <div class = 'description' style =' font-size: 12px'>$desc</div>
                     <div class='note form-group'>
                        <label for='notes' style='margin-bottom:7px; margin-top:20px;'>Notes</label>
                        <input type='text' class='note form-control' id='notes' name='note' placeholder='Optional : add your request'>
                    </div>
                </div>
                ";
            }
            echo"
                <div class='w-100 d-flex justify-content-center' style='margin-top:20px'>
                    <div class='col-lg-2 quantity-button'>
                        <div class='input-group'>
                            <span class='input-group-btn'>
                                <button type='button' id='btn-min' class='quantity-left-minus btn btn-number btn-warning'  data-type='minus' data-field='>
                                    <span class='glyphicon glyphicon-minus'>-</span>
                                </button>
                            </span>
                        
                            <input type='text' id='quantity' name='quantity' class='form-control input-number' value='1' min='1' max='100'>
                        
                            <span class='input-group-btn'>
                                <button type='button' id='btn-plus' class='quantity-right-plus btn btn-number btn-warning' data-type='plus' data-field='>
                                    <span class='glyphicon glyphicon-plus'>+</span>
                                </button>
                            </span>
                            <script>
                                $('#btn-plus').click(() => {
                                    $('#quantity').val(parseInt($('#quantity').val()) + 1);
                                });
                                $('#btn-min').click(() => {
                                    $('#quantity').val(parseInt($('#quantity').val()) - 1);
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <input class='d-none' type='text' name='id' value='$id'/>
                <div class='add-to-cart w-100 d-flex justify-content-center' style='margin-top:30px'>
                    <button type='button' class='btn btn-warning' style='color: white' id='add-btn'>Add to Cart</button>
                </div>
                </form>
            </div>
            ";
        ?>

        <script>
            $("#add-btn").click(() => {
                $("#add-form").submit();
            });
        </script>
    </div>
</body>
</html>