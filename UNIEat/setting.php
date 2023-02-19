<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admin</title>

    <?php require_once('links.php') ?>
    <script src="add-admin.js"></script>
</head>
<body style="background-color: rgb(242,236,236);"> 
    <?php
        require_once('navbar.php');
    ?>
    
    <div class="w-50 container" style="align = center;">
        <div class="w-100 container" >
             <div class="w-100  shop flex justify-content-between" style="margin-top:10px; background-color: white;  height:90%; padding: 40px 20px;">
                <div class="container d-flex flex-column justify-content-between">
                    <form method="post" action="process_admin.php" id="admin-form" enctype="multipart/form-data">
                        <div class="container d-flex justify-content-between" style="margin-top:10px;">
                            <p>Nama</p>
                            <input class="no-outline" type="text" id="name" name="name" style="width:70%;">
                        </div>
                        <div class="container d-flex justify-content-between" style="margin-top:10px;">
                            <p>Phone Number</p>
                            <input class="no-outline" type="text" id="phone-num" name="phone-num" style="width:70%;">
                        </div>
                        <div class="container d-flex justify-content-between" style="margin-top:10px;">
                            <p>Email</p>
                            <input class="no-outline" type="text" id="email" name="email" style="width:70%;">
                        </div>
                        <div class="w-100 container d-flex justify-content-between" style="margin-top:70px; bottom = '2 ram'">
                            <div class="w-50 container d-flex justify-content-right" style="align=right; right = '2ram'; margin: 0px;">
                                <div><button type="button" class="btn btn-warning" style="color: white; margin-right:10px" id="update-btn">Update</button></div>
                                <div><button type="button" class="btn btn-warning" style="color: white; margin-right:10px; width = 50%">Change Password</button></div>
                            </div>
                        </div>
                    </form> 
                </div>

                
                
            </div>
        </div>
    </div>
    
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container d-flex justify-content-between" style="margin-top:10px;">
                        <p>Current Password</p>
                        <input class="no-outline" type="password" id="currpass" name="currpass" style="width:70%;">
                    </div>
                    <div class="container d-flex justify-content-between" style="margin-top:10px;">
                        <p>New Password</p>
                        <input class="no-outline" type="password" id="newpass" name="newpass" style="width:70%;">
                    </div>
                    <div class="container d-flex justify-content-between" style="margin-top:10px;">
                        <p>Confirm Password</p>
                        <input class="no-outline" type="password" id="conpass" name="conpass" style="width:70%;">
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary">Save</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>


</body>
</html>