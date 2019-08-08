<?php
include "../auth/auth.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>

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
            <form method="POST" action="updateuser.php" onsubmit="return formvalidation();">
                <fieldset>
                    <legend>Edit user Detail</legend>

                    <?PHP 
                        if(isset($_SESSION['SUCCESS']))
                        {
                            echo $_SESSION['SUCCESS'];
                            unset($_SESSION['SUCCESS']);
                        }
                    ?>
                    <?php
                    $user_id=$_GET['id'];
                    $query="select * from users where user_id='$user_id'";
                    $res=mysqli_query($conn,$query);
                    $data=mysqli_fetch_array($res);
                    ?>
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="uname" id="exampleInputName" value="<?php echo $data['name']; ?>" aria-describedby="nameHelp"
                            placeholder="Enter Name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="uemail" id="exampleInputEmail1" value="<?php echo $data['email']; ?>" aria-describedby="emailHelp"
                            placeholder="Enter email" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="upass" id="exampleInputPassword1" placeholder="Password">
                    </div>
                
                    <fieldset class="form-group">
                        <legend>Department</legend>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="dep" id="optionsRadios1"
                                    value="Web Developer" <?php if($data['department']=='Web Developer') { echo "checked";} ?>>
                                Web Developer
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="dep" id="optionsRadios2"
                                    value="SEO" <?php if($data['department']=='SEO') { echo "checked";} ?>>
                                SEO
                            </label>
                        </div>
                    </fieldset>

                    <fieldset class="form-group">
                        <legend>Role</legend>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="role" id="role"
                                    value="admin" <?php if($data['role']=='admin') { echo "checked";} ?>>
                                Admin
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="role" id="role"
                                    value="employee" <?php if($data['role']=='employee') { echo "checked";} ?>>
                                Employee
                            </label>
                        </div>
                    </fieldset>
            
                    <button type="submit" class="btn btn-primary">UPDATE</button>
                </fieldset>
            </form>
            <!-- Registe Form End -->
        </div>
    </div>

    <script src="./js/validate.js"></script>
</body>
</html>