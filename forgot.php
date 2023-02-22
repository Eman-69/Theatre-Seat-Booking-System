<!DOCTYPE html>
<html>
    <head>
        <script src="js/main.js"></script>
        <?php
        session_start();
        include "database.php";
        if(isset($_POST['continue'])&&isset($_POST['email'])&&isset($_POST['phoneNumber']))
        {
            $email=$_POST['email'];
            $phone=$_POST['phoneNumber'];
            $userinfo="SELECT * from users where email='$email' and phone='$phone'";
            $result=mysqli_query($conn,$userinfo);
            $r=mysqli_num_rows($result);
            if($r==1)
            {
                $row=mysqli_fetch_assoc($result);
                if(isset($_POST['email'])&&isset($_POST['phoneNumber']))
                {
                    if($_POST['email']==$row['email']&&$_POST['phoneNumber']==$row['phone'])
                    {
                        $_SESSION['forgotemail']=$row['email'];
                        $_SESSION['fname']=$row['fname'];
                        header("Location:mailer.php");

                    }

                }
                else
                {
                    $_SESSION['forgotpass']=1;
                    if($_SESSION['forgotpass'])
                    {
                        unset($_SESSION['forgotpass']);
                        header("Location:forgotpass.php");
                    }
                }
            }
            else
            {
                echo"<script>alert('Wrong Crediantials'); location.href='forgotpass.php';</script>";
            }
        }
        if(isset($_POST['verified']))
        {
            $otp1=$_SESSION['otp'];
            $otp2=$_POST['otp'];
            unset($_SESSION['otp']) ;           
            if($otp1==$otp2)
            {
                echo"<script>alert('Enter new password'); location.href='resetpass.php'</script>";
            }
        
            else
            {
                echo"<script>alert('wrong otp $otp1 $otp2'); location.href='forgotpass.php'</script>"; 
            }
        }
        ?>
    </head>
</html>
