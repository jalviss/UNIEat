<?php
require("mysql.php");
$email = $_POST["email"];
$username = $_POST["username"];
$phoneNum = $_POST["phone-num"];
$password = password_hash($_POST["password"], PASSWORD_BCRYPT);
$con->query("INSERT INTO `User` (`UserID`, `Email`, `Name`, `Password`, `PhoneNumber`) VALUES (NULL, '$email', '', '$password', '$phoneNum') ");
// $uploadfile = "img/" . basename($_FILES['img']['name']);
// move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
session_start();
$_SESSION['username'] = $username;
$_SESSION['user_id'] = $con->insert_id;
$con->query("INSERT INTO `Customer` (`CustomerID`, `UserID`, `Username`, `ProfilePicture`, `VerifyEmail`) VALUES (NULL, '$con->insert_id', '$username', '', FALSE) ");

$msg = "Thankyou for registering at UNIEat. Please enjoy our time together.
";
$msg = wordwrap($msg,70);
mail("someone@example.com","UNIEat",$msg);

$con->close();
header("Location: index.php");
?>