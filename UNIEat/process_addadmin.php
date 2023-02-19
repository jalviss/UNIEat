<?php
require("mysql.php");
$name = $_POST["name"];
$email = $_POST["email"];
$phoneNum = $_POST["phone-num"];
$gender = $_POST["gender"];
$plain = "";
$huruf = explode(",", "a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z");
for ($i=0; $i < 5; $i++) { 
    $plain .= $huruf[rand(0, 25)];
}
for ($i=0; $i < 3; $i++) { 
    $angka = rand(0, 9);
    $plain .= "$angka";
}
$password = password_hash($plain, PASSWORD_BCRYPT);
file_put_contents("img/pass/$email.txt",$plain);
$con->query("INSERT INTO `User` (`UserID`, `Email`, `Name`, `Password`, `PhoneNumber`) VALUES (NULL, '$email', '$name', '$password', '$phoneNum') ");
// $uploadfile = "img/" . basename($_FILES['img']['name']);
// move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
//session_start();
// $_SESSION['username'] = $username;
// $_SESSION['user_id'] = $con->insert_id;

$msg = "You are added as the new admin at UNIEat, these are the email and password you can use to login to your UNIEat account. 
Please change the password immediately.
Email : $email
Password : $plain
";
$msg = wordwrap($msg,70);
mail("someone@example.com","UNIEat",$msg);

$con->query("INSERT INTO `Admin` (`AdminID`, `UserID`, `Gender`, `ProfilePicture`) VALUES (NULL, '$con->insert_id', '$gender', 'img/admin.jpg') ");
$con->close();
header("Location: ManageAdmin.php");
?>