<?php

  session_start();

  if(empty($_SESSION['id_user'])) {
    $_SESSION['callFrom'] = "apply-job-post.php?id=".$_GET[id];
    header("Location: login.php");
    exit();
  }

  require_once("db.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Job Details</title>

    <link rel="icon" href="img/favicon.png" type="image/x-icon"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

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
                  <li style="padding-right: 25px;"><a href="user/profile.php" style="font-size: 24px; color: #053a5a; line-height: 42px;">Profile</a></li>
                  <li style="padding-right: 25px;"><a href="logout.php" style="font-size: 24px; color: #053a5a; line-height: 42px;">Logout</a></li>
                </ul>
              </div>

            </div>

          </nav>
        </header>
      </div>
    </div>
  </section>

  <div style="background-color: #053a5a; height: 80px;">
    <p style="font-size: 34px; color: white; text-align: center; line-height: 75px;">Job Details</p>
  </div>

  <br>
  <br>

  <div class="container">

    <?php 
      $sql = "SELECT * FROM job_post WHERE id_jobpost='$_GET[id]'";
      $result = $conn->query($sql);
        if($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
        ?>

        <table align="center">

          <tr style="font-size: 26px;">
            <td style="color: #053a5a;"><strong>Job Title</strong></td>
            <td style="color: #053a5a;"> &nbsp;&nbsp;&nbsp;<strong>:</strong> </td>
            <td>&nbsp;&nbsp;&nbsp;<?php echo $row['jobtitle']; ?></td>
          </tr>

          <tr>
            <td colspan="3"><br></td>
          </tr>

          <tr style="font-size: 26px;">
            <td style="color: #053a5a;"><strong>Job Description</strong></td>
            <td style="color: #053a5a;"> &nbsp;&nbsp;&nbsp;<strong>:</strong> </td>
            <td style="padding-left: 15px;">&nbsp;&nbsp;&nbsp;<?php echo $row['description']; ?></td>
          </tr>

          <tr>
            <td colspan="3"><br></td>
          </tr>

          <tr style="font-size: 26px;">
            <td style="color: #053a5a;"><strong>Minimum Salary</strong></td>
            <td style="color: #053a5a;"> &nbsp;&nbsp;&nbsp;<strong>:</strong> </td>
            <td>&nbsp;&nbsp;&nbsp;Rs.<?php echo $row['minimumsalary']; ?> per Month</td>
          </tr>

          <tr>
            <td colspan="3"><br></td>
          </tr>

          <tr style="font-size: 26px;">
            <td style="color: #053a5a;"><strong>Maximum Salary</strong></td>
            <td style="color: #053a5a;"> &nbsp;&nbsp;&nbsp;<strong>:</strong> </td>
            <td>&nbsp;&nbsp;&nbsp;Rs.<?php echo $row['maximumsalary']; ?> per Month</td>
          </tr>

          <tr>
            <td colspan="3"><br></td>
          </tr>

          <tr style="font-size: 26px;">
            <td style="color: #053a5a;"><strong>Experience Required</strong></td>
            <td style="color: #053a5a;"> &nbsp;&nbsp;&nbsp;<strong>:</strong> </td>
            <td>&nbsp;&nbsp;&nbsp;<?php echo $row['experience']; ?></td>
          </tr>

          <tr>
            <td colspan="3"><br></td>
          </tr>

          <tr style="font-size: 26px;">
            <td style="color: #053a5a;"><strong>Qualification Required</strong></td>
            <td style="color: #053a5a;"> &nbsp;&nbsp;&nbsp;<strong>:</strong> </td>
            <td>&nbsp;&nbsp;&nbsp;<?php echo $row['qualification']; ?></td>
          </tr>

          <tr>
            <td colspan="3"><br></td>
          </tr>

          <tr>
            <td colspan="3"><br></td>
          </tr>

          <tr>
            <td></td>
            <td></td>
            <td><a href="apply.php?id=<?php echo $row['id_jobpost']; ?>" style="background-color: #053a5a; border-color: transparent; border-radius: 5px; padding-left: 25px; padding-right: 25px; padding-top: 10px; padding-bottom: 13px; color: white; font-size: 24px; text-decoration: none;">Apply</a></td>
          </tr>

        </table>

        <?php 
        }
      }
    ?>
  </div>
  <br><br>

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

  </body>
  
</html>