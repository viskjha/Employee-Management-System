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


//Login account process
if(isset($_POST['uemail']))
{
    $uemail=$_POST['uemail'];
    $pass=sha1($_POST['upass']);

    $query= "select * from users where email='$uemail' AND password='$pass'";

    $res=mysqli_query($conn, $query);

    $count=mysqli_num_rows($res);
    if($count==1)
    {
        echo "Login Success";
    }
    else {
        $_SESSION['error']="Wrong Email or password";
        header('Location:login.php');
    }
}

?>