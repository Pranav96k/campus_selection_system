<?php
//To Handle Session Variables on This Page
session_start();
//If user Not logged in then redirect them back to homepage. 
//This is required if user tries to manually enter dashboard.php in URL.
if(empty($_SESSION['id_admin'])) {
	header("Location: index.php");
	exit();
}
//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../db.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Job Posts List</title>

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
          <a class="navbar-brand" style="font-size: 24px; color: #053a5a; line-height: 42px;" href="index.php">ADCET</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">     
          <ul class="nav navbar-nav navbar-right">
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
    <p style="font-size: 34px; color: white; text-align: center; line-height: 73px;">Admin Panel</p>
  </div>
  <br>

    <div class="container">
      <div class="row">
        <div class="col-md-12" align="center">
          <div class="list-group" align="center" style="width: 50%; border: 1px solid #053a5a; border-radius: 5px;">
            <a href="dashboard.php" class="list-group-item" style="font-size: 20px;">Dashboard</a>
            <a href="user.php" class="list-group-item" style="font-size: 20px;">Users</a>
            <a href="company.php" class="list-group-item" style="font-size: 20px;">Company</a>
            <a href="job-posts.php" class="list-group-item active" style="font-size: 20px;">Job Posts</a>
          </div>
        </div>
        <br>
         <div class="col-md-12" align="center" style="font-size: 22px;" id="print">
        <?php
          $sql = "SELECT * FROM job_post";
          $result = $conn->query($sql);
          if($result->num_rows > 0) {
            echo '<h3>Total Number of Job Posts: ' . $result->num_rows . '</h3>'; 
          }
        ?>
        <br>
          <table class="table">
            <thead>
              <th style="font-size: 22px; color: #053a5a; width: 5%">Sr.No</th>
              <th style="font-size: 22px; color: #053a5a; width: 15%">Job Title</th>
              <th style="font-size: 22px; color: #053a5a; width: 20%">Job Description</th>
              <th style="font-size: 22px; color: #053a5a; width: 15%">Minimum Salary</th>
              <th style="font-size: 22px; color: #053a5a; width: 15%">Maximum Salary</th>
              <th style="font-size: 22px; color: #053a5a; width: 20%">Total Users Applied</th>
              <th style="font-size: 22px; color: #053a5a; width: 5%">Action</th>
            </thead>
            <tbody>
              <?php
                $sql = "SELECT * FROM job_post";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                  $i = 0;
                  while($row = $result->fetch_assoc()) {
                    ?>
                      <tr>
                        <td style="font-size: 20px;"><?php echo ++$i; ?></td>
                        <td style="font-size: 20px;"><?php echo $row['jobtitle']; ?></td>
                        <td style="font-size: 20px;"><?php echo $row['description']; ?></td>
                        <td style="font-size: 20px;"><?php echo $row['minimumsalary']; ?></td>
                        <td style="font-size: 20px;"><?php echo $row['maximumsalary']; ?></td>
                        <?php
                          $sql1 = "SELECT COUNT(apply_job_post.id_apply) AS totalNo FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost WHERE job_post.id_jobpost='$row[id_jobpost]'";
                          $result1 = $conn->query($sql1);
                          if($result1->num_rows > 0) {
                             while($row1 = $result1->fetch_assoc()) {
                            ?>
                             <td><?php echo $row1['totalNo']; ?></td>
                            <?php
                          }
                        }
                        ?>
                        <td><a href="delete-job-post.php?id=<?php echo $row['id_jobpost']; ?>">Delete</a></td>
                      </tr>
                    <?php
                  }
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div><br>
  <div align="center">
  <button onclick="printDiv('print')" style="background-color: #053a5a; width: 120px; height: 50px; padding-left: 10px; padding-right: 10px; font-size: 22px; color:white; border-color: transparent; border-radius: 5px;">Print</button>
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
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

  </body>
</html>