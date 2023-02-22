<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MovieHut</title>

    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
	<!--<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

  	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="js/bootstrap.js"></script>-->

<!--	<script src='js/main.js'></script>-->
	<script src="https://kit.fontawesome.com/b4dede261b.js" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</head>
<body>
	<?php include 'preloader.php';?>
	<div class="container">
		
		<div id="logo"><img src="img/logo.png"></div>
		<div id="welcome"><h1>Welcome to MovieHut....</h1></div>
	    <div id="loginbutton">
	        <button  onclick="loginfxn()">Login</button>
	    </div>
		<div class="popup">
			<div class="closebtn" onclick="loginclosefxn()">&times;</div>
			<div class="logintitle">Log in</div>
			<form action="login.php" method="post" class="loginform">
				<table>
					<tr>
						<td class=" td_class">E-mail</td>
						<td class=" td_class">:</td>
						<td class=" td_class"><input type="email" name="email" placeholder="E-mail" required></td>
					</tr>
					<tr>
						<td class=" td_class">Password</td>
						<td class=" td_class">:</td>
						<td class=" td_class"><input type="password" name="password" placeholder="Password" required></td>
					</tr>
					<tr>
						<td class=" td_class"></td>
						<td class=" td_class">&nbsp</td>
						<td class=" td_class">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="forgotpass.php">forgot password?</a></td>
					</tr>
				</table>
				<div class="wrongcred"></div>
				<button name="loginbtn" class="loginbtn">LOG IN</button>

				<br>
				<br>
			</form>

			<p class="sign_up">
				Dont have an account?
				<button onclick="location.href='signup3.0.php'" class="sign-up-button">Sign up</button>
			</p>								
		</div>
		<?php
			session_start();
			if((isset($_SESSION['login']))&&($_SESSION['login']))
			{
				echo"<script>loginfxn(); wrongcred();</script>";
				session_unset();
			}
		?>
		<div id="footer"><img src="img/4k.png"><img src="img/3d.png"><img src="img/dolby.png"><img src="img/dts.png">
		</div>
	</div>
</body>
</html>