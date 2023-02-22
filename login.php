<!doctype html>
<head>
    <title>Login</title>
</head>
<body style="background-color:white;">
<?php
session_unset();
session_destroy();

    session_start();
    if(isset($_POST['loginbtn']))
    {
        $c=1;
        include "database.php";
        if(isset($_POST['email']) and isset($_POST['password']))
        {
            function verify($data)
            {
                $data=trim($data);
                $data=stripslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }
            $email=verify($_POST['email']);
            $password=verify($_POST['password']);
            $sql="SELECT * from users where email='$email' and password='$password'";

            $result=mysqli_query($conn,$sql);
            $r=mysqli_num_rows($result);
            if($r==1)
            {
                $row=mysqli_fetch_assoc($result);
                if($row['email']==$email&&$row['password']==$password)
                {
                    $_SESSION['currentuseremail']=$email;
                    $_SESSION['currentuserpassword']=$password;
                    header("Location:mainpage.php");
                }
            }
            else
            {
                $_SESSION['login']=1;
                header("Location:index.php");
            }
        }
    }
?>
</body>
</html>