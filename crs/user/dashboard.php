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
    <title>Dashboard</title>

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
    <p style="font-size: 34px; color: white; text-align: center; line-height: 75px;">My Dashboard</p>
  </div>

  <br>
  <br>

    <div class="container">

      <?php if(isset($_SESSION['jobApplySuccess'])) { ?> 
      <div>
                <p id="successMessage" style="text-align: center; color: red; font-size: 28px;">You have applied successfully!</p>
              </div>
      <?php unset($_SESSION['jobApplySuccess']); } ?>


      <!-- Other dashboard functions -->
      <div align="center">
          <a href="applied-jobs.php" style="background-color: #053a5a; border-color: transparent; border-radius: 5px; padding-left: 25px; padding-right: 25px; padding-top: 10px; padding-bottom: 13px; color: white; font-size: 18px; text-decoration: none;">Your Applied Jobs</a>
          <a href="resume.php" style="background-color: #053a5a; border-color: transparent; border-radius: 5px; padding-left: 25px; padding-right: 25px; padding-top: 10px; padding-bottom: 13px; color: white; font-size: 18px; text-decoration: none;">Upload/Download Resume</a>
      </div>
      <Br>
      <hr style="border-color:#053a5a;">
      <div style="height: 80px;">
    <p style="font-size: 38px; color: black; text-align: center; line-height: 75px;">Active Jobs</p>
  </div>



      <!-- Search & Apply to Job Posts -->
      <div class="row">

            <table border="2px solid #053a5a" class="table-striped" width="100%">
              <thead>
                <th style="padding-left: 15px; padding-right: 15px; font-size: 22px; width: 15%; padding-top: 10px; padding-bottom: 10px; color: #053a5a;">Job Name</th>
                <th style="padding-left: 15px; padding-right: 15px; font-size: 22px; width: 15%; padding-top: 10px; padding-bottom: 10px; color: #053a5a;">Job Description</th>
                <th style="padding-left: 15px; padding-right: 15px; font-size: 22px; width: 15%; padding-top: 10px; padding-bottom: 10px; color: #053a5a;">Minimum Salary</th>
                <th style="padding-left: 15px; padding-right: 15px; font-size: 22px; width: 15%; padding-top: 10px; padding-bottom: 10px; color: #053a5a;">Maximum Salary</th>
                <th style="padding-left: 15px; padding-right: 15px; font-size: 22px; width: 15%; padding-top: 10px; padding-bottom: 10px; color: #053a5a;">Experience</th>
                <th style="padding-left: 15px; padding-right: 15px; font-size: 22px; width: 10%; padding-top: 10px; padding-bottom: 10px; color: #053a5a;">Qualification</th>
                <th style="padding-left: 15px; padding-right: 15px; font-size: 22px; width: 15%; padding-top: 10px; padding-bottom: 10px; color: #053a5a;">Action</th>
              </thead>
              <tbody>
                <?php 
                  $sql = "SELECT * FROM job_post";
                  $result = $conn->query($sql);
                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) 
                    {
                      $sql1 = "SELECT * FROM apply_job_post WHERE id_user='$_SESSION[id_user]' AND id_jobpost='$row[id_jobpost]'";
                      $result1 = $conn->query($sql1);
                      
                     ?>
                      <tr>
                        <td style="padding-left: 15px; padding-right: 15px; font-size: 20px; width: 15%; padding-top: 10px; padding-bottom: 10px;"><?php echo $row['jobtitle']; ?></td>
                        <td style="padding-left: 15px; padding-right: 15px; font-size: 20px; width: 15%; padding-top: 10px; padding-bottom: 10px;"><?php echo $row['description']; ?></td>
                        <td style="padding-left: 15px; padding-right: 15px; font-size: 20px; width: 15%; padding-top: 10px; padding-bottom: 10px;">Rs.<?php echo $row['minimumsalary']; ?></td>
                        <td style="padding-left: 15px; padding-right: 15px; font-size: 20px; width: 15%; padding-top: 10px; padding-bottom: 10px;">Rs.<?php echo $row['maximumsalary']; ?></td>
                        <td style="padding-left: 15px; padding-right: 15px; font-size: 20px; width: 15%; padding-top: 10px; padding-bottom: 10px;"><?php echo $row['experience']; ?> Years</td>
                        <td style="padding-left: 15px; padding-right: 15px; font-size: 20px; width: 10%; padding-top: 10px; padding-bottom: 10px;"><?php echo $row['qualification']; ?></td>
  
                        <?php
                        if($result1->num_rows > 0) {
                          ?>
                            <td style="padding-left: 15px; padding-right: 15px; font-size: 20px; width: 15%; padding-top: 10px; padding-bottom: 10px;"><strong>Applied!</strong></td>
                          <?php
                        } else {
                       ?>
                       <td style="padding-left: 15px; padding-right: 15px; font-size: 20px; width: 15%; padding-top: 10px; padding-bottom: 10px;"><a href="apply-job-post.php?id=<?php echo $row['id_jobpost']; ?>">Apply</a></td>
                       <?php } ?>
                      </tr>
                     <?php
                    }
                  }
                  $conn->close();
                ?>
              </tbody>
            </table>
          </div>
        </div>
          <br><br>

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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $(function(){
        $(".successMessage:visible").fadeOut(5000);
      });
    </script>
  </font>
  </body>
</html>