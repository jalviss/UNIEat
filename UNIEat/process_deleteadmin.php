<?php
require("mysql.php");
$id = $_POST["id"];
$userId = $_POST["userId"];



$con->query("DELETE FROM `Admin` WHERE AdminID = $id");
$con->query("DELETE FROM `User` WHERE UserID = $userId");
// echo "DELETE FROM `Admin` WHERE AdminID = $id";
// echo "DELETE FROM `User` WHERE UserID = $userId";
$con->close();
header("Location: ManageAdmin.php");
?>