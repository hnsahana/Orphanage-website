<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" value="Upload" name="submit" >
    </form>

</body>
</html>

<?php

include "config.php";

if(isset($_FILES['image'])){
    

    $file_name=$_FILES['image']['name'];
    $file_size=$_FILES['image']['size'];
    $file_tmp=$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $folder="gallery/".$file_name;

    if(move_uploaded_file($file_tmp, $folder)){
        $query="INSERT INTO gallery VALUES('$folder')";
        $data=mysqli_query($conn,$query);
    }else{
        echo "Couldn't upload the file.";
    }

}


?>