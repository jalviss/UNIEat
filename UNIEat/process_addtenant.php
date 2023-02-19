<?php
require("mysql.php");
$name = $_POST["name"];
$email = $_POST["email"];
$phoneNum = $_POST["phone-num"];
$gender = $_POST["gender"];
$plain = "";
$imageExist = true;
if ($_FILES["img"]["error"] != 0) {
    $imageExist = false;
}
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
$uploadfile;
if ($imageExist) {
    $uploadfile = "img/" . basename($_FILES['img']['name']) . time() . rand(0, 1000);
    move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
} else {
    $uploadfile = 'img/tenant.jpg';
}

$msg = "You are added as the new tenant at UNIEat, these are the email and password you can use to login to your UNIEat account. 
Please change the password immediately.
Email : $email
Password : $plain
";
$msg = wordwrap($msg,70);
mail("someone@example.com","UNIEat",$msg);

$con->query("INSERT INTO `Tenant` (`TenantID`, `UserID`, `Picture`) VALUES (NULL, '$con->insert_id', '$uploadfile') ");
$con->close();
header("Location: index.php");
?>