<!DOCTYPE html>
<html>
<title>Moviehut</title>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/signcss1.css" type="text/css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
</head>
<body>
	<?php include 'preloader.php';?>
   <div class="container">
     <h2 class="form-title">Sign Up</h2>
     <form action="signup.php" method="post">
       <div class="user-info">
         <div class="input-box">
           <label for="Fname">First Name</label>
           <input type="text"
                   id="Fname"
                   name="Fname"
                   placeholder="First Name" autocomplete="off" required/>
         </div>
         <div class="input-box">
           <label for="Lname">Last name</label>
           <input type="text"
                   id="Lname"
                   name="Lname"
                   placeholder="Last Name"autocomplete="off" />
         </div>
         <div class="input-box">
           <label for="email">Email</label>
           <input type="email"
                   id="email"
                   name="email"
                   placeholder="Email"/>
         </div>
         <div class="input-box">
           <label for="phoneNumber">Phone Number</label>
           <input type="text"
                   id="phoneNumber"
                   name="phoneNumber"
                   placeholder="+91 xxxxxx-nnnn" autocomplete="off" required/>
         </div>
         <div class="pass-box">
           <label for="password">Password</label>
           <input type="password"
                   id="password"
                   name="password"
                   placeholder="Password" autocomplete="off" required/>
         </div>
         <div class="pass-box">
           <label for="confirmpassword">Confirm Password</label>
           <input type="password"
                   id="confirmpassword"
                   name="confirmpassword"
                   placeholder="Confirm Password" autocomplete="off" required/>
         </div>
      </div>
       <div class="form-submit">
         <button name="submit" value="">Register</button>
       </div>
     </form>
   </div>
 </body>
</html>
