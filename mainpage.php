<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<title>MovieHut</title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel='stylesheet' type='text/css' media='screen' href='css/styles.css'>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
  	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="js/bootstrap.js"></script>

	<script src='js/main.js'></script>
	<script src="https://kit.fontawesome.com/b4dede261b.js" crossorigin="anonymous"></script>
</head>
<body onscroll="scrollfxn()">
	<?php include 'preloader.php';?>
	<div role="button" onclick="bookaticket()" id="bookaticket-button"><center><i class="fa-solid fa-film fa-2xl"></i></center></div>
	<div class="bookaticket">
		<div class="bookaticket-title">Select Your Movie:<span role="button" id="bookaticket-close" onclick="bookaticketclose()">&times</span></div>
		<ol>
			<form action="main.php" method="get">
				<?php
					session_start();
					include "database.php";
					$sql="SELECT mname,imdb,mid,img from movie";
					$result=mysqli_query($conn,$sql);
					$n=mysqli_num_rows($result);
					if($n>0)
					{
						while($row=mysqli_fetch_assoc($result))
						{
							
							$_SESSION[$row['mid']]=$row['mid'];
							echo "<button type='submit' style='
								color:#d6d6d6;
								display:block;
								width:93%;
								padding: 0% 2%;
								height: 100px;
								background: #F55353 url(img/bookaticket.jpg) no-repeat 70%;
								background-size:100%;
								margin-top: 10px;
								
							' name='".$row['mid']."'><span class='mname'>".$row['mname']."</span><span class='imdb'><img src='img/imdb.png'>".$row['imdb']."</button>";
						}
						/*echo "<script>function moviefxn(mid)
						{
							console.log(mid);
							
							window.location.href = 'main.php';
							
						}</script>";*/
					}
				?>	
			</form>		
		</ol>
	</div>
	<!--<div id="aboutus">
		<center>Contact-Us</center>
	</div>-->
	<div id="banner" class="carousel slide" data-bs-pause="false" data-bs-ride="carousel">
		<div class="navbar">
		<span  id="logo"><a href="#"><img src="img/logo.png"></a></span>
		<form id="signoutform" action="logout.php" method="post"><button id="signout" name="signout"><i class="fa-solid fa-user"></i>   Sign-Out</button></form>
		</div>
		<div id="banner-shade-bottom"></div>
		<!--<ol class="carousel-indicators">
			<button type="button" data-bs-target="#banner" aria-current="true" data-bs-slide="0" onclick="clickindicator('0');" class="active"></button>
			<button type="button" data-bs-target="#banner" data-bs-slide="1" onclick="clickindicator('1');" class=""></button>
			<button type="button" data-bs-target="#banner" data-bs-slide="2" onclick="clickindicator('2');" class=""></button>
			<button type="button" data-bs-target="#banner" data-bs-slide="3" onclick="clickindicator('3');" class=""></button>
			<button type="button" data-bs-target="#banner" data-bs-slide="4" onclick="clickindicator('4');" class=""></button>

		</ol>-->
		<ul id="ulbanner" class="carousel-inner listbox">
			<li class="carousel-item active"><div id="banner1" style="background-image: url(img/banner1.jpg);" class="d-block w-100"></div></li>
			<li class="carousel-item"><div id="banner2" style="background-image: url(img/banner2.jpg);" class="d-block w-100"></div></li>
			<li class="carousel-item"><div id="banner3" style="background-image: url(img/banner3.jpg);" class="d-block w-100"></div></li>
			<li class="carousel-item"><div id="banner4" style="background-image: url(img/banner4.jpg);" class="d-block w-100"></div></li>
			<li class="carousel-item"><div id="banner5" style="background-image: url(img/banner5.jpg);" class="d-block w-100"></div></li>
		</ul>
		<!--<a class="carousel-control-prev" id="prev" href="#banner" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#banner" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</i></span>
		</a>-->
	</div>
	<center class="title">Top Movies Running in The Hut</center>
	<div id="drawer">

		<div class="drawer-div carousel slide carousel-fade" data-bs-pause="hover" data-bs-ride="carousel" data-bs-interval="2000"><ul id="uldrawer1" class=" carousel-inner listbox">
			<li class="carousel-item active" id="<?php echo $_SESSION['m1'];?>li-1"><form action='main.php' method='post' class="drawer-poster d-block w-100" style="background-image:url(img/li/<?php echo $_SESSION['m1'];?>li-1.jpg)"><button name='<?php echo $_SESSION['m1']; ?>' type="submit" style="width:100%; height:100%; background:rgba(0,0,0,0);"></button></form>
					
			</li>
			<li class="carousel-item" id="<?php echo $_SESSION['m1'];?>li-2"><form action='main.php' method='post' class="drawer-poster d-block w-100" style="background-image:url(img/li/<?php echo $_SESSION['m1'];?>li-2.jpg)"><button name='<?php echo $_SESSION['m1'] ?>' type="submit" style="width:100%; height:100%; background:rgba(0,0,0,0);"></button></form>
					
			</li>
			<li class="carousel-item" id="<?php echo $_SESSION['m1'];?>li-3"><form action='main.php' method='post' class="drawer-poster d-block w-100" style="background-image:url(img/li/<?php echo $_SESSION['m1'];?>li-3.jpg)"><button name='<?php echo $_SESSION['m1'] ?>' type="submit" style="width:100%; height:100%; background:rgba(0,0,0,0);"></button></form>
					
			</li>
		</ul></div>
		<div class="drawer-div carousel slide carousel-fade" data-bs-pause="hover" data-bs-ride="carousel" data-bs-interval="2500"><ul id="uldrawer2" class=" carousel-inner">
			<li class="carousel-item active" id="<?php echo $_SESSION['m2'];?>li-1"><form action='main.php' method='post' class="drawer-poster d-block w-100" style="background-image:url(img/li/<?php echo $_SESSION['m2'];?>li-1.jpg)"><button name='<?php echo $_SESSION['m2'] ?>' type="submit" style="width:100%; height:100%; background:rgba(0,0,0,0);"></button></form>
					
			<li class="carousel-item" id="<?php echo $_SESSION['m2'];?>li-2"><form action='main.php' method='post' class="drawer-poster d-block w-100" style="background-image:url(img/li/<?php echo $_SESSION['m2'];?>li-2.jpg)"><button name='<?php echo $_SESSION['m2'] ?>' type="submit" style="width:100%; height:100%; background:rgba(0,0,0,0);"></button></form>
					
			<li class="carousel-item" id="<?php echo $_SESSION['m2'];?>li-3"><form action='main.php' method='post' class="drawer-poster d-block w-100" style="background-image:url(img/li/<?php echo $_SESSION['m2'];?>li-3.jpg)"><button name='<?php echo $_SESSION['m2'] ?>' type="submit" style="width:100%; height:100%; background:rgba(0,0,0,0);"></button></form>
					
		</ul></div>
		<div class="drawer-div carousel slide carousel-fade" data-bs-pause="hover" data-bs-ride="carousel" data-bs-interval="2000"><ul id="uldrawer3" class=" carousel-inner">
			<li class="carousel-item active" id="<?php echo $_SESSION['m3'];?><li-1"><form action='main.php' method='post' class="drawer-poster d-block w-100" style="background-image:url(img/li/<?php echo $_SESSION['m3'];?>li-1.jpg)"><button name='<?php echo $_SESSION['m3'] ?>' type="submit" style="width:100%; height:100%; background:rgba(0,0,0,0);"></button></form>
				
			<li class="carousel-item" id="<?php echo $_SESSION['m3'];?>li-2"><form action='main.php' method='post' class="drawer-poster d-block w-100" style="background-image:url(img/li/<?php echo $_SESSION['m3'];?>li-2.jpg)"><button name='<?php echo $_SESSION['m3'] ?>' type="submit" style="width:100%; height:100%; background:rgba(0,0,0,0);"></button></form>
				
			<li class="carousel-item" id="<?php echo $_SESSION['m3'];?>li-3"><form action='main.php' method='post' class="drawer-poster d-block w-100" style="background-image:url(img/li/<?php echo $_SESSION['m3'];?>li-3.jpg)"><button name='<?php echo $_SESSION['m3'] ?>' type="submit" style="width:100%; height:100%; background:rgba(0,0,0,0);"></button></form>
				
		</ul></div>
		<div class="drawer-div carousel slide carousel-fade" data-bs-pause="hover" data-bs-ride="carousel" data-bs-interval="2500"><ul id="uldrawer4" class=" carousel-inner">
			<li class="carousel-item active" id="<?php echo $_SESSION['m4'];?>li-1"><form action='main.php' method='post' class="drawer-poster d-block w-100" style="background-image:url(img/li/<?php echo $_SESSION['m4'];?>li-1.jpg)"><button name='<?php echo $_SESSION['m4'] ?>' type="submit" style="width:100%; height:100%; background:rgba(0,0,0,0);"></button></form>
					
			<li class="carousel-item" id="<?php echo $_SESSION['m4'];?>li-2"><form action='main.php' method='post' class="drawer-poster d-block w-100" style="background-image:url(img/li/<?php echo $_SESSION['m4'];?>li-2.jpg)"><button name='<?php echo $_SESSION['m4'] ?>' type="submit" style="width:100%; height:100%; background:rgba(0,0,0,0);"></button></form>
					
			<li class="carousel-item" id="<?php echo $_SESSION['m4'];?>li-3"><form action='main.php' method='post' class="drawer-poster d-block w-100" style="background-image:url(img/li/<?php echo $_SESSION['m4'];?>li-3.jpg)"><button name='<?php echo $_SESSION['m4'] ?>' type="submit" style="width:100%; height:100%; background:rgba(0,0,0,0);"></button></form>
					
		</ul></div>
		<div class="drawer-div carousel slide carousel-fade" data-bs-pause="hover" data-bs-ride="carousel" data-bs-interval="2000"><ul id="uldrawer5" class=" carousel-inner">
			<li class="carousel-item active" id="<?php echo $_SESSION['m5'];?>li-1"><form action='main.php' method='post' class="drawer-poster d-block w-100" style="background-image:url(img/li/<?php echo $_SESSION['m5'];?>li-1.jpg)"><button name='<?php echo $_SESSION['m5'] ?>' type="submit" style="width:100%; height:100%; background:rgba(0,0,0,0);"></button></form>
					
			<li class="carousel-item" id="<?php echo $_SESSION['m5'];?>li-2"><form action='main.php' method='post' class="drawer-poster d-block w-100" style="background-image:url(img/li/<?php echo $_SESSION['m5'];?>li-2.jpg)"><button name='<?php echo $_SESSION['m5'] ?>' type="submit" style="width:100%; height:100%; background:rgba(0,0,0,0);"></button></form>
					
			<li class="carousel-item" id="<?php echo $_SESSION['m5'];?>li-3"><form action='main.php' method='post' class="drawer-poster d-block w-100" style="background-image:url(img/li/<?php echo $_SESSION['m5'];?>li-3.jpg)"><button name='<?php echo $_SESSION['m5'] ?>' type="submit" style="width:100%; height:100%; background:rgba(0,0,0,0);"></button></form>
					
		</ul></div>
	</div>
</body>
</html>