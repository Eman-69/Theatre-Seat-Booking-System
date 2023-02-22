<?php
session_start();
if(isset($_SESSION['movie']))
{
    $movie=$_SESSION['movie'];
}
else
    header("mainpage.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>MovieHut</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='css/'>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/booking.css">
        <script src='js/main.js'></script>
        <script src="https://kit.fontawesome.com/b4dede261b.js" crossorigin="anonymous"></script>
    </head>
        <?php include 'preloader.php';
        $day = array(
            0 => 'Mon',
            1 => 'Tue',
            2 => 'Wed',
            3 => 'Thu',
            4 => 'Fri',
            5 => 'Sat',
            6 => 'Sun');
        if(isset($_SESSION['movie']))
        {
                include 'database.php';
                date_default_timezone_set("Asia/Kolkata");
                $curtime=date('H:i');
                $sqltitle="select * from movie where mid='$movie'";
                $sql1="select tno,t.mid,weekday,time,screen,seats_avail,mname,imdb from timeline t, movie m where t.mid=m.mid and t.mid='$movie' and  time>'$curtime' and weekday=WEEKDAY(CURDATE())";
                $sql2="select tno,t.mid,weekday,time,screen,seats_avail,mname,imdb from timeline t, movie m where t.mid=m.mid and t.mid='$movie' and weekday>WEEKDAY(CURDATE())";
                $sql3="select tno,t.mid,weekday,time,screen,seats_avail,mname,imdb from timeline t, movie m where t.mid=m.mid and t.mid='$movie' and weekday<WEEKDAY(CURDATE())";
                $resulttitle=mysqli_query($conn,$sqltitle);
                $result1=mysqli_query($conn,$sql1);
                $result2=mysqli_query($conn,$sql2);
                $result3=mysqli_query($conn,$sql3);   
                if($resulttitle)   
                {
                    while($row=mysqli_fetch_assoc($resulttitle))
                    {
                    echo '<body style="background:url(img/bg/'.$row['mid'].'bg.jpg) no-repeat; background-size: auto 100%; background-position:center;">
                    <div class="title"><h1 class="mname">'.$row['mname'].'</h1><span class="imdb"><img src="img/imdb.png">'.floatval($row['imdb']).'</span></div>';
                    }
                }
                if($result1)
                {
                    echo '<div class="weekh1"><h1>Today</h1></div>';
                    while($row=mysqli_fetch_assoc($result1))
                    {
                        echo '<form class="timelineform" action="main.php" method="post"><button type="submit" name="'.$row['tno'].'" class="timelinecard">
                        <div class="timelinecardr1"><span class="screen">Screen '.$row['screen'].'</span><span class="seats">Seats:'.$row['seats_avail'].'</span></div>
                        <div class="timelinecardr2"><span class="date">'.date("d-m",strtotime($day[$row["weekday"]])).'  Today</span><span class="time">'.$row['time'].'</span></div>
                    </button></form>';

                    }
                    echo '<br><br><br>';
                }
                if($result2)
                {
                    echo '<div class="weekh1"><h1>This Week</h1></div>';
                    while($row=mysqli_fetch_assoc($result2))
                    {
                        echo '<form class="timelineform" action="main.php" method="post"><button type="submit" name="'.$row['tno'].'" class="timelinecard">
                        <div class="timelinecardr1"><span class="screen">Screen '.$row['screen'].'</span><span class="seats">Seats:'.$row['seats_avail'].'</span></div>
                        <div class="timelinecardr2"><span class="date">'.date("d-m",strtotime($day[$row["weekday"]])).'  '.$day[$row["weekday"]].'</span><span class="time">'.$row['time'].'</span></div>
                    </button></form>';                    
                    }
                    echo '<br><br><br>';
                }
                if($result3)
                {
                    echo '<div class="weekh1"><h1>Next Week</h1></div>';
                    while($row=mysqli_fetch_assoc($result3))
                    {
                        echo '<form class="timelineform" action="main.php" method="post"><button type="submit" name="'.$row['tno'].'" class="timelinecard">
                        <div class="timelinecardr1"><span class="screen">Screen '.$row['screen'].'</span><span class="seats">Seats:'.$row['seats_avail'].'</span></div>
                       <div class="timelinecardr2"><span class="date">'.date("d-m",strtotime($day[$row["weekday"]])).'  '.$day[$row["weekday"]].'</span><span class="time">'.$row['time'].'</span></div>
                    </button></form>';                    
                }
                echo '<br><br><br>';
                }
        }
        else
        {
            
            header("mainpage.php");
        }
        ?>

    </body>
</html>