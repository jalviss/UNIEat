<?php
session_start();
//$id = isset($_SESSION["user_id"]);
require("mysql.php");
//$result = $con->query("SELECT * FROM Admin a JOIN User u ON a.UserID = u.UserID WHERE a.UserID = '$id'");
if (isset($_SESSION["user_id"])) {
    
} else {
    Header("Location: Login.php");
}
//$result->free_result();
// $result = $con->query("SELECT * FROM Tenant t JOIN User u ON t.UserID = u.UserID WHERE t.UserID = '$id'");
// if ($row = $result->fetch_assoc()) {
//     $isTenant = true;
//     $username = $row['Name'];
//     $profpic = $row['Picture'];
// }
// $result->free_result();
// $result = $con->query("SELECT * FROM Customer WHERE UserID = '$id'");
// if ($row = $result->fetch_assoc()) {
//     $isCustomer = true;
//     $username = $row['Username'];
//     $profpic = $row['ProfilePicture'];
// }
// $result->free_result();
$con->close();