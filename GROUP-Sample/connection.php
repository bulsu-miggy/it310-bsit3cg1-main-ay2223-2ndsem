<?php
$sname = "localhost";
$user = "root";
$pass = "";
$db = "infoweb";

$conn = mysqli_connect($sname, $user, $pass, $db);

if (!$conn){
    echo "Connection Failed!";
}
?>