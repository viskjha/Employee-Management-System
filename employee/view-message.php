<?php
include "../auth/auth.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>viwe message</title>

    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
</head>
<body>
    <?php include('header.php'); ?>
    
    <div class="container">
        <h3>Message Details View</h3>

        <?php
        $m_id = $_GET['id'];

        $query= "select * from task where t_id='$m_id' ";
            $res=mysqli_query($conn, $query);
            $count=mysqli_num_rows($res);
            $row=mysqli_fetch_array($res);
        ?>


        <div class="col-sm-12">
            <?php echo $row['task']; ?>
        </div>

        <div class="col-sm-3">
        <h2>Reply</h2>
        </div>
        
        <div class="col-sm-9">
        <?php
        if(isset($_REQUEST['m_reply']))
        {
            $mid=$_POST['m_id'];
            $user_id=$_POST['user_id'];
            $reply=mysqli_real_escape_string($conn,$_POST['m_reply']);


            $query="insert into task_reply(r_id, reply, m_id, reply_by)
                     values('','$reply','$mid','$user_id')";
            
            $res=mysqli_query($conn,$query);
            if($res)
            {
                echo "Reply Inserted Sussfully";
            }
            else {
                echo "Error, Please try again";
            }
        }
        ?>
        <form action="" method="post">
        <input type="hidden" name="m_id" value="<?php echo $m_id; ?>">
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
        <textarea name="m_reply" id="" cols="30" rows="5" style="width:100%;"></textarea>
         <button type="submit" class="btn btn-primary">Submit Reply</button>
        </form><br>

        <div class="col-sm-3">
        <h2>Your Reply</h2>
        </div>
        <div class="col-lg-10">
        <?php
          $m_id = $_GET['id'];
            $query= "select * from task_reply where m_id='$m_id' AND reply_by='". $_SESSION['user_id'] ."'";
            $resl=mysqli_query($conn, $query);
            $countl=mysqli_num_rows($resl);
            while ($rowl=mysqli_fetch_array($resl))
            {
        ?>

        <div class="col-sm-12">
        <?php echo $rowl['reply']; ?>
        </div>

        <?php
          }
        ?>
        </div>
        </div>
    </div>

    <script src="./js/validate.js"></script>
</body>
</html>