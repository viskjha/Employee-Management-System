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
    $row=mysqli_fetch_array($res);
    if($count==1)
    {
        //Auth session
        $session_id=session_id();
        $_SESSION['auth']= $session_id;
        //End of Auth session


        $role=$row['role'];
        if($role=='admin')
        {
            header('Location: admin/dashbord.php');
            echo "Login Success";
        }
        elseif ($role=='employee') {
            header('Location: employee/dashbord.php');
            echo "Login Success";
        }
        else {
            header('Location: login.php');
        }
    }
    else {
        $_SESSION['error']="Wrong Email or password";
        header('Location:login.php');
    }
}

?>