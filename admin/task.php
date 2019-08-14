<?php
include "../auth/auth.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task</title>

    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
</head>
<body>

    <?php include('header.php'); ?>

    
    <div class="container">
        <div class="col-xs-6 col-xs-push-3">
            <!-- Register Form -->
            <form method="POST" action="insertuser.php" onsubmit="return formvalidation();">
                <fieldset>
                    <legend>Assign Task</legend>

                    <?PHP 
                        if(isset($_SESSION['SUCCESS']))
                        {
                            echo $_SESSION['SUCCESS'];
                            unset($_SESSION['SUCCESS']);
                        }
                    ?>

                    <!-- left box -->
                    <div class="col-xs-6">

                    <fieldset class="form-group">
                        <legend>Department</legend>


                        <?php
                        $query= "select * from users where role='employee' order by user_id DESC";

                            $res=mysqli_query($conn, $query);
                            $count=mysqli_num_rows($res);
                            
                            while($row=mysqli_fetch_array($res))
                            {

                        ?>


                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="emp[]" id="optionsRadios1"
                                    value="<?php echo $row['user_id']; ?>" checked="">
                                    <?php echo $row['name'];?>
                            </label>
                        </div>

                            <?php } ?>
                    </fieldset>

                    </div>

                    <!-- right box -->
                    <div class="col-xs-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Message</label>
                        <textarea type="text" row="10" class="form-control" name="message" id="exampleInputName" aria-describedby="nameHelp"
                            placeholder="Enter Message" required></textarea>
                    </div>
                    </div>


                    

                    
            
                    <button type="submit" class="btn btn-primary">Submit</button>
                </fieldset>
            </form>
            <!-- Registe Form End -->
        </div>
    </div>

    <script src="./js/validate.js"></script>
</body>
</html>