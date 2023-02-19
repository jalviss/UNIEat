<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <?php require_once('links.php') ?>
    <script src="register.js"></script>
</head>
<body style="background-color: rgb(242,236,236);"> 
    <?php
        require_once('navbar.php');
    ?>
        
    <div class="w-50 container"> 
            <div class="w-100 categories d-flex justify-content-between">
               <p  class="navbar-brand" href="#">Current Orders</p>
               
            </div>

            <?php
                session_start();
                echo '<div id="live">';
                require('mysql.php');
                $username = $_SESSION["username"];
                $id = $_SESSION["user_id"];
                $page = $_GET['page'];
                $total = 4;
                $result = $con->query("SELECT Location, OrderTime, TotalPrice, c.Username as Username, c.ProfilePicture as Picture FROM `Order` o JOIN Customer c ON o.CustomerID = c.CustomerID JOIN Tenant t ON o.TenantID = t.TenantID JOIN User u ON u.UserID = t.UserID WHERE t.UserID = '$id'");
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
                    

                
                echo '</div>';

        ?>
        
    </div>

     <script>
        const live = () => {
            $.post( "live_order.php", { "query": $("#search").val(), "id": <?php echo isset($_SESSION["id"]) ? $_SESSION["id"] : -1 ?>}, ( data ) => {
                console.log( data);
                $( "#live" ).html( data );
            });
        };
    </script>

    <div class=" w-100 d-flex justify-content-center" style="margin-top:10px; align-content:center; width:100%">
        <nav>
            <ul class="pagination">
                <?php
                    $total = 20;
                    $count = 8;
                    $pageCount = ceil($total / $count);
                    $currentPage;
                    if (isset($_GET["page"])) {
                        $currentPage = $_GET["page"];
                    } else {
                        $currentPage = 1;
                    }
                    if ($currentPage > 1) {
                        $prev = $currentPage - 1;
                        echo "
                            <li class='page-item'>
                                <a class='page-link text-warning' href='HomeTenant.php?page=$prev' aria-label='Previous'>
                                    <span aria-hidden='true'>&laquo;</span>
                                </a>
                            </li>
                        ";
                    }
                    for ($i=0; $i < $pageCount; $i++) { 
                        $cur = $i + 1;
                        echo "<li class='page-item'><a class='page-link text-warning' href='HomeTenant.php?page=$cur'>$cur</a></li>";
                    }
                    if ($currentPage < $pageCount) {
                        $next = $currentPage + 1;
                        echo "
                            <li class='page-item'>
                                <a class='page-link text-warning' href='HomeTenant.php?page=$next' aria-label='Next'>
                                    <span aria-hidden='true'>&raquo;</span>
                                </a>
                            </li>
                        ";
                    }
                ?>
            </ul>
        </nav>
    </div> 
    
</body>
</html>