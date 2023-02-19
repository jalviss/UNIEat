<?php
$query = $_POST['query'];
// $con->query("SELECT * FROM Tenant t JOIN User u ON t.UserID = u.UserID WHERE [Name] LIKE '%$query%'");
require('mysql.php');

        $result = $con->query("SELECT Location, OrderTime, TotalPrice, c.Username as Username, c.ProfilePicture as Picture FROM `Order` o JOIN Customer c ON o.CustomerID = c.CustomerID JOIN Tenant t ON o.TenantID = t.TenantID JOIN User u ON u.UserID = t.UserID WHERE Username LIKE '%$query%'");

        while ($row = $result->fetch_assoc()) {
                    $name = $row["Username"];
                    $profpic = $row["Picture"];
                    $location = $row["Location"];
                    $ordertime = $row["OrderTime"];
                    $totalprice = $row["TotalPrice"];


                    echo "
                        <div class='customer-main w-100 d-flex justify-content-left' style='background-color: white;'>

                            <div class='customer w-100 d-flex' style='margin: 5px; width:100%; height: 130px'>
                                <div class='customer-profile' style='width:22%'><img src='$profpic' width ='100%' height=100%></div>

                                <div class='d-flex flex-column justify-content-around' style='margin-left : 5px; width: 80%'>
                                    <p class='customer-name' style='text-decoration: none; font-size:20px; color:black'>$name</p>
                                    <p class='amount' style='text-decoration: none; font-size: 10px; color: black'>3 item(s)</p>
                                    <p class='place' style='text-decoration: none; font-size: 10px; color: black'>Place : $location</p>


                                    <div class = 'd-flex justify-content-between'>                                
                                        <p class='total-price' style='text-decoration: none; font-size: 12px; color: black'>Total : Rp $totalprice</p>
                                        <p class='order-time' style='text-decoration: none; font-size: 9px; color: black; padding-right:5px'>$ordertime</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>  
                    ";  
                }