<?php
$con = mysqli_connect("localhost","root","","UNIEat");


$email = $_POST["email"];
$password = $_POST["password"];



session_start();
unset($_SESSION["login-error"]);
$result = $con->query("SELECT * FROM User WHERE Email = '$email'");
if($row=$result->fetch_assoc()) {
    if (password_verify($password, $row["Password"])) {
        $_SESSION["username"] = $row["Name"];
        $_SESSION['user_id'] = $row["UserID"];
        header('Location: index.php');
        return;
    }
}
$_SESSION["login-error"] = true;
header('Location: Login.php');
?>