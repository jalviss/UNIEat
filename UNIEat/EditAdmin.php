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
                
             <?php
             require('mysql.php');
             $id = $_GET['admin'];
             $result = $con->query("SELECT * FROM Admin a JOIN User u ON a.UserID = u.UserID WHERE AdminID = '$id'");

             if($row = $result->fetch_assoc()){
    
                $name = $row['Name'];
                $email = $row['Email'];
                $phonenum = $row['PhoneNumber'];
                $gender = $row['Gender'];
                $userId = $row['UserID'];
                
             
             
             echo"
                <div class='container d-flex flex-column justify-content-between'>
                    <form method='post' action='process_editadmin.php' id='admin-form' enctype='multipart/form-data'>
                        <input class='d-none' type='text' name='id' value='$id'/>
                        <input class='d-none' type='text' name='userId' value='$userId'/>
                        <div class='container d-flex justify-content-between' style='margin-top:10px;'>
                            <p>Admin Name</p>
                            <input class='no-outline' type='text' id='name' placeholder='Input Admin Name' name='name' style='width:70%;' value = '$name'>
                        </div>
                        <div class='container d-flex justify-content-between' style='margin-top:10px;'>
                            <p>Email</p>
                            <input class='no-outline' type='text' id='email' placeholder='Input Admin Email' name='email' style='width:70%;' value ='$email'>
                        </div>
                        <div class='container d-flex justify-content-between' style='margin-top:10px;'>
                            <p>Phone Number</p>
                            <input class='no-outline' type='text' id='phone-num' placeholder='Input Admin Phone Number' name='phone-num' style='width:70%;' value ='$phonenum'>
                        </div>

            ";
            $male ="";
            $female ="";
            if($gender == "Male"){
                $male ="checked";
            }
            else if($gender == "Female"){
                $female ="checked";
            }
            
            echo"
                        <div class='container d-flex justify-content-between' style='margin-top:10px;'>
                            <p>Gender</p>
                            <div class='form-check form-check-inline'>
                                <div class='form-check form-check-inline'>
                                    <input class='form-check-input' type='radio' name='gender' id='gender' value='Male' $male>
                                    <label class='form-check-label' for='gender'>Male</label>
                                </div>
                                <div class='form-check form-check-inline'>
                                    <input class='form-check-input' type='radio' name='gender' id='gender' value='Female' $female>
                                    <label class='form-check-label' for='gender'>Female</label>
                                </div>
                            </div>

                        </div>
                        <div class='w-100 container d-flex justify-content-between' style='margin-top:70px; bottom = '2 ram'>
                            <div style='align=left;'><button type='button' class='btn btn-warning' style='color: white; margin-top: '30%' id='delete-btn'>Delete</button></div>
                            <div class='w-25 container d-flex justify-content-right' style='align=right; right = '2ram'; margin: 0px;'>
                                <div><button type='button' class='btn btn-warning' style='color: white; margin-right:10px' id='save-btn'>Save</button></div>
                                <div><button type='button' class='btn btn-warning' style='color: white; margin-right:10px' onClick='window.location.href=\"ManageAdmin.php\"'>Cancel</button></div>
                            </div>
                        </div>
                    </form> 
                    <form action='process_deleteadmin.php' method='post' id='delete-admin'>
                        <input class='d-none' type='text' name='id' value='$id'/>
                        <input class='d-none' type='text' name='userId' value='$userId'/>
                    </form>
                    
                </div>";
            }
            ?>
                <script>
                    $("#save-btn").click(() => {
                        $("#admin-form").submit();
                    });
                    $("#delete-btn").click(() => {
                        $("#delete-admin").submit();
                    });
                </script>
                
            </div>
        </div>
    </div>
    

</body>
</html>