<?php
	session_start();
	if(isset($_POST['reset']))
	{	
		include "database.php";
		if($conn&&(isset($_POST['password']))&&isset(($_POST['confirmpassword'])))
		{
			$password=$_POST['password'];
			$confirmpassword=$_POST['confirmpassword'];
            $email=$_SESSION['forgotemail'];
			if($password==$confirmpassword)
			{
                $sql="UPDATE users SET password='$password' where email='$email'";
                $result=mysqli_query($conn, $sql);
				if ($result) 
				{
                    echo "<script>alert('New Password set!'); location.href='index.php'</script>";
				}	
				else
				{
					echo "<script>alert('Failed')</script>";				
				}		
			}
			else
			{
				echo "<script>alert('Passwords dont match'); location.href='resetpass.php'</script>";
			}

		}
	}
?>