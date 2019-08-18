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
      <h3>All Task List</h3>  

      <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Sr No.</th>
      <th scope="col">Task</th> 
      <th scope="col">Date</th> 
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $i=1;
  $query= "select * from task where user_id='". $_SESSION['user_id']. "' ";

    $res=mysqli_query($conn, $query);
    $count=mysqli_num_rows($res);
    if($count>0)
    {
    while($row=mysqli_fetch_array($res))
    {

  ?>
    <tr class="table-active">
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo substr($row['task'],0,50); ?></td>
      <td><?php echo $row['date_time']; ?></td>
      <td><a href="view-message.php?id=<?php echo $row['t_id']; ?>">View</a>
    </tr>
    <?php $i++; }} else {
        echo "No record Found!";
    }?>
  </tbody>
</table> 
    </div>

    <script src="./js/validate.js"></script>
</body>
</html>