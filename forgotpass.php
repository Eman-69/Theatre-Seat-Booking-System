<!DOCTYPE html>
<html>
<head>
  
<title>Moviehut</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/forgotcss.css" type="text/css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
  <script src="js/main.js"></script>
</head>
<body>
	<?php include 'preloader.php';?>
   <div class="container">
      <h1 class="title">Forgot your Password?</h1>
      <form action="forgot.php" method="post">
        <div class="user-info">
          <div class="input-box">
            <label for="Enter your Email:">Email</label>
            <input required type="email"
              id="email"
              name="email"
              autocomplete="off" placeholder="Enter Your Email" />
          </div>
          <div class="input-box">
             <label for="phoneNumber">Phone Number</label>
              <input required type="text"
                  id="phoneNumber"
                  name="phoneNumber"
                  autocomplete="off" placeholder="Enter +91 xxxxxx-nnnn"/>
          </div>
          <div class="cont-button">
           <button name='continue' type="submit">Continue</button>
          </div> 
          <div class="forgotpasswrong"></div>
            <?php
                session_start();
                if((isset($_SESSION['forgotpass'])))
                {
                  echo "<script>forgotpasswrongfxn();</script>";
                  unset($_SESSION['forgotpass']);
                }
              ?>
        </div>
      </form>
    </div>
  </body>
  </html>
