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
if(isset($_REQUEST['message']))
{
    $message =mysqli_real_escape_string($conn,$_POST['message']);
    $assign_by =$_POST['assign_by'];
    $emplist=$_POST['emp'];

    foreach($emplist as $emp)
    {

    $query="INSERT INTO task (t_id, task, user_id, assigned_by)
            values ('', '$message','$emp','$assign_by')";

    $res=mysqli_query($conn,$query);

    if($res)
    {
        $_SESSION['SUCCESS']="Message Send succesfully";
        header('Location:task.php');
    }
    else {
        echo "Data not inserted";
    }
    }
}
?>