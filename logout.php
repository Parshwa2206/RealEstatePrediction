<?php  
    
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "register";

$error = "";

$con = new mysqli($servername, $username, $password, $db);

if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


unset($_SESSION["login"]);
echo "Loggedout Successfully";
header("Location:login.php");
?> 