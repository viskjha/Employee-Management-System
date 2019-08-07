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
    $uname =$_POST['uname'];
    $uemail=$_POST['uemail'];
    $pass=sha1($_POST['upass']);
    $dep=$_POST['dep'];

    $query="INSERT INTO users (user_id, name, email, password, department)
            values ('', '$uname','$uemail','$pass', '$dep')";

    $res=mysqli_query($conn,$query);

    if($res)
    {
        $_SESSION['SUCCESS']="Data inserted succesfully";
        header('Location:register.php');
    }
    else {
        echo "Data not inserted";
    }
}
?>