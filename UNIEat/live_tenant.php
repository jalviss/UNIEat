<?php       
session_start();
$id = $_POST['id']; 
$query = $_POST['query'];
$categoryId =  isset($_POST['category']) ? $_POST['category'] : '-1';
// if($_SESSION)
// $con->query("SELECT * FROM Tenant t JOIN User u ON t.UserID = u.UserID WHERE [Name] LIKE '%$query%'");
require('mysql.php');
        $isAdmin=false;
        if($id != -1){
            $checkAdmin = $con->query("SELECT * FROM Admin a WHERE UserID = '$id'");
            if ($row = $checkAdmin->fetch_assoc()) {
                $isAdmin = true;
            }
        }
        $sqlQuery = "SELECT `Name`, Picture, GROUP_CONCAT(DISTINCT CategoryName SEPARATOR ', ') AS Category, t.TenantID AS ID FROM Tenant t JOIN User u ON t.UserID = u.UserID JOIN TenantCategories tc ON t.TenantID = tc.TenantID JOIN Categories c ON tc.CategoriesID = c.CategoriesID WHERE t.TenantID IN (SELECT t.TenantID FROM Tenant t JOIN User u ON t.UserID = u.UserID JOIN TenantCategories tc ON t.TenantID = tc.TenantID JOIN Categories c ON tc.CategoriesID = c.CategoriesID WHERE Name LIKE '%$query%'";
        if ($categoryId != '-1') {
            $sqlQuery .= " AND c.CategoriesID = '$categoryId'";
        }
        $sqlQuery .= " GROUP BY t.TenantID) GROUP BY t.TenantID";
        $result = $con->query($sqlQuery);
        

        while ($row = $result->fetch_assoc()) {
            $name = $row["Name"];
            $id = $row["ID"];
            $logo = $row["Picture"];
            $category = $row["Category"];

            echo "
                <div  class='tenant-main w-100 d-flex justify-content-left' style='background-color: white; margin-top:10px;' onClick='window.location.href=\"Shop.php?tenant=$id\"'>

                    <div class='tenant w-100 d-flex' style='margin: 5px; width:100%; height: 110px'>
                        <div class='tenant-logo' style='width:22%'><img src =$logo width = 100% height=100%></div>

                        <div class='d-flex flex-column justify-content-around' style='margin-left : 5px; width: 80%'>
                            <a class='tenant-name' style='text-decoration: none; font-size:20px; color:black'>$name</a>
                            
                            <div class ='ratings' style='width:20%; height: 20%;'>
                    ";
                                
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
                            ";
                            //ini gajalan :)
                            
                                if(!$isAdmin){
                                    echo "
                                        <div class = 'category' style='font-size: 12px'>$category</div>
                                        ";
                                }
            echo'
                        </div>
                        
                    </div>
                </div>
            ';
        }