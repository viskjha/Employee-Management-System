<?php
session_start();

$host="localhost";
$username="root";
$pass="";
$db="ems";

$conn=mysqli_connect($host,$username,$pass,$db);
if(!$conn)
{
    die("Database connection Error");
}


if(!isset($_SESSION['auth']))
{
    header('Location:../login.php');
}
?>