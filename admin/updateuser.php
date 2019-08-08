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

//Insert query for register Page.
if(isset($_REQUEST['uemail']))
{
    $user_id=$_POST['user_id'];
    $uname =$_POST['uname'];
    $uemail=$_POST['uemail'];
    $pass=sha1($_POST['upass']);
    $dep=$_POST['dep'];
    $role=$_POST['role'];
    if($_POST['upass']=='')
    {
    $query="UPDATE users SET name='$uname', email='$uemail', department='$dep', role='$role' where user_id='$user_id'";
    }
    else {

    $query="UPDATE users SET name='$uname', email='$uemail', password='$pass', department='$dep', role='$role' where user_id='$user_id'";
            }
    $res=mysqli_query($conn,$query);

    if($res)
    {
        $_SESSION['SUCCESS']="Data update succesfully";
        header('Location:dashbord.php');
    }
    else {
        echo "Data not Updated";
    }
}
?>