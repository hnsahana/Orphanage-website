<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <!-- stylesheet -->
<link rel="stylesheet" href="style.css">

<!--fontawesome-->
<script src="https://kit.fontawesome.com/ba2108e224.js" crossorigin="anonymous"></script>

<title>Gallery</title>
<link rel="icon" type="image/icon" href="images/logo.jpeg">
</head>
<body style="background-color:white;">
    
    <header class="header">
        <nav class="navbar navbar-expand-lg  ">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Blossom Trust</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
              </button>
              <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active"  href="home.html">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about.html">About Us</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Support Us
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="volunteer.php">Volunteer</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="donate.html">Donate</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="gallery_display.php" aria-current="page">Gallery</a>
                  </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <button class="btn" ><a href="donate.html" aria-current="page">DONATE</a></button>
                </ul>
              </div>
            </div>
          </nav>
    </header>
     
    
    <?php

include "config.php";

$query="SELECT * FROM gallery";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);

if($total != 0){
    
    while($result=mysqli_fetch_assoc($data)){
        
        
        echo "<a href='$result[source]'><img src='".$result['source']."' width='300' height='300'  style=' padding: 30px;' /> ";
        
    }
    
}else{
    echo " no records found.";
}

?>


<br><br><br><br><br>


<!-- js bootstrap-->
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>

