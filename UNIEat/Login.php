<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <?php require_once('links.php') ?>
    <script src="login.js"></script>
</head>
<body style="background-color: rgb(242,236,236);"> 
    <?php
        require_once('navbar.php');
        if (isset($_SESSION['login-error'])) {
            echo 'email atau password salah';
        }
    ?>

    <div class="w-25 container" style="height: 800px"> 
            <div class="w-100 logo container d-flex justify-content-center" style="margin-bottom: 30px;">
                <div id="loginLogo" style="width:40%">
                    <a href="home.html"><img src="./assets/logo.png" width=100%></a>
                </div>
            </div>
            
            <div class="w-100 shop d-flex flex-column justify-content-center" style="margin-top:10px; background-color: white; padding : 40px 40px; height:40%;">
                <div id="loginWindow d-flex justify-content-center">
                    <div id="formWindow">
                        <form method="post" action="process_login.php" id="login-form">

                            <div class="formitem" style="margin-top:30px; margin-bottom:20px;">
                                <input class="no-outline" type="text" id="emailOrName" placeholder="Email / Username" name="email" style="width:100%;">
                            </div>

                            <div class="formitem d-flex justify-content-right" style="margin-top:30px;">
                                <input class="no-outline" type="password" id="password" placeholder="Password" name="password" style="width:100%;">
                            </div>
                        
                            
                            <div class="formitem" style="margin-top:10px; margin-bottom:30px;">
                                <p style="text-align:right;"><a href="#" style="text-align:right; font-size:10px">Forgot your password?</a></p>
                            </div>
                            

                            
                            <div id="submit-form" class="no-outline d-flex justify-content-center" style="margin-top:30px; margin-bottom:10px;">
                                <button type="button" class="btn btn-warning" id="login-btn">Login</button>
                            </div>             
                            
                            <div id="loginNoacc">
                                <p id="noacc" style="text-align:center; font-size:10px">Don't have an account yet? <a href="Register.html">register</a> now!</p>
                            </div>
                        </form>
                    </div>
                </div>



            </div>
        
    </div>
</body>
</html>