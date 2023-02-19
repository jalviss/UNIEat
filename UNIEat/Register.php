<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <?php require_once('links.php') ?>
    <script src="register.js"></script>
</head>
<body style="background-color: rgb(242,236,236);"> 
    <?php
        require_once('navbar.php');
    ?>
        
    <div class="w-25 container" style="height: 800px"> 
            <div class="w-100 logo container d-flex justify-content-center" style="margin-bottom: 30px;">
                <div id="loginLogo" style="width:40%">
                    <a href="home.html"><img src="./assets/logo.png" width=100%></a>
                </div>
            </div>
            
            <div class="w-100 shop d-flex justify-content-center" style="margin-top:10px; background-color: white; padding : 40px 40px; height:60%;">
                <div id="loginWindow d-flex justify-content-center">
                    <div id="formWindow">
                        <form method="post" action="process_register.php" id="register-form" enctype="multipart/form-data">

                            <div class="formitem" style="margin-top:20px; margin-bottom:30px;">
                                <input class="no-outline" type="text" id="email" name="email" placeholder="Email">
                            </div>

                            <div class="formitem" style="margin-top:20px; margin-bottom:30px;">
                                <input class="no-outline" type="text" id="username" name="username" placeholder="Username">
                            </div>
                            
                            <div class="formitem" style="margin-top:20px; margin-bottom:30px;">
                                <input class="no-outline" type="text" patterns="^(\+62|0)8[1-9][0-9]{6,9}$" required inputmode="numeric" id="phone-num" name="phone-num" placeholder="Phone Number">
                            </div>
                            
                            <div class="formitem no-outline" style="margin-top:20px; margin-bottom:30px;">
                                <input class="no-outline" type="password" id="password" name="password" placeholder="Password">
                            </div>
                
                            <div class="formitem no-outline" style="margin-top:20px; margin-bottom:30px;">
                                <input class="no-outline" type="password" id="confPassword" placeholder="Confirm Password">
                            </div>
                            <!-- <div class="formitem no-outline" style="margin-top:20px; margin-bottom:30px;">
                                <input class="no-outline" type="file" id="img" name="img">
                            </div> -->
                            
                            <div id="submit-form" class="no-outline d-flex justify-content-center" style="margin-top:70px; margin-bottom:30px;">
                                <button type="button" class="btn btn-warning" id="register-btn" >Register</button>
                            </div>                
                        </form>
                    </div>
                </div>



            </div>
        
    </div>
</body>
</html>