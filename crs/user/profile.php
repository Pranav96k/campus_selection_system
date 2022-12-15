<?php
  session_start();
  if(empty($_SESSION['id_user'])) {
    header("Location: ../index.php");
    exit();
}
require_once("../db.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>User Profile</title>

    <link rel="icon" href="../img/favicon.png" type="image/x-icon"/>

    <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  <font face="calibri">

    <!-- Navigation Bar Start -->
  <section>
    <div class="container">
      <div class="row">
        <header>
          <nav class="navbar navbar-default" style="margin-bottom: 0; height: 80px; background-color: white; border-color: transparent;">
            <div class="container-fluid">

              <div class="navbar-header">
                <a class="navbar-brand" style="font-size: 24px; color: #053a5a; line-height: 42px;" href="../index.php">ADCET</a>
              </div>

              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
                <ul class="nav navbar-nav navbar-right">
                  <li style="padding-right: 25px;"><a href="profile.php" style="font-size: 24px; color: #053a5a; line-height: 42px;">Profile</a></li>
                  <li style="padding-right: 25px;"><a href="../logout.php" style="font-size: 24px; color: #053a5a; line-height: 42px;">Logout</a></li>
                </ul>
              </div>

            </div>

          </nav>
        </header>
      </div>
    </div>
  </section>

    <div style="background-color: #053a5a; height: 80px;">
    <p style="font-size: 34px; color: white; text-align: center; line-height: 75px;">View / Update Profile</p>
  </div>

  <br>

      <div class="container">
        <div class="row">

            <form method="post" action="updateprofile.php">
                        <div class="col-md-6">
              <?php 
                $sql = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
               ?>
              <div class="form-group">
                <label for="fname" style="font-size: 20px; color: #053a5a;">First Name :</label>
                <input style="font-size: 20px; padding-left: 15px; padding-right: 15px; border: 1px solid black; border-radius: 5px; width: 100%; height: 40px; color: black;" type="text" class="form-control" id="fname" name="fname" placeholder="First Name" value="<?php echo $row['firstname']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="lname" style="font-size: 20px; color: #053a5a;">Last Name :</label>
                <input style="font-size: 20px; padding-left: 15px; padding-right: 15px; border: 1px solid black; border-radius: 5px; width: 100%; height: 40px; color: black; " type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" value="<?php echo $row['lastname']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="email" style="font-size: 20px; color: #053a5a;">Email Address :</label>
                <input style="font-size: 20px; padding-left: 15px; padding-right: 15px; border: 1px solid black; border-radius: 5px; width: 100%; height: 40px; color: black; " type="email" class="form-control" id="email"  placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
              </div>
              <div class="form-group">
                <label for="address" style="font-size: 20px; color: #053a5a;">Address :</label>
                <textarea style="font-size: 20px; padding-left: 15px; padding-right: 15px; border: 1px solid black; border-radius: 5px; color: black; " id="address" name="address" class="form-control" rows="4" placeholder="Address"><?php echo $row['address']; ?></textarea>
              </div>
              <div class="form-group">
                <label for="city" style="font-size: 20px; color: #053a5a;">City :</label>
                <input style="font-size: 20px; padding-left: 15px; padding-right: 15px; border: 1px solid black; border-radius: 5px; width: 100%; height: 40px; color: black; " type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php echo $row['city']; ?>">
              </div>
              <div class="form-group">
                <label for="state" style="font-size: 20px; color: #053a5a;">State :</label>
                <input style="font-size: 20px; padding-left: 15px; padding-right: 15px; border: 1px solid black; border-radius: 5px; width: 100%; height: 40px; color: black; " type="text" class="form-control" id="state" name="state" placeholder="State" value="<?php echo $row['state']; ?>">
              </div>
                  </div>
          <div class="col-md-6">
              <div class="form-group">
                <label for="contactno" style="font-size: 20px; color: #053a5a;">Contact Number :</label>
                <input style="font-size: 20px; padding-left: 15px; padding-right: 15px; border: 1px solid black; border-radius: 5px; width: 100%; height: 40px; color: black; " type="number" class="form-control" id="contactno" minlength="10" maxlength="10" name="contactno" placeholder="Contact Number" value="<?php echo $row['contactno']; ?>">
              </div>

              <div class="form-group" style="font-size: 20px; color: #053a5a;">
                <label for="qualification">Highest Qualification :</label>
                <input style="font-size: 20px; padding-left: 15px; padding-right: 15px; border: 1px solid black; border-radius: 5px; width: 100%; height: 40px; color: black; " type="text" class="form-control" id="qualification" name="qualification" placeholder="Qualification" value="<?php echo $row['qualification']; ?>">
              </div>
              <div class="form-group" style="font-size: 20px; color: #053a5a;">
                <label for="stream">Stream :</label>
                <input style="font-size: 20px; padding-left: 15px; padding-right: 15px; border: 1px solid black; border-radius: 5px; width: 100%; height: 40px; color: black; " type="text" class="form-control" id="stream" name="stream" placeholder="Stream" value="<?php echo $row['stream']; ?>">
              </div>
              <div class="form-group" style="font-size: 20px; color: #053a5a;">
                <label for="passingyear">Passing Year :</label>
                <input style="font-size: 20px; padding-left: 15px; padding-right: 15px; border: 1px solid black; border-radius: 5px; width: 100%; height: 40px; color: black; " type="date" class="form-control" id="passingyear" name="passingyear" placeholder="Passing Year" value="<?php echo $row['passingyear']; ?>">
              </div>
              <div class="form-group" style="font-size: 20px; color: #053a5a;">
                <label for="dob">Date of Birth :</label>
                <input style="font-size: 20px; padding-left: 15px; padding-right: 15px; border: 1px solid black; border-radius: 5px; width: 100%; height: 40px; color: black; " type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" value="<?php echo $row['dob']; ?>">
              </div>
              <div class="form-group" style="font-size: 20px; color: #053a5a;">
                <label for="age">Age :</label>
                <input style="font-size: 20px; padding-left: 15px; padding-right: 15px; border: 1px solid black; border-radius: 5px; width: 100%; height: 40px; color: black; " type="text" class="form-control" id="age" name="age" placeholder="Age" value="<?php echo $row['age']; ?>">
              </div>
              <div class="form-group" style="font-size: 20px; color: #053a5a;">
                <label for="designation">Designation :</label>
                <input style="font-size: 20px; padding-left: 15px; padding-right: 15px; border: 1px solid black; border-radius: 5px; width: 100%; height: 40px; color: black; " type="text" class="form-control" id="designation" name="designation" placeholder="Designation" value="<?php echo $row['designation']; ?>">
              </div>          </div>
            <div class="col-md-12">
              <br>
            </div>
            <div class="col-md-12">
              <div class="text-center">
                <button type="submit" style="font-size: 18px; background-color: #053a5a; color: white; width: 15%; height: 50px; border-color: transparent; border-radius: 5px;">Update</button>
              </div>
            </div>
              <?php 
                }
              }
            ?>

            </form>
          </div>
        </div>
      </div>

      <br>

<footer id="footer" style="background-color: #053a5a; height: 80px;">

    <p style="color:white; font-size: 20px; line-height: 80px; text-align: center;"> 
      Copyright &copy; 2023-2022 <a href="index.php" style="color:white;">pranavkumthekar06@gmail.com </a>
    </p>

    <div align="center" style="background-color: #053a5a; margin-top: -1.4%; height: 55px;">
      <a href="https://www.facebook.com/TataConsultancyServices" target="_blank"><img src="../img/facebook.png" style="width: 30px; height: 30px; margin-left: 5px; margin-right: 5px;" /></a>
      <a href="https://www.twitter.com/tcs" target="_blank"><img src="../img/twitter.png" style="width: 30px; height: 30px; margin-left: 5px; margin-right: 5px;" /></a>
      <a href="https://www.youtube.com/channel/UCaHyiyvJp4hhPNhIU7r9uqg" target="_blank"><img src="../img/youtube.png" style="width: 30px; height: 30px; margin-left: 5px; margin-right: 5px;" /></a>
    </div>

  </footer>

    <!-- Navigation Bar End -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</font>
  </body>
</html>