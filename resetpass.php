<!DOCTYPE html>
<html>
<head>
<title>Moviehut</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/resetcss.css" type="text/css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
</head>
<body>
	<?php include 'preloader.php';?>
   <div class="container">
     <h1 class="title">Reset your Password</h1>
     <form action="reset.php" method="post">
         <div class="input-box">
           <label for="pass">Password</label>
           <input required type="password"
                   id="password"
                   name="password"
                   placeholder="Enter Your New Password " autocomplete="off" required/>
         </div>
         <div class="input-box">
           <label for="pass"> Confirm Password</label>
           <input required type="password"
                   id="password"
                   name="confirmpassword"
                   placeholder="Enter Your Confirmed Password  " autocomplete="off" required/>
         </div>
         <div class="Reset-button">
           <button name='reset' type="submit">Reset Password</button>
         </div>
       </form>
     </div>
  </body>
  </html>
