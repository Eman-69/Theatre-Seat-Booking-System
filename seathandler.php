<?php
include 'database.php';
session_start();
if(isset($_POST['bookseats']))
{
    $selectedseats='';
    $seats=$_POST['seats'];
    foreach($seats as $s)
    {
        $selectedseats=$s.'@'.$selectedseats;
    }
    $_SESSION['selectedseats']=$selectedseats;
    echo $_SESSION['selectedseats'];
    echo "<script>location.href='checkout.php';</script>";
}
?>
