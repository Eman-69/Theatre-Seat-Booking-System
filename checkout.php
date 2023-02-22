<!DOCTYPE html>
<html lang="en">
<?php
include 'database.php';
include 'preloader.php';
session_start();
error_reporting(E_ALL & ~E_WARNING );

if(isset($_SESSION['selectedseats']))
{
    $s=array();
    $j=0;
    $selectedseats=$_SESSION['selectedseats'];
    for($i=0;$i<strlen($selectedseats);$i++)
    {
        if($selectedseats[$i]=='@')
        {
            $j++;
        }
        else
        {
            $s[$j]=$s[$j].$selectedseats[$i];
        }
    }

}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/checkout.css">
</head>
<body>
     <?php
             $day = array(
                0 => 'Mon',
                1 => 'Tue',
                2 => 'Wed',
                3 => 'Thu',
                4 => 'Fri',
                5 => 'Sat',
                6 => 'Sun');
    $email=$_SESSION['currentuseremail'];
    $tno=$_SESSION['tno'];
    $sql="select * from timeline t,movie m,users u where u.email='$email' and t.mid=m.mid and t.tno='$tno'";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        $row=mysqli_fetch_assoc($result);
        
    echo '<center class="cont"><table><tr><td><div class="name bill">Name</td><td> '.$row['fname'].' '.$row['lname'].'</td></tr></div>
    <tr><td><div class="email bill">E-Mail ID </td><td> '.$row['email'].'</td></tr></div>    
    <tr><td><div class="phone bill">Phone No  </td><td> '.$row['phone'].'</td></tr></div>
    <tr><td><div class="mname bill">Movie Name</td><td> '.$row['mname'].'</td></tr></div>
    <tr><td><div class="imdb bill">IMDb</td><td> '.$row['imdb'].'</td></tr></div>
    <tr><td><div class="screen bill">Screen</td><td> '.$row['screen'].'</td></tr></div>
    <tr><td><div class="date bill">Timing:</td><td>'.date("d-m",strtotime($day[$row["weekday"]])).'  '.$row['time'].'</td></tr></div>';
    $totalprice=0;
    $price=0;
    foreach($s as $i)
    {
        $price=0;
        if(isset($_SESSION['currentuseremail'])&&isset($_SESSION['movie'])&&isset($_SESSION['tno']))
        {
            $email=$_SESSION['currentuseremail'];
            $tno=$_SESSION['tno'];
            $mid=$_SESSION['movie'];
            $sql="select * from timeline where tno='$tno'";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                $row=mysqli_fetch_assoc($result);
                $_SESSION['seats_avail']=$row['seats_avail'];
                if($row['screen']==1)
                {
                    if($i>=1&&$i<=20)
                    {
                        echo ' <tr><td><div class="seatno bill">Seat S-</td><td>'.$i.'</td></tr></div>';
                        $price+=300;
                    }
                    else if($i>=21&&$i<=80)
                    {
                        echo ' <tr><td><div class="seatno bill">Seat P-</td><td>'.$i.'</td></tr></div>';
                        $price+=200;
                    }
                    else if($i>=81&&$i<=100)
                    {
                        echo ' <tr><td><div class="seatno bill">Seat E-</td><td>'.$i.'</td></tr></div>';
                        $price+=100;
                    }
                    else
                        echo 'invalidseat';
                }
                else if($row['screen']==2)
                {
                    if($i>=1&&$i<=30)
                    {
                        echo ' <tr><td><div class="seatno bill">Seat P-</td><td>'.$i.'</td></tr></div>';
                        $price+=200;
                    }
                    else if($i>=31&&$i<=60)
                    {
                        echo ' <tr><td><div class="seatno bill">Seat E-</td><td>'.$i.'</td></tr></div>';
                        $price+=100;
                    }
                    else
                        echo 'invalidseat';
                }
                else
                    echo 'invalidscreen';
            }
        } 
        
        $totalprice+=$price;
        echo ' <tr><td><div class="price bill">Price </td><td>'.$price.'</td></tr></div>';
    }
    $_SESSION['totalprice']=$totalprice;
}  echo ' <tr><td><div class="totalprice bill">Total Price </td><td>'.$totalprice.'</td></tr></div>';
?>

<form action="checkout.php" method="post">
<tr><td colspan="2"><button type="submit" name="checkout">BOOK TICKETS!!!</button></td></tr></table></center>
</form>
</body>
</html>

<?php
if(isset($_POST['checkout']))
{
    $z=0;
    $zsql="select fno from finaltable where fno in (select max(f.fno) from finaltable f)";
    $zresult=mysqli_query($conn,$zsql);
    if($zresult)
    {
        $row=mysqli_fetch_assoc($zresult);
        $z=$row['fno'];
        $z++;
    }
    else
    {
        $z=0;
    }
    $totalprice=0;
    foreach($s as $i)
    {
        $price=0;
        if(isset($_SESSION['currentuseremail'])&&isset($_SESSION['movie'])&&isset($_SESSION['tno']))
        {
            $email=$_SESSION['currentuseremail'];
            $tno=$_SESSION['tno'];
            $mid=$_SESSION['movie'];
            $sql="select * from timeline where tno='$tno'";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                $row=mysqli_fetch_assoc($result);
                $_SESSION['seats_avail']=$row['seats_avail'];
                if($row['screen']==1)
                {
                    if($i>=1&&$i<=20)
                        $price+=300;
                    else if($i>=21&&$i<=80)
                        $price+=200;
                    else if($i>=81&&$i<=100)
                        $price+=100;
                    else
                        echo 'invalidseat';
                }
                else if($row['screen']==2)
                {
                    if($i>=1&&$i<=30)
                        $price+=200;
                    else if($i>=31&&$i<=60)
                        $price+=100;
                    else
                        echo 'invalidseat';
                }
                else
                    echo 'invalidscreen';
            }
            date_default_timezone_set("Asia/Kolkata");
            $curdate=date("Y-m-d");
            $fsql="INSERT INTO `finaltable`(`fno`, `tno`, `email`, `seatno`, `price`,`dayofbill`) VALUES ('$z','$tno','$email','$i','$price','$curdate')";
            $fresult=mysqli_query($conn,$fsql);
            if($fresult)
            {
                $_SESSION['seats_avail']-=1;
                $seats_avail=$_SESSION['seats_avail'];
                $dssql="update timeline set seats_avail='$seats_avail' where tno='$tno'";
                $dsresult=mysqli_query($conn,$dssql);
                if($dsresult)
                {
                    echo "update <br>";
                }
                $z++;
                echo "<script>slert('Insert finaltable successful');</script>";
                $_SESSION['sendticket']=1;
                echo "<script>location.href='mailer.php';</script>";
            }
        }
        $totalprice+=$price;
    }
    $_SESSION['totalprice']=$totalprice;
}