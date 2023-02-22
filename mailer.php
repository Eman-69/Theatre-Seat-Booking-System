<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';
    require 'signup.php';
    require 'forgot.php';

    $mail = new PHPMailer(true);
    try {									
        $mail->isSMTP();											
        $mail->Host	 = 'smtp.gmail.com;';					
        $mail->SMTPAuth = true;							
        $mail->Username = 'cinemahutticketsys@gmail.com';				
        $mail->Password = 'wmuvgxmblxintgpm';						
        $mail->SMTPSecure = 'ssl';							
        $mail->Port	 = 465;
        $mail->setFrom('cinemahutticketsys@gmail.com', 'MovieHut');	
        if(isset($_SESSION['newlyuseremail']))
        {	
            $newname=$_SESSION['newlyuser'];
            $newemail=$_SESSION['newlyuseremail'];
            $mail->addAddress($newemail);
            $mail->isHTML(true);								
            $mail->Subject = 'Welcome To MovieHut';
            $mail->Body = "<b>We are excited to see you $newname!!<br> Are you thrilled to book tickets??</b> <br><a href='https://imgbb.com/'><img src='https://i.ibb.co/tD4cMGj/logo.png' alt='moviehutlogo' border='0'></a><div>Please do not reply to this mail</div>";
            $mail->AltBody = 'We are happy to see you here!!!';
            $mail->send();
            echo "Mail has been sent successfully!";
            unset($_SESSION['newlyuser']);
            unset($_SESSION['newlyuseremail']);
            header("Location: index.php");
        } 
        if(isset($_SESSION['forgotemail'])&&isset($_SESSION['fname']))
        {	
            $otp=rand(111111,999999);
            $_SESSION['otp']=$otp;
            $newname=$_SESSION['fname'];
            $newemail=$_SESSION['forgotemail'];
            $mail->addAddress($newemail);
            $mail->isHTML(true);								
            $mail->Subject = 'Welcome To MovieHut';
            $mail->Body = "<b>Hey $newname you have requested forgot password!!<br> Your OTP is:$otp</b> <br><a href='https://imgbb.com/'><img src='https://i.ibb.co/tD4cMGj/logo.png' alt='moviehutlogo' border='0'></a><div>Please do not reply to this mail</div>";
            $mail->AltBody = 'We are happy to see you here!!!';
            $mail->send();
            echo "Mail has been sent successfully!";
            unset($_SESSION['forgotemail']);
            unset($_SESSION['fname']);
            header("Location:otp.php");
        }
        if(isset($_SESSION['sendticket']))
        {
            $day = array(
                0 => 'Mon',
                1 => 'Tue',
                2 => 'Wed',
                3 => 'Thu',
                4 => 'Fri',
                5 => 'Sat',
                6 => 'Sun');
            $email=$_SESSION['currentuseremail'];
            $sql="select * from finaltable f,movie m,users u,timeline t where f.email='$email' and u.email=f.email and t.tno=f.tno and m.mid=t.mid";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                $row=mysqli_fetch_assoc($result);
            $mail->addAddress($email);
            $mail->isHTML(true);								
            $mail->Subject = 'Thank you for Booking Ticket!!!';
            $str = "Movie Name:".$row['mname']."<br>Screen".$row['screen']."<br>Timing".date("d-m",strtotime($day[$row["weekday"]]))." ".$row['time']."<br>SEATS:";
            if(isset($_SESSION['selectedseats']))
                {
                    $s=array();
                    $j=0;
                    $selectedseats=$_SESSION['selectedseats'];
                    for($i=0;$i<strlen($selectedseats);$i++)
                    {
                        if($selectedseats[$i]=='@')
                        {
                            $str=$str.$s[$j].",";
                            $j++;
                        }
                        else
                        {
                            $s[$j]=$s[$j].$selectedseats[$i];
                        }
                    }

                }
            $str=$str."<br>Total price".$row['mname']."<br><a href='https://imgbb.com/'><img height='100px' src='https://i.ibb.co/tD4cMGj/logo.png' alt='moviehutlogo' border='0'></a><div>Please do not reply to this mail</div>";
            echo $str;
            $mail->Body='<div>'.$str.'</div>';
            $mail->AltBody = 'We are happy to see you here!!!';
            $mail->send();
            echo "Mail has been sent successfully!";
            header("Location:mainpage.php");
        } } 
    }
    catch (Exception $e)
    {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }   


?>
