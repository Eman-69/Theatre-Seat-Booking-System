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
      <h1 class="title">ENter your OTP</h1>
      <form action="forgot.php" method="post">
        <div class="user-info">
          <div class="input-box">
            <label for="otp">OTP</label>
            <input type="number" id="otp" name="otp" placeholder="6-digit OTP" autocomplete="off"/>
          </div>
          <div class="cont-button">
           <button name='verified' type="submit">Set New Password</button>
          </div> 
        </div>
      </form>
    </div>
  </body>
  </html>
