<?php 
   include("connection.php");
   error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- stylesheet -->
  <link rel="stylesheet" href="about.css">

  <!--fontawesome-->
  <script src="https://kit.fontawesome.com/ba2108e224.js" crossorigin="anonymous"></script>

    <title>Volunteer</title>
    <link rel="icon" type="image/icon" href="images/logo.jpeg">
</head>
<body>

<!--navigation-->
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
                      <li><a class="dropdown-item" href="volunteer.php" aria-current="page">Volunteer</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="donate.html">Donate</a></li>  
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="gallery_display.php">Gallery</a>
                  </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <button class="btn" ><a href="donate.html">DONATE</a></button>
                </ul>
              </div>
            </div>
          </nav>
    </header>

<br><br>
<div class="volunteer">
    <h1 style="font-family: 'Gideon Roman', cursive; font-size: 50px">VOLUNTEERING</h1><br><br><br>
    <h4 style="font-family: 'Gideon Roman', cursive;">At Dayspring, we welcome like-minded people who are friendly and proactive.</h4><br>
    <h4 style="font-family: 'Gideon Roman', cursive;">As a volunteer you can do almost anything you want to help the children: for example, construction work and  cooking with the children.If you are looking for a place to be really helpful in India, and share a moment with young local people, this place is for you!</h4><br><br>
    <h2 style="font-family: 'Gideon Roman', cursive;">REGISTER NOW</h2>    
</div>


<!-- volunteer reg-->
<div class="vol">
  <form id="regForm" action="actions.php" method="POST">

      <h1>Register here:</h1>
      
      <!-- One "tab" for each step in the form: -->
      <div class="tab">Name:
        <p><input type="text" placeholder="First name..." name="firstname" required></p>
        <p><input type="text" placeholder="Last name..." name="lastname" required></p>
      </div>
      
      <div class="tab">Contact Info:
        <p><input type="text" placeholder="E-mail..." name="email" required></p>
        <p><input type="text" placeholder="Phone..." name="phone" required></p>
      </div>
      
      <div class="tab">Date and time of volunteering:
        <p><input type="date" placeholder="" name="date" required></p>
        <p><input type="time" placeholder="" name="time" required></p>
        
      </div>
      
      
      
      <div style="overflow:auto;">
        <div style="float:right;">
          <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
          <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
        </div>
      </div>
      
      <!-- Circles which indicates the steps of the form: -->
      <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        
</div>

  </form>
     
</div>

      <script>
          var currentTab = 0; // Current tab is set to be the first tab (0)
          showTab(currentTab); // Display the current tab
          
          function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
              document.getElementById("prevBtn").style.display = "none";
            } else {
              document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
              document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
              document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
          }
          
          function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
              // ... the form gets submitted:
              document.getElementById("regForm").submit();
              return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
          }
          
          function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
              // If a field is empty...
              if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
              }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
              document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
          }
          
          function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
              x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
          }
          </script>

  <!--slider-->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        
        <div class="carousel-caption d-none d-md-block">
          <h4>TESTIMONIALS</h4>
          <p>"I spent nearly 6 months in Dayspring Home, during my year off from studies.
            I wanted to feel connected to people in need, and to gain an insight into development
             projects. I found exactly what I was looking for, and now find myself saying exactly 
             what I had been hearing before: If there is one place you need to choose to travel, 
             go to India.”</p>
         <p>-Tara</p>
             
        </div>
      </div>
      <div class="carousel-item">
       
        <div class="carousel-caption d-none d-md-block">
          <h4>TESTIMONIALS</h4>
          <p>“Dayspring Home is a Good place with a capital “G”. I’ve done a good amount of volunteering 
            in the last six months and Dayspring is the organization that it most warmed my heart to
             be part of.The kids are sweet and fun and good-crazy. I found it really nice to hang out 
             with the kids in the evening"</p>
             <p>-Samantha</p>    
        </div>
      </div>
      <div class="carousel-item">
        
        <div class="carousel-caption d-none d-md-block">
          <h4>TESTIMONIALS</h4>
          <p>"I was looking for a place to volunteer with kids and a friend recommended Dayspring Home to
            me. I lived in Dayspring with the children for two weeks, and they made me feel at
             home from the first moment.This has been a very beautiful experience" </p>
         <p>-Estella</p>    
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div>
<br><br><br><br>

  <!-- footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-4 mb-4">
          <h2>Blossom Trust</h2>
          <p>Dayspring Children's Home provides refuge to children between 6 and 16, affected or infected with HIV/AIDS. The children we care for are vulnerable, coming from severe poverty, parental death or social stigma.</p>
        </div>
  
        <div class="col-md-4 mb-5">
          <h2>Contact &amp; Address</h2>
          <ul class="list-unstyled footer-link">
            <li class="d-flex">
              <span class="me-3">Address:</span><span class="text-black">77, Sekkilar St, Sivagami Puram, Virudhunagar, Tamil Nadu 626001
              </span></span>
            </li>
            <li class="d-flex">
              <span class="me-3">Telephone:</span><span class="text-black">04562-269236, 6374484286</span>
            </li>
            <li class="d-flex">
              <span class="me-3">Email:</span><span class="text-black">blossomtrust@gmail.com</span>
            </li>
          </ul>
        </div>
  
        <div class="col-md-4">
          <h2>Social media</h2><br>
          <ul class="list-unstyled footer-link d-flex footer-social">
            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
            <li><a href="#"><span class="fa fa-instagram"></span></a></li>
            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
            <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
          </ul>
        </div>
  
        <div class="row">
          <div class="col-12 text-md-center text-left">
            <p></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  
  <!-- js bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>



