<?php 
  session_start();
  if(isset($_SESSION['id_admin'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin Login</title>

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
          <a class="navbar-brand" style="font-size: 24px; color: #053a5a; line-height: 42px;" href="index.php">ADCET</a>
        </div>
      </div>
    </nav>
  </header>
  </div>
  </div>
  </section>

      <div style="background-color: #053a5a; height: 80px;">
    <p style="font-size: 34px; color: white; text-align: center; line-height: 73px;">Admin Login</p>
  </div>
  <br>

    <section>
      <div class="container">
        <div class="row" align="center">

            <form method="post" action="checklogin.php">
            <table>
              <tr>
                <td style="font-size: 22px;">Username&nbsp;&nbsp;&nbsp;</td>
                <td style="font-size: 22px;">:&nbsp;&nbsp;&nbsp;</td>
                <td><input type="text" id="username" name="username" placeholder="Username" required="" style="font-size: 20px; padding-left: 10px; padding-right: 10px; padding-top: 5px; padding-bottom: 5px; border-radius: 5px; border:1px solid black;"></td>
              </tr>
              <tr>
                <td colspan="3"><br></td>
              </tr>
              <tr>
                <td style="font-size: 22px;">Password</td>
                <td style="font-size: 22px;">:</td>
                <td><input type="password" id="password" name="password" placeholder="Password" required="" style="font-size: 20px; padding-left: 10px; padding-right: 10px; padding-top: 5px; padding-bottom: 5px; border-radius: 5px; border:1px solid black;"></td>
              </tr>
              <tr>
                <td colspan="3"><br></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td><button type="submit" style="font-size: 18px; color: white; background-color: #053a5a; border-color: transparent; border-radius: 5px; width: 70%; height: 45px;">Submit</button></td>
              </tr>

            </table> 

              <br>
              <?php
              if(isset($_SESSION['loginError'])){                
                ?>
              <div>
                <p style="text-align: center; color: red; font-size: 28px;">Invalid Username or Password</p>
              </div>
              <?php
              unset($_SESSION['loginError']);}
              ?>
            </form>

          </div>
        </div>
      </div>
    </section>

    <Br><br>

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
  
    <script type="text/javascript">
      $(function(){
        $("#successMessage:visible").fadeOut(5000);
      });
    </script>
  </font>
  </body>
</html>