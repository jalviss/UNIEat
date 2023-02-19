<?php
require("mysql.php");
$name = $_POST["name"];
$email = $_POST["email"];
$phoneNum = $_POST["phone-num"];
$gender = $_POST["gender"];
$id = $_POST["id"];
$userId = $_POST["userId"];

$con->query("UPDATE `User` SET `Name` = '$name', `PhoneNumber` = '$phoneNum', `Email` = '$email' WHERE UserID = $userId");
$con->query("UPDATE `Admin` SET `Gender` = '$gender' WHERE AdminID = $id");
$con->close();
header("Location: ManageAdmin.php");
?>