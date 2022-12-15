<?php

  session_start();
  if(isset($_SESSION['id_user']) && empty($_SESSION['companyLogged'])) {
    header("Location: user/dashboard.php");
    exit();
  } else if(isset($_SESSION['id_user']) && isset($_SESSION['companyLogged'])) {
  header("Location: company/dashboard.php");
  exit();
  }
?>

<html>
  <head>
    <title>Student Registration</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="icon" href="img/favicon.png" type="image/x-icon"/>

  </head>
  <body>

  <font face="calibri">

  <section>
    <div class="container">
      <div class="row">
      <header>
      <nav class="navbar navbar-default" style="margin-bottom: 0; height: 80px; background-color: white; border-color: transparent;">
        <div class="container-fluid">

          <div class="navbar-header">
            <a class="navbar-brand" style="font-size: 24px; color: #053a5a; line-height: 42px;" href="index.php">ADCET</a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">     
            <ul class="nav navbar-nav navbar-right">
            <?php
            if(isset($_SESSION['id_user']) && empty($_SESSION['companyLogged'])) {
              ?>
              <li style="padding-right: 25px;"><a href="user/dashboard.php" style="font-size: 24px; color: #053a5a; line-height: 42px;">Dashboard</a></li>
              <li style="padding-right: 25px;"><a href="logout.php" style="font-size: 24px; color: #053a5a; line-height: 42px;">Logout</a></li>
              <?php 
              } else if(isset($_SESSION['id_user']) && isset($_SESSION['companyLogged'])){
              ?>
              <li style="padding-right: 25px;"><a href="company/dashboard.php" style="font-size: 24px; color: #053a5a; line-height: 42px;">Dashboard</a></li>
              <li style="padding-right: 25px;"><a href="logout.php" style="font-size: 24px; color: #053a5a; line-height: 42px;">Logout</a></li>
              <?php } else { 
              ?>
              <li style="padding-right: 25px;"><a href="search.php" style="font-size: 24px; color: #053a5a; line-height: 42px;">Search for Jobs</a></li>
              <li style="padding-right: 25px;"><a href="mainregister.php" style="font-size: 24px; color: #053a5a; line-height: 42px;">Register</a></li>
              <li style="padding-right: -25px;"><a href="mainlogin.php" style="font-size: 24px; color: #053a5a; line-height: 42px;">Login</a></li>
            <?php } ?>
            </ul>
          </div>
        </div>
      </nav>
      </header>
      </div>
    </div>
  </section>

  <div style="background-color: #053a5a; height: 80px;">
    <p style="font-size: 34px; color: white; text-align: center; line-height: 73px;">Register as a Student</p>
  </div>

  <br>

  <p style="font-size: 18px; color: red; text-align: center;"> ( Fields marked with * are required. ) </p>
  <br>
      <div class="container">
        <div class="row">
          <form method="post" action="adduser.php" enctype="multipart/form-data">

          <div class="col-md-12" align="center">
          <?php 
              //If User already registered with this email then show error message.
              if(isset($_SESSION['registerError'])) {
                ?>
                <div class="form-group">
                  <label style="text-align: center; color: red; font-size: 28px;">Email Already Exists! Choose A Different Email!</label>
                </div>
              <?php
               unset($_SESSION['registerError']); }
              ?> 

              <?php if(isset($_SESSION['uploadError'])) { ?>
              <div class="form-group">
                  <label style="text-align: center; color: red; font-size: 28px;"><?php echo $_SESSION['uploadError']; ?></label>
              </div>
              <?php unset($_SESSION['uploadError']); } ?> 
            </div>

          <div class="col-md-6">

              <label style="font-size: 18px;">First Name : </label>
              <div>
                <input style="border:1px solid black; border-radius: 5px; width: 80%; height: 45px; padding: 15px; font-size: 18px;" type="text" id="fname" name="fname" placeholder="First Name *" required>
              </div>

              <br>

              <label style="font-size: 18px;">Last Name : </label>
              <div>
                <input style="border:1px solid black; border-radius: 5px; width: 80%; height: 45px; padding: 15px; font-size: 18px;" type="text" id="lname" name="lname" placeholder="Last Name *" required>
              </div>

              <br>

              <label style="font-size: 18px;">Email Address : </label>
              <div>
                <input style="border:1px solid black; border-radius: 5px; width: 80%; height: 45px; padding: 15px; font-size: 18px;" type="email" id="email" name="email" placeholder="Email Address *" required>
              </div>

              <br>

              <label style="font-size: 18px;">Date Of Birth : </label>
              <div>
                <input style="border:1px solid black; border-radius: 5px; width: 80%; height: 45px; padding: 15px; font-size: 18px;" type="date" id="dob" name="dob" placeholder="Date of Birth *" min="1985-01-01" max="2003-01-01" required="">
              </div>

              <br>

              <label style="font-size: 18px;">Age : </label>
              <div>
                <input style="border:1px solid black; border-radius: 5px; width: 80%; height: 45px; padding: 15px; font-size: 18px;" type="number" id="age" min="1" max="99" name="age" placeholder="Age *" required="">
              </div>

              <br>

              <label style="font-size: 18px;">Passing Year : </label>
              <div>
                <input style="border:1px solid black; border-radius: 5px; width: 80%; height: 45px; padding: 15px; font-size: 18px;" type="date" id="passingyear" name="passingyear" placeholder="Passing Year *" required="">
              </div>

              <br>

              <label style="font-size: 18px;">Qualification : </label>
              <div>
                <input style="border:1px solid black; border-radius: 5px; width: 80%; height: 45px; padding: 15px; font-size: 18px;" type="text" id="qualification" name="qualification" placeholder="Qualification *" required="">
              </div>

              <br>

              <label style="font-size: 18px;">Stream : </label>
              <div>
                <input style="border:1px solid black; border-radius: 5px; width: 80%; height: 45px; padding: 15px; font-size: 18px;" type="text" id="stream" name="stream" placeholder="Stream">
              </div>

              <br>  

          </div>    

          <div class="col-md-6">             

              <label style="font-size: 18px;">Password : </label>
              <div>
                <input style="border:1px solid black; border-radius: 5px; width: 80%; height: 45px; padding: 15px; font-size: 18px;" type="password" id="password" name="password" placeholder="Password *" required="">
              </div>

              <br>
              
              <label style="font-size: 18px;">Contact Number : </label>
              <div class="form-group">
                <input style="border:1px solid black; border-radius: 5px; width: 80%; height: 45px; padding: 15px; font-size: 18px;" type="number" id="contactno" pattern="[0-9]{10}" name="contactno" minlength="10" maxlength="10" class="form-control" placeholder="Phone Number *" value="" required="">
              </div>

              <br>

              <label style="font-size: 18px;">Address : </label>
              <div>
                <textarea style="border:1px solid black; border-radius: 5px; width: 80%; padding: 15px; font-size: 18px;" rows="4" id="address" name="address" placeholder="Address *" required=""></textarea>
              </div>

              <br> 

              <label style="font-size: 18px;">City : </label>
              <div>
                <input style="border:1px solid black; border-radius: 5px; width: 80%; height: 45px; padding: 15px; font-size: 18px;" type="text" id="city" name="city" placeholder="City">
              </div>

              <br>

              <label style="font-size: 18px;">State : </label>
              <div>
                <input style="border:1px solid black; border-radius: 5px; width: 80%; height: 45px; padding: 15px; font-size: 18px;" type="text" id="state" name="state" placeholder="State">
              </div>

              <br>

              <label style="font-size: 18px;">Designation : </label>
              <div>
                <input style="border:1px solid black; border-radius: 5px; width: 80%; height: 45px; padding: 15px; font-size: 18px;" type="text" id="designation" name="designation" placeholder="Designation">
              </div>

              <br>

              <div>
                <label style="color: red; font-size: 18px;">Upload Resume (PDF or DOC)</label>
                <input type="file" name="resume" style="font-size: 15px;" class="btn btn-flat btn-danger" required>
              </div>

              <br>

          </div>


    <div class="col-md-12" align="center">
      <div>
        <button style="font-size: 18px; color: white; background-color: #053a5a; border-color: transparent; border-radius: 5px; width: 12%; height: 45px;">Register</button>
      </div>
    </div>

  </form>
    
  </div>
  </div>

  <br>
  <br>

  </div>


  <footer id="footer" style="background-color: #053a5a; height: 80px;">

    <p style="color:white; font-size: 20px; line-height: 80px; text-align: center;"> 
      Copyright &copy; 2022-2023 <a href="index.php" style="color:white;">pranavkumthekar06@gmail.com </a>
    </p>

    <div align="center" style="background-color: #053a5a; margin-top: -1.4%; height: 55px;">
      <a href="https://www.facebook.com/TataConsultancyServices" target="_blank"><img src="img/facebook.png" style="width: 30px; height: 30px; margin-left: 5px; margin-right: 5px;" /></a>
      <a href="https://www.twitter.com/tcs" target="_blank"><img src="img/twitter.png" style="width: 30px; height: 30px; margin-left: 5px; margin-right: 5px;" /></a>
      <a href="https://www.youtube.com/channel/UCaHyiyvJp4hhPNhIU7r9uqg" target="_blank"><img src="img/youtube.png" style="width: 30px; height: 30px; margin-left: 5px; margin-right: 5px;" /></a>
    </div>

  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  
  </font>
  </body>


</html>