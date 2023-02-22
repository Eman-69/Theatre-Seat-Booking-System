<!DOCTYPE html>
<html lang="en">
    <?php session_start(); 
    include 'database.php'
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/seat.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <title>Seat Matrix</title>
</head>
<body>
    <?php
    $bseats=array();
    $k=0;
        if(isset($_SESSION['tno']))
        {
            $tno=$_SESSION['tno'];
            $sql="select * from timeline where tno='$tno'";            
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            $n=mysqli_num_rows($result);
            if($n==1&&$row['screen']==1)
            {
               
                echo '<center>
                <form action="seathandler.php" method="post"><div class="seattypediv">S Class-Rs300</div><div class="seattypecheckbox">';
                for($i=1;$i<=20;$i++)
                {
                    echo'<input type="checkbox" value="'.$i.'" id="s1'.$i.'" name="seats[]" class="sclass">';

                }
                echo '</div><br><br><div class="seattypediv">P Class-Rs200</div><div class="seattypecheckbox">';
                for($i=21;$i<=80;$i++)
                {
                    echo'<input type="checkbox" value="'.$i.'" id="s1'.$i.'" name="seats[]" class="pclass">';
                    if(($i-20)%12==0)
                        echo '<br>';
                }
                echo '</div><br><br><div class="seattypediv">E Class-Rs100</div><div class="seattypecheckbox">';
                for($i=81;$i<=100;$i++)
                {
                    echo'<input type="checkbox" value="'.$i.'" id="s1'.$i.'" name="seats[]" class="eclass">';
                    if($i%10==0)
                        echo '</div><br>';
                }
                $finalsql="select fno from finaltable";
                $finalresult=mysqli_query($conn,$finalsql);
                if($finalresult)
                {
                    while($frows=mysqli_fetch_assoc($finalresult))
                    {
                        $f=$frows['fno'];
                        $cfsql="select f.seatno,f.tno from finaltable f,timeline t where f.tno=t.tno and f.tno='$tno' and t.screen='1' and f.fno='$f'";
                        $cfresult=mysqli_query($conn,$cfsql);
                        if($cfresult)
                        {
                            while($frows=mysqli_fetch_assoc($cfresult))
                            {   
                                echo '<script>
                                document.getElementById("s1'.$frows['seatno'].'").disabled=true;
                            </script>';
            
                            }
                        }
                    }
                }
                echo '<span class="screentitle">Screen</span><img src="img/screen.png"><button type="submit" name="bookseats" class="checkoutbtn">CheckOut</button>
                </form>
            </center>';
            }
            else if($n==1&&$row['screen']==2)
            {
                echo '<center>
                <form action="seathandler.php" method="post"><div class="seattypediv">P Class-Rs200</div><div class="seattypecheckbox">';
                for($i=1;$i<=30;$i++)
                {
                    echo'<input type="checkbox" value="'.$i.'" id="s2'.$i.'" name="seats[]" class="sclass">';
                    if($i%15==0)
                        echo '<br>';
                }
                echo '</div><br><br><div class="seattypediv">E Class-Rs100</div><div class="seattypecheckbox">';
                for($i=31;$i<=60;$i++)
                {
                    echo'<input type="checkbox" value="'.$i.'" id="s2'.$i.'" name="seats[]" class="pclass">';
                    if($i%10==0)
                        echo '<br>';
                }
                echo '</div><br><br>';
                $finalsql="select fno from finaltable";
                $finalresult=mysqli_query($conn,$finalsql);
                if($finalresult)
                {
                    while($frows=mysqli_fetch_assoc($finalresult))
                    {
                        $f=$frows['fno'];
                        $cfsql="select f.seatno,f.tno from finaltable f,timeline t where f.tno=t.tno and f.tno='$tno' and t.screen='2' and f.fno='$f'";
                        $cfresult=mysqli_query($conn,$cfsql);
                        if($cfresult)
                        {
                            while($frows=mysqli_fetch_assoc($cfresult))
                            {   
                                echo '<script>
                                document.getElementById("s2'.$frows['seatno'].'").disabled=true;
                            </script>';
            
                            }
                        }
                        
                    }
                }
                echo '<span class="screentitle">Screen</span><img src="img/screen.png"><button type="submit" name="bookseats" class="checkoutbtn">CheckOut</button>
                </form>
            </center>';
            }
        }
    ?>
</body>
</html>
