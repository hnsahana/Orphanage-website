<html>
<?php

$conn = mysqli_connect("localhost","root","","index") or die("Connection Failed");

  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $dt = $_POST['date'];
  $tm = $_POST['time'];

 $sql = "INSERT INTO records(firstname,lastname,email,phone,date,time) VALUES ('{$fname}', '{$lname}', '{$email}','{$phone}','{$dt}','{$tm}')";
 $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

 $query= " SELECT firstname FROM records WHERE firstname IS NOT NULL";
 $res = mysqli_query($conn, $query) or die("Query Unsuccessful.");
 
 mysqli_close($conn);
 header("Location: http://localhost/final/thankyou.html");

 ?>
 <body>
 <script>
 function insertedmessage(){
     return confirm('Registration successful');
 }
</script>
<body>
</html> 

    

 