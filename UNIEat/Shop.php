<?php 
require_once('LoggedInOnly.php')
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>

    <?php require_once('links.php') ?>
    <script src="register.js"></script>
</head>
<body style="background-color: rgb(242,236,236);"> 
    <?php
        require_once('navbar.php');
    ?>

    <div class="w-50 container"> 
            <div class="w-100 container">
                <div class="w-100 h-100 shop d-flex flex-column justify-content-top" style="margin-top:10px; background-color: white; padding : 40px 40px">
                    
                    <div class="tenant-main w-100 d-flex justify-content-left" style="background-color: white; margin-top:20px;">
        <?php
            require('mysql.php');
            $username = $_SESSION["username"];
                    $tenant = $_GET['tenant'];
                    $total = 4;
                    $result = $con->query("SELECT `Name`, Picture, GROUP_CONCAT(DISTINCT CategoryName SEPARATOR ', ') AS Category FROM Tenant t JOIN User u ON t.UserID = u.UserID JOIN TenantCategories tc ON t.TenantID = tc.TenantID JOIN Categories c ON tc.CategoriesID = c.CategoriesID  WHERE t.TenantID = $tenant");
                    
                    while ($row = $result->fetch_assoc()) {
                        $name = $row["Name"];
                        $profpic = $row["Picture"];
                        $category = $row["Category"];
                        
                        echo "
                            <div class='tenant w-100 d-flex' style='margin: 5px; width:100%; height: 110px'>
                            <div class='tenant-logo' style='width:22%'><img src ='$profpic' width = 100% height=100%></div>

                            <div class='d-flex flex-column justify-content-around' style='margin-left : 20px; width: 80%'>
                                <a class='tenant-name' style='text-decoration: none; font-size:20px; color:black'>$name</a>";

                        echo"<div class ='ratings' style='width:20%; height: 20%;'>";
                               
                        $rating = 2;
                        for ($i=0; $i < $rating; $i++) { 
                                        echo '<img src ="./assets/star_full.png" width = 10%>';
                        }
                        for ($i=0; $i < 5 - $rating; $i++) { 
                                        echo "<img src ='./assets/star_empty.png' width = 10%>";
                        }
                        
                        echo"
                                    <a class='amount' style='text-decoration: none; font-size: 7px; color: black'>(120)</a>
                                </div>
                                <a class='amount' href='#' style='text-decoration: none; font-size: 10px;'>Rating and reviews</a>
                                <div class='d-flex justify-content-left'>
                                    <div class='d-flex justify-content-around'>
                                    <div class = 'category' style='font-size: 12px'>$category</div>

                                    <!-- <a class='edit category' style='text-decoration: none; font-size: 7px; color: black'>(120)</a> -->
                                </div>  
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                        ";
                    }
        ?>
                <?php
                require('mysql.php');
                $result = $con->query("SELECT * FROM Product p JOIN Tenant t on p.TenantID = t.TenantID WHERE t.TenantID = $tenant");
                while ($row = $result->fetch_assoc()) {
                    $name = $row["ProductName"];
                    $price = $row["Price"];
                    $desc = $row["Description"];
                    $pic = $row["ProductPicture"];
                    $productid = $row["ProductID"];
                    echo "
                        <div class='product-main w-100 d-flex flex-column justify-content-around' style='background-color: white; margin-top:20px;' onClick='window.location.href=\"ItemDetail.php?product=$productid\"'>
                            <div class='border border-dark border-1 bg-light d-flex justify-content-around' style='width:100%; height:155px;'>
                                <div class='product-logo' style='width:25%; margin: 10px 10px '><img src =$pic width = 100% height=100%></div>
                                <div class='product-details d-flex flex-column justify-content-around' style='margin-left : 20px; width: 70%'>
                                    <div class='d-flex flex-column'>
                                        <p class='product-name' style='text-decoration: none; font-size:20px; color:black'>
                                            $name
                                        </p>
                                        <p class='product-description' style='text-decoration: none; font-size: 10px; color: black'>
                                            $desc
                                        </p>
                                    </div>
                                    <div class = 'price' style='font-size: 12px'>Rp $price</div>
                                </div>
                            </div>
                        </div>
                    ";
                }


                ?>


            </div>
        </div>
    </div>
</body>
</html>