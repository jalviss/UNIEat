<?php
session_start();
require("mysql.php");
$username = $_SESSION["username"];
$userid = $_SESSION["user_id"];
$quantity = $_POST["quantity"];
$productId = $_POST["id"];
$note = $_POST["note"];

$result=$con->query("SELECT * FROM Customer WHERE UserID = userid ");

if($row = $result->fetch_assoc()){
    $id = $row["CustomerID"];

}

$con->query("INSERT INTO `Cart` (`CartID`, `CustomerID`, `ProductID`, `Quantity`, `Note`) VALUES (NULL, '$id', '$productId', '$quantity', '$note') ");
//echo "INSERT INTO `Cart` (`CartID`, `CustomerID`, `ProductID`, `Quantity`, `Note`) VALUES (NULL, '$id', '$productId', '$quantity', '$note') ";
$con->close();
header("Location: index.php");
?>