<?php session_start(); ?>
<nav class="shadow-sm p-3 mb-5 navbar" style="background-color: rgb(242,236,236);">
    
    <div class="container-fluid d-flex justify-content-between">
            <a class="navbar-brand" href="index.php">UNIEat</a>


            <!-- <div><img src ="./assets/cart.png" height = 20px ></div> -->
            
            
            <?php 
                $username = $_SESSION["username"];
                $id = $_SESSION["user_id"];
                require("mysql.php");
                $isAdmin = false;
                $isTenant = false;
                $isCustomer = false;
                $result = $con->query("SELECT * FROM Admin a JOIN User u ON a.UserID = u.UserID WHERE a.UserID = '$id'");
                if ($row = $result->fetch_assoc()) {
                    $isAdmin = true;
                    $username = $row['Name'];
                    $profpic = $row['ProfilePicture'];
                }
                $result->free_result();
                $result = $con->query("SELECT * FROM Tenant t JOIN User u ON t.UserID = u.UserID WHERE t.UserID = '$id'");
                if ($row = $result->fetch_assoc()) {
                    $isTenant = true;
                    $username = $row['Name'];
                    $profpic = $row['Picture'];
                }
                $result->free_result();
                $result = $con->query("SELECT * FROM Customer WHERE UserID = '$id'");
                if ($row = $result->fetch_assoc()) {
                    $isCustomer = true;
                    $username = $row['Username'];
                    $profpic = $row['ProfilePicture'];
                }
                $result->free_result();
                $con->close();
                $cart = "";
                if ($isCustomer) {
                    $cart = '<div ><img src ="./assets/cart.png" height = 20px class="align-middle"></div>';
                }
                echo "
                    <div class='w-50 d-flex justify-content-around'>
                        <form class='w-75 d-flex' role='search' >
                            <input class='w-100 form-control me-2' type='search' placeholder='Search' aria-label='Search' id='search' onchange='live()'>
                        
                            <button type='button' class='w-25 btn btn-warning' type='submit' onchange='live()'>
                                <img src ='./assets/search.png' height = '20px' >
                            
                            </button>
                        </form>
                        $cart
                    </div>
                ";
                if ($id) {
                    if($isAdmin==true) {
                        echo '

                            <div>
                                <img class="rounded-circle" alt="avatar1" src="'.$profpic.'" width="40px" height="40px">
                                <div class="btn-group">
                                    <a class="btn btn-default dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#" role="button">'.$username.'</a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="Home.php">Home</a></li>
                                        <li><a class="dropdown-item" href="ManageAdmin.php">Manage Admin</a></li>
                                        <li><a class="dropdown-item" href="#">Manage Categories</a></li>
                                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        ';
                    }else if($isTenant==true){
                        echo '

                            <div>
                                <img class="rounded-circle" alt="avatar1" src="'.$profpic.'" width="40px" height="40px">
                                <div class="btn-group">
                                    <a class="btn btn-default dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#" role="button">'.$username.'</a>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="HomeTenant.php">Home</a></li>
                                        <li><a class="dropdown-item" href="#">Completed Orders</a></li>
                                        <li><a class="dropdown-item" href="#">Manage Items</a></li>
                                        <li><a class="dropdown-item" href="#">Settings</a></li>
                                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        ';
                    }else if($isCustomer==true){
                        echo '
                            <div>
                                <img class="rounded-circle" alt="avatar1" src="'.$profpic.'" width="40px" height="40px">
                                <div class="btn-group">
                                    <a class="btn btn-default dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#" role="button">'.$username.'</a>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="Home.php">Home</a></li>
                                        <li><a class="dropdown-item" href="#">History</a></li>
                                        <li><a class="dropdown-item" href="#">Settings</a></li>
                                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        ';

                    }
                } else {
                    
                    echo '
                        <div>
                            <button type="button" class="btn btn-outline-warning" style="background-color: white" onClick="window.location.href=\'login.php\'">Login</button>
                            <button type="button" class="btn btn-warning" style="color: white" onClick="window.location.href=\'Register.php\'">Register</button>
                        </div>
                    ';
                    
                }
            ?>
    </div>
</nav>