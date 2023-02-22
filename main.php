<?php
    session_start();
    include "database.php";
    $sql="SELECT mname,imdb,mid from movie";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $mid=$row['mid'];
            if(isset($_GET[$mid])||isset($_POST[$mid]))
            {
                $_SESSION['movie']=$mid;
                echo "<script>location.href='booking.php'</script>";
            }
        }
    }







    $seatsql="SELECT * from timeline";
    $seatresult=mysqli_query($conn,$seatsql);
    if(mysqli_num_rows($seatresult)>0)
    {
        while($row=mysqli_fetch_assoc($seatresult))
        {
            if(isset($_POST[$row['tno']]))
            {
                echo 'last';
                $_SESSION['tno']=$row['tno'];
                echo "<script>location.href='seat.php';</script>";
            }
        }
    }
?>