<?php
//To Handle Session Variables on This Page
session_start();
//If user Not logged in then redirect them back to homepage. 
//This is required if user tries to manually enter dashboard.php in URL.
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
    <title>User Application</title>

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
    
    <!-- NAVIGATION BAR -->
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
                  <li style="padding-right: 25px;"><a href="dashboard.php" style="font-size: 24px; color: #053a5a; line-height: 42px;">Dashboard</a></li>
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
    <p style="font-size: 34px; color: white; text-align: center; line-height: 75px;">View User Application</p>
  </div>

  <br>
  <br>

    <div class="container">
      <div class="row">
        <div class="panel panel-info">
          <div class="panel-body" style="font-size: 20px; border: 2px solid #053a5a;">
            <?php
              $sql ="SELECT * FROM apply_job_post INNER JOIN users ON apply_job_post.id_user=users.id_user WHERE apply_job_post.id_user='$_GET[id_user]' AND apply_job_post.id_jobpost='$_GET[id_jobpost]'";
              $result=$conn->query($sql);
              if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
              ?>

              <table>

                <tr>
                  <td>Name</td>
                  <td>:</td>
                  <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                </tr>

                <tr>
                  <td colspan="3"><br></td>
                </tr>

                <tr>
                  <td>Email</td>
                  <td>:</td>
                  <td><?php echo $row['email']; ?></td>
                </tr>

                <tr>
                  <td colspan="3"><br></td>
                </tr>

                <tr>
                  <td>Address</td>
                  <td>:</td>
                  <td><?php echo $row['address']; ?></td>
                </tr>

                <tr>
                  <td colspan="3"><br></td>
                </tr>

                <tr>
                  <td>City</td>
                  <td>:</td>
                  <td><?php echo $row['city']; ?></td>
                </tr>

                <tr>
                  <td colspan="3"><br></td>
                </tr>

                <tr>
                  <td>State</td>
                  <td>:</td>
                  <td><?php echo $row['state']; ?></td>
                </tr>

                <tr>
                  <td colspan="3"><br></td>
                </tr>

                <tr>
                  <td>Contact No</td>
                  <td>:</td>
                  <td><?php echo $row['contactno']; ?></td>
                </tr>

                <tr>
                  <td colspan="3"><br></td>
                </tr>

                <tr>
                  <td>Qualification</td>
                  <td>:</td>
                  <td><?php echo $row['qualification']; ?></td>
                </tr>

                <tr>
                  <td colspan="3"><br></td>
                </tr>

                <tr>
                  <td>Stream</td>
                  <td>:</td>
                  <td><?php echo $row['stream']; ?></td>
                </tr>

                <tr>
                  <td colspan="3"><br></td>
                </tr>

                <tr>
                  <td>Passing Year</td>
                  <td>:</td>
                  <td><?php echo $row['passingyear']; ?></td>
                </tr>

                <tr>
                  <td colspan="3"><br></td>
                </tr>

                <tr>
                  <td>Date Of Birth&nbsp;&nbsp;&nbsp;</td>
                  <td>:&nbsp;&nbsp;&nbsp;</td>
                  <td><?php echo $row['dob']; ?></td>
                </tr>

                <tr>
                  <td colspan="3"><br></td>
                </tr>

                <tr>
                  <td>Designation</td>
                  <td>:</td>
                  <td><?php echo $row['designation']; ?></td>
                </tr>

              </table>

              <br>

                <?php
                if(isset($row['resume'])) {
                  ?>
                  <a href="../uploads/resume/<?php echo $row['resume']; ?>" class="btn btn-success" download="<?php echo $row['firstname']; ?>" style="font-size: 20px;">Download Resume</a>
                  <?php
                }
                ?>
                <a href="reject-user.php?id_user=<?php echo $_GET['id_user']; ?>&id_jobpost=<?php echo $row['id_jobpost']; ?>" class="btn btn-danger" style="font-size: 20px;">Reject User</a>

              <?php } } ?>

          </div>
        </div>
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
      $(function() {
        $(".successMessage:visible").fadeOut(2000);
      });
    </script>
  </body>
</html>