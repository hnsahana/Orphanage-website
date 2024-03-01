<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="admin.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>records of volunteering</title>
</head>
<body>
    
<div id="main-content">
    <h2>Volunteer Records</h2>
    <?php
      include 'config.php';

      $sql = "SELECT * FROM records";
      $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

      if(mysqli_num_rows($result) > 0)  {
    ?>
    <table cellpadding="3px" border="2">
        <thead>
        
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Date</th>
        <th>Time</th>
        <th>Operation</th>

        </thead>
        <tbody>
          <?php
            while($row = mysqli_fetch_assoc($result)){
          ?>
            <tr>
                
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td>
                    <a  href="<?php $_SERVER['PHP_SELF'] ?>?del=<?php echo $row['firstname'] ?>" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
          <?php } ?>
        </tbody>
    </table>
  <?php }else{
    echo "<h2>No Record Found</h2>";
  }
  mysqli_close($conn);
  ?>
</div>
</div>

</body>
</html>

<!-- delete record  -->
<?php 
include 'config.php';

if(isset($_GET['del'])){
  $fname = $_GET['del']; 
  $query= "DELETE FROM records WHERE firstname='$fname'";
  $result=mysqli_query($conn,$query) or die("not deleted".mysqli-error($conn));
  if($result) echo "";
}
else{
  echo "";
}
?>

