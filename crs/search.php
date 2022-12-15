<?php
session_start();
require_once("db.php");
?>

<html>

  <head>

    <title>Search for Jobs</title>
    <link rel="icon" href="img/favicon.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

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
            <li><a href="user/dashboard.php">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
            <?php 
            } else if(isset($_SESSION['id_user']) && isset($_SESSION['companyLogged'])){
            ?>
            <li><a href="company/dashboard.php">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
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

  <div style="background-color: #053a5a; height: 180px;">
    <p style="font-size: 34px; color: white; text-align: center; padding-top: 30px;">Search a Job</p>
    <p style="font-size: 34px; color: aqua; text-align: center;">Find Your Dream Job</p>
  </div>

  <br>
  <br>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <form id="myForm" class="form-inline">

        <div class="form-group" style="font-size: 18px; margin-left: -20px;">
          <label>Experience : </label>
          <select id="experience" class="form-control" style="font-size: 16px;">
            <option value="" selected="">Select Experience</option>
            <?php 
              $sql = "SELECT DISTINCT(experience) FROM job_post WHERE experience IS NOT NULL ORDER BY experience";
              $result = $conn->query($sql);
              if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                  echo "<option value='".$row['experience']."'>".$row['experience']."</option>";
                }
              }
            ?>
          </select>
        </div>

        <div class="form-group" style="font-size: 18px; margin-left: 20px;"">
          <label>Qualification : </label>
          <select id="qualification" class="form-control" style="font-size: 16px;">
            <option value="" selected="">Select Qualification </option>
            <?php 
              $sql = "SELECT DISTINCT(qualification) FROM job_post WHERE qualification IS NOT NULL";
              $result = $conn->query($sql);
              if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                  echo "<option value='".$row['qualification']."'>".$row['qualification']."</option>";
                }
              }
            ?>
          </select>
        </div>

        <button class="btn" style="font-size: 16px; background-color: #053a5a; color: white; margin-left: 10px; width: 100px;">Search</button>

        </form>

        <div class="row" style="margin-top: 5%;">
          <div class="table-responsive">
            <table id="myTable" class="table">
              <thead style="color: #053a5a; font-size: 18px;">
                <th>Job Name</th>
                <th>Job Description</th>
                <th>Minimum Salary</th>
                <th>Maximum Salary</th>
                <th>Experience</th>
                <th>Qualification</th>
                <th>Action</th>
              </thead>
              <tbody style="color: black; font-size: 18px;">

              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
  </section>

  <br></br>

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

  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript">
    $(function() {
      var oTable = $('#myTable').DataTable({
        "autoWidth" : false,
        "ajax" : {
          "url" : "refresh_job_search.php",
          "dataSrc" : "",
          "data" : function (d) {
            d.experience = $("#experience").val();
            d.qualification = $("#qualification").val();
          }
        }
      });

      $("#myForm").on("submit", function(e) {
        e.preventDefault();
        oTable.ajax.reload( null, false);
      })

    });
  </script>
    
  </font>
  </body>
</html>