<?php
session_start();
$username = $_SESSION["username"];
$id = $_SESSION["user_id"];
$con = mysqli_connect("localhost","root","","UNIEat");
$isTenant = false;
require("mysql.php");
$result = $con->query("SELECT * FROM Tenant t JOIN User u ON t.UserID = u.UserID WHERE t.UserID = '$id'");
if ($row = $result->fetch_assoc()) {
    $isTenant = true;
}
$result->free_result();
if ($isTenant) {
    header('Location: HomeTenant.php');
} else {
    header('Location: Home.php');
}
?>