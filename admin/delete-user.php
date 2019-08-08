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

$user_id=$_GET['id'];

$query="delete from users where user_id='$user_id'";

    $res=mysqli_query($conn,$query);

    if($res)
    {
        $_SESSION['SUCCESS']="Delete user succesfully";
        header('Location:dashbord.php');
    }
    else {
        echo "User not delete";
    }