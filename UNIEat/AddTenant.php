<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admin</title>

    <?php require_once('links.php') ?>
    <script src="add-tenant.js"></script>
</head>
<body style="background-color: rgb(242,236,236);"> 
    <?php
        require_once('navbar.php');
    ?>
    
    <div class="w-50 container" style="align = center;">
        <div class="w-100 container" >
             <div class="w-100  shop flex justify-content-between" style="margin-top:10px; background-color: white;  height:90%; padding: 40px 20px;">
                <div class="container d-flex flex-column justify-content-between">
                    <form method="post" action="process_addtenant.php" id="tenant-form" enctype="multipart/form-data">
                        <div class="container d-flex justify-content-between" style="margin-top:10px;">
                            <p>Tenant Name</p>
                            <input class="no-outline" type="text" id="name" placeholder="Input Tenant Name" name="name" style="width:70%;">
                        </div>
                        <div class="container d-flex justify-content-between" style="margin-top:10px;">
                            <p>Email</p>
                            <input class="no-outline" type="text" id="email" placeholder="Input Tenant Email" name="email" style="width:70%;">
                        </div>
                        <div class="container d-flex justify-content-between" style="margin-top:10px;">
                            <p>PhoneNumber</p>
                            <input class="no-outline" type="text" id="phone-num" placeholder="Input Tenant Phone Number" name="phone-num" style="width:70%;">
                        </div>
                        <div class="container d-flex justify-content-between" style="margin-top:10px;">
                            <p>Tenant Logo</p>
                            <input class="no-outline" type="file" id="img" name="img">
                        </div>
                    </form>
                </div>

                <div class="w-100 container d-flex justify-content-between" style="margin-top:70px; bottom = '2 ram'">
                        <div style='align=left;'></div>
                        <div class="w-25 container d-flex justify-content-right" style="align=right; right = '2ram'; margin: 0px;">
                            <div><button type="button" class="btn btn-warning" style="color: white; margin-right:10px" id="save-btn">Save</button></div>
                            <div><button type="button" class="btn btn-warning" style="color: white; margin-right:10px">Cancel</button></div>

                        </div>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>