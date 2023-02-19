<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admin</title>

    <?php require_once('links.php') ?>
    <script src="register.js"></script>
</head>
<body style="background-color: rgb(242,236,236);"> 
    <?php
        require_once('navbar.php');
    ?>
    
    <div class="w-50 container" style="height: 1000px; ">
        <div class="w-100 container" style="height: 85%;">
            <a class="text-primary" style="text-decoration: none" href="AddAdmin.php">Add Admin</a>
            <?php
                session_start();
                $inpage = 9;
                $inrow = 3;
                
                echo '<div id="live">';
                require('mysql.php');
                $username = $_SESSION["username"];
                $id = $_SESSION["user_id"];
                $page = $_GET['page'];
                // $total = 4;
                $result = $con->query("SELECT * FROM `Admin` a JOIN User u ON a.UserID = u.UserID");

                // $rowCount = 2;
                echo"
                    <div class='w-100  shop flex justify-content-between' style='margin-top:10px; background-color: white;  height:90%; padding: 40px 20px;'>
                        <div class='container d-flex flex-column justify-content-between'>
                ";
                for ($i=0; $i < $inpage / $inrow; $i++) {
                    // echo '<hr/>';
                    echo "
                                <div class='d-flex justify-content-between' style='margin-top:10px;'>
                    ";
                    for ($j=0; $j < $inrow; $j++) { 
                        if ($row = $result->fetch_assoc()) {
                            $name = $row["Name"];
                            $id = $row["AdminID"];
                            $profpic = $row["ProfilePicture"];

                            echo "
                                <div class='border border-warning border-1 bg-light justify-content-between' style='width:20%; height:170px;' onClick='window.location.href=\"EditAdmin.php?admin=$id\"'>
                                    <div class='d-flex flex-column justify-content-between' style='margin: 10px 10px'>
                                        <div class='tenant-logo' style='width:100%''><img src =$profpic width = 100% height=100%></div>
                                        <h5 class='text-center mt-3 mb-3'>$name</h5>
                                    </div>
                                </div>
                            ";
                        }
                    }
                    echo "
                            </div>";
                }

                echo"
                        </div>
                    ";
            ?>
            <!-- <div class="w-100  shop flex justify-content-between" style="margin-top:10px; background-color: white;  height:90%; padding: 40px 20px;">
                <div class="container d-flex flex-column justify-content-between">

                    <div class="d-flex justify-content-between">
                        <div class="border border-warning border-1 bg-light justify-content-between" style="width:20%; height:170px;">
                            <div class="d-flex flex-column justify-content-between" style="margin: 10px 10px">
                                <div class="tenant-logo" style="width:100%"><img src ="./assets/profile.webp" width = 100% height=100%></div>
                                <h5 class="text-center mt-3 mb-3" >Sofia</h5>
                            </div>
                        </div>
                        <div class="border border-warning border-1 bg-light justify-content-between" style="width:20%; height:170px;">
                            <div class="d-flex flex-column justify-content-between" style="margin: 10px 10px">
                                <div class="tenant-logo" style="width:100%"><img src ="./assets/profile.webp" width = 100% height=100%></div>
                                <h5 class="text-center mt-3 mb-3" >Sofia</h5>
                            </div>
                        </div>
                        <div class="border border-warning border-1 bg-light justify-content-between" style="width:20%; height:170px;">
                            <div class="d-flex flex-column justify-content-between" style="margin: 10px 10px">
                                <div class="tenant-logo" style="width:100%"><img src ="./assets/profile.webp" width = 100% height=100%></div>
                                <h5 class="text-center mt-3 mb-3" >Sofia</h5>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between" style="margin-top: 10px;">
                        <div class="border border-warning border-1 bg-light justify-content-between" style="width:20%; height:170px;">
                            <div class="d-flex flex-column justify-content-between" style="margin: 10px 10px">
                                <div class="tenant-logo" style="width:100%"><img src ="./assets/profile.webp" width = 100% height=100%></div>
                                <h5 class="text-center mt-3 mb-3" >Sofia</h5>
                            </div>
                        </div>
                        <div class="border border-warning border-1 bg-light justify-content-between" style="width:20%; height:170px;">
                            <div class="d-flex flex-column justify-content-between" style="margin: 10px 10px">
                                <div class="tenant-logo" style="width:100%"><img src ="./assets/profile.webp" width = 100% height=100%></div>
                                <h5 class="text-center mt-3 mb-3" >Sofia</h5>
                            </div>
                        </div>
                        <div class="border border-warning border-1 bg-light justify-content-between" style="width:20%; height:170px;">
                            <div class="d-flex flex-column justify-content-between" style="margin: 10px 10px">
                                <div class="tenant-logo" style="width:100%"><img src ="./assets/profile.webp" width = 100% height=100%></div>
                                <h5 class="text-center mt-3 mb-3" >Sofia</h5>
                            </div>
                        </div>
                    </div>
                   <div class="d-flex justify-content-between" style="margin-top: 10px;">
                        <div class="border border-warning border-1 bg-light justify-content-between" style="width:20%; height:170px;">
                            <div class="d-flex flex-column justify-content-between" style="margin: 10px 10px">
                                <div class="tenant-logo" style="width:100%"><img src ="./assets/profile.webp" width = 100% height=100%></div>
                                <h5 class="text-center mt-3 mb-3" >Sofia</h5>
                            </div>
                        </div>
                        <div class="border border-warning border-1 bg-light justify-content-between" style="width:20%; height:170px;">
                            <div class="d-flex flex-column justify-content-between" style="margin: 10px 10px">
                                <div class="tenant-logo" style="width:100%"><img src ="./assets/profile.webp" width = 100% height=100%></div>
                                <h5 class="text-center mt-3 mb-3" >Sofia</h5>
                            </div>
                        </div>
                        <div class="border border-warning border-1 bg-light justify-content-between" style="width:20%; height:170px;">
                            <div class="d-flex flex-column justify-content-between" style="margin: 10px 10px">
                                <div class="tenant-logo" style="width:100%"><img src ="./assets/profile.webp" width = 100% height=100%></div>
                                <h5 class="text-center mt-3 mb-3" >Sofia</h5>
                            </div>
                        </div>
                    </div>
                </div> -->


                <!-- <div class=" w-100 d-flex justify-content-center" style="margin-top:60px; align-content:center; width:100%">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link text-dark" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            
                            <li class="page-item"><a class="page-link text-dark" href="#">1</a></li>
                            <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
                            <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
                
                            <li class="page-item">
                                <a class="page-link text-dark" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>   -->
                

                <div class=" w-100 d-flex justify-content-center" style="margin-top:60px; align-content:center; width:100%">
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
                                            <a class='page-link text-dark' href='ManageAdmin.php?page=$prev' aria-label='Previous'>
                                                <span aria-hidden='true'>&laquo;</span>
                                            </a>
                                        </li>
                                    ";
                                }
                                for ($i=0; $i < $pageCount; $i++) { 
                                    $cur = $i + 1;
                                    echo "<li class='page-item'><a class='page-link text-dark' href='ManageAdmin.php?page=$cur'>$cur</a></li>";
                                }
                                if ($currentPage < $pageCount) {
                                    $next = $currentPage + 1;
                                    echo "
                                        <li class='page-item'>
                                            <a class='page-link text-dark' href='ManageAdmin.php?page=$next' aria-label='Next'>
                                                <span aria-hidden='true'>&raquo;</span>
                                            </a>
                                        </li>
                                    ";
                                }
                                $con->close();
                            ?>
                        </ul>
                    </nav>
                </div> 
                <?php echo"</div>"; ?>
            </div>
        </div>
    </div>
</body>
</html>