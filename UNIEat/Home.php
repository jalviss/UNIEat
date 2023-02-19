<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <?php require_once('links.php') ?>
</head>
<body style="background-color: rgb(242,236,236);"> 

    <?php 
        require_once('navbar.php');
    ?>

    <!-- <script>
        // $("#12").click(() => {
        //     $("#123").css($("#1234").val(), $("#12345").val());
        // })
        const live = () => {
            $.post( "live_text.php", { "query": $("#search").val() }, ( data ) => {
                console.log( data);
                $( "#live" ).html( data );
            });
        };
    </script> -->
        
    <div class="w-50 container"> 
            
            <?php 
                $username = $_SESSION['username'];
                $id = $_SESSION['user_id'];
                $isAdmin=false;
                if ($id) {
                    require("mysql.php");
                    $result = $con->query("SELECT * FROM `Admin` WHERE UserID = $id");
                    if ($row = $result->fetch_assoc()) {
                        $isAdmin = true;
                    }
                    $result->free_result();
                    $con->close();
                }

                if($isAdmin){
                    echo '
                        <div class="w-100 categories d-flex justify-content-between">
                            <a  class="navbar-brand" href="#">Shops</a>
                            <a  class="navbar-brand" href="AddTenant.php" style="color:rgb(67, 146, 177)">New Tenant</a>
                        </div>
                    ';
                }
                else{
                    echo '
                        <div class="w-100 categories d-flex justify-content-left">
                            <div class="categories d-flex justify-content-around">
                                <label for="category-all" type="button" class="btn btn-outline-warning btn-rounded" data-mdb-ripple-color="dark" style="background-color: white">All</label>
                                <input id="category-all" name="category" type="radio" class="d-none" value="-1" onclick="live()" checked/>
                    ';
                    require("mysql.php");
                    $result = $con->query("SELECT * FROM Categories");
                    
                    while ($row = $result->fetch_assoc()){
                        $category = $row["CategoryName"];
                        $id = $row["CategoriesID"];
                        //var_dump($category);
                        echo"
                            <label for='category-$id' type='button' class='btn btn-outline-warning btn-rounded' data-mdb-ripple-color='dark' style='background-color: white'>$category</label>
                            <input id='category-$id' name='category' type='radio' class='d-none' value='$id' onclick='live()' />
                        ";
                    }
                    echo'
                            </div>
                        </div>
                    ';
                }
            ?>
            
            <?php
                if (isset($_GET["category"])) {
                    $currentPage = $_GET["page"];
                }
                echo '<div id="live">';
                // require('mysql.php');
                // $result = $con->query("SELECT * FROM Tenant t JOIN User u ON t.UserID = u.UserID");
                // while ($row = $result->fetch_assoc()) {
                //     $name = $row["Name"];
                //     $logo = $row["Picture"];
                //     echo "
                //         <div  class='tenant-main w-100 d-flex justify-content-left' style='background-color: white; margin-top:10px;' onClick='window.location.href=\'Shop.php\''>

                //             <div class='tenant w-100 d-flex' style='margin: 5px; width:100%; height: 110px'>
                //                 <div class='tenant-logo' style='width:22%'><img src =$logo width = 100% height=100%></div>

                //                 <div class='d-flex flex-column justify-content-around' style='margin-left : 5px; width: 80%'>
                //                     <a class='tenant-name' style='text-decoration: none; font-size:20px; color:black'>$name</a>
                                    
                //                     <div class ='ratings' style='width:20%; height: 20%;'>
                //             ";
                                        
                //                             $rating = 2;
                //                             for ($i=0; $i < $rating; $i++) { 
                //                                 echo '<img src ="./assets/star_full.png" width = 10%>';
                //                             }
                //                             for ($i=0; $i < 5 - $rating; $i++) { 
                //                                 echo "<img src ='./assets/star_empty.png' width = 10%>";
                //                             }
                //                         echo"
                //                         <a class='amount' style='text-decoration: none; font-size: 7px; color: black'>(120)</a>
                                        
                //                     </div>
                //                     ";
                                    
                //                         if($isAdmin!=true){
                //                             echo '
                //                                 <div class = "category" style="font-size: 12px">Drinks, snack</div>
                //                                 ';
                //                         }
                //             echo"
                //                 </div>
                                
                //             </div>
                //         </div>
                //             ";
                // }
                echo'</div>';
            ?>
            
    </div>
    
    <script>
        $(() => {
            live();
        });
        const live = () => {
            $.post( "live_tenant.php", { "query": $("#search").val(), "id": <?php echo isset($_SESSION["id"]) ? $_SESSION["id"] : -1 ?>, 'category': $('input[name="category"]:checked').val()}, ( data ) => {
                $( "#live" ).html( data );
            });
        };
    </script>
    
    <!-- <div class=" w-100 d-flex justify-content-center" style="margin-top:10px; align-content:center; width:100%">
        <nav>
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link text-warning" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                            
                <li class="page-item"><a class="page-link text-warning" href="#">1</a></li>
                <li class="page-item"><a class="page-link text-warning" href="#">2</a></li>
                <li class="page-item"><a class="page-link text-warning" href="#">3</a></li>
                
                <li class="page-item">
                    <a class="page-link text-warning" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>   -->
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
                                <a class='page-link text-warning' href='Home.php?page=$prev' aria-label='Previous'>
                                    <span aria-hidden='true'>&laquo;</span>
                                </a>
                            </li>
                        ";
                    }
                    for ($i=0; $i < $pageCount; $i++) { 
                        $cur = $i + 1;
                        echo "<li class='page-item'><a class='page-link text-warning' href='Home.php?page=$cur'>$cur</a></li>";
                    }
                    if ($currentPage < $pageCount) {
                        $next = $currentPage + 1;
                        echo "
                            <li class='page-item'>
                                <a class='page-link text-warning' href='Home.php?page=$next' aria-label='Next'>
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