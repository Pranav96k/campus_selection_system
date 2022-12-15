<?php

session_start();
require_once("db.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <link rel="icon" href="img/favicon.png" type="image/x-icon"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style>

      .container1 {
        position: relative;
        width: 100%;
        margin-top: 0;
      }

      .container1 img {
        width: 100%;
        height: auto;
      }

      .container1 .btn1 {
        position: absolute;
        top: 45%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        background-color: #E8C4C4;
        color: black;
        font-size: 24px;
        padding: 12px 24px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
      }
      .btn1:hover{
        background-color: #FFD1D1;
      }

    </style>

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
          <a class="navbar-brand" style=" font-family: Arial, Helvetica, sans-serif; font-size: 30px; color: #053a5a; line-height: 42px;" href="index.php"> <b> ADCET</b> </a>
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

  <section>
    <div class="container1">
      <img src="img/adcet.jpeg" alt="Snow">
      <a href="search.php"><button class="btn1">Search for Jobs</button></a>
    </div>
  </section>

  <br>

  <div align="center">

    <form action ="" method = "post">

      <input style="font-size: 18px; color: black; padding: 7px; border: 1px solid black; border-radius: 5px;" name="search" type="text" size="30" placeholder="Search By Job Title E.g Accounting"/>

      <input type="submit" style="font-size: 18px; color: white; background-color: #053a5a; border-color: transparent; border-radius: 5px; width: 150px; height: 45px;" value="Search" />

    </form> 

    <br>

    <?php 

    $output = '';

    if(isset($_POST['search'])) {
    $search = $_POST['search'];

    $query = mysqli_query($conn,"SELECT * FROM job_post WHERE jobtitle LIKE '%$search%'") or die ("Could not search");
    $count = mysqli_num_rows($query);

    if($count == 0){
    ?>
    <p style="font-size: 22px; color: #053a5a;">No Results Found!</p> 
    <?php
    }else{

    ?>

    <div class="container">
      <div class="row">
        <table style="width: 100%;">
          <tr>
            <td style="width: 25%; color: #053a5a; text-align: center; padding-top: 10px; padding-bottom: 10px; font-size: 24px;">Job Title</td>
            <td style="width: 25%; color: #053a5a; text-align: center; padding-top: 10px; padding-bottom: 10px; font-size: 24px;">Job Description</td>
            <td style="width: 25%; color: #053a5a; text-align: center; padding-top: 10px; padding-bottom: 10px; font-size: 24px;">Minimum Salary</td>
            <td style="width: 25%; color: #053a5a; text-align: center; padding-top: 10px; padding-bottom: 10px; font-size: 24px;">Maximum Salary</td>
          </tr>
        </table>
      </div>
    </div>

  </div>

  <?php

  while ($row = mysqli_fetch_array($query)) {
  ?>

  <div class="container">
    <div class="row">
      <table style="width: 100%;" border="1" class="table-striped">

        <tr>
          <td style="width: 25%; font-size: 20px; padding-top: 7px; padding-bottom: 7px; padding-left: 20px; color: black;"><a href="apply-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a></td>
          <td style="width: 25%; font-size: 20px; padding-top: 7px; padding-bottom: 7px; padding-left: 20px; color: black;"><?php echo $row['description']; ?></td>
          <td style="width: 25%; font-size: 20px; padding-top: 7px; padding-bottom: 7px; padding-left: 20px; color: black;">Rs.<?php echo $row['minimumsalary']; ?> per Month</td>
          <td style="width: 25%; font-size: 20px; padding-top: 7px; padding-bottom: 7px; padding-left: 20px; color: black;">Rs.<?php echo $row['maximumsalary']; ?> per Month</td>
        </tr>

      </table>
    </div>
  </div>

        <?php 
      }
    }
  }
  ?>

  <br>
  </div>
  </div>

  <section>
    <div class="container">
      <div class="row">

        <h2 class="text-center" style="color: red; font-size: 30px;">Latest Job Posts</h2>

        <br>

        <?php 

        $sql = "SELECT * FROM job_post ORDER BY id_jobpost DESC limit 5";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) 
        {
        $sql1 = "SELECT * FROM company WHERE id_company='$row[id_company]'";
        $result1 = $conn->query($sql1);
        if($result1->num_rows > 0) {
        while($row1 = $result1->fetch_assoc()) 
        {

        ?>

        <div align="left">

        <h4 style="font-size: 28px;"><a href="apply-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a><span class="pull-right" style="font-size: 20px;">Rs. <strong><?php echo $row['maximumsalary']; ?> per Month</span></strong></h4>

        <div style="font-size: 19px;">
        <div><strong>Company Name : </strong><?php echo $row1['companyname']; ?> | <strong>Head Office : </strong><?php echo $row1['headofficecity']; ?> | <strong>Experience Required : </strong><?php echo $row['experience']; ?> Years</div>
        </div>

        <hr style="border-color:black;">

        </div>

        <?php
        }
        }
        }
        }
        ?>

      </div>
    </div>
  </section>

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

  </font>

  </body>
</html>