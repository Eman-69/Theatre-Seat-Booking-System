<?php
	session_start();
	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
	if(isset($_POST['submit']))
	{	
		include "database.php";
		if($conn)
		{
			$fname=$_POST['Fname'];
			$lname=$_POST['Lname'];
			$phone=$_POST['phoneNumber'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$confirmpassword=$_POST['confirmpassword'];
			if(($password==$confirmpassword)&&(isset($fname))&&(isset($lname))&&(isset($phone))&&(isset($email))&&(isset($password))&&(isset($confirmpassword)))
			{
				$sql="INSERT INTO users(fname,lname,phone,email,password) VALUES('$fname','$lname','$phone','$email','$password')";
				$result=mysqli_query($conn, $sql);
				if ($result) 
				{	
					$_SESSION['newlyuseremail']=$email;
					$_SESSION['newlyuser']=$fname;
					header("Location: mailer.php");
				}	
				else
				{
					echo "<script>alert('Failed')</script>";				
				}		
			}
			else
			{
				echo "<script>alert('Passwords dont match')</script>";

			}

		}
	}
?>