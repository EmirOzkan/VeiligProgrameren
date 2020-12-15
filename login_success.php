<?php
session_start();
if(isset($_SESSION["email"]))
{
    echo '<h3>Het inloggen is gelukt! - '.$_SESSION["email"].'</h3>';
    $getip = getRealIpAddr();
    echo "Uw ip adres is $getip";
    $today = date("Y-m-d H:i:s");
    echo "<br /><br />De datum van vandaag is $today";
    echo '<br /><br />De tijd in ' . date_default_timezone_get() . " is " . date("H:i:s");
    date_default_timezone_set("Asia/Calcutta");
    echo '<br /><br />De tijd in (de andere kant van de wereld) ' . date_default_timezone_get() . " is " . date("H:i:s");
    echo '<br /><br /><a href="logout.php">Uitloggen</a>';
}
else
{
    header("location:index.php");
}

function getRealIpAddr(){
 if ( !empty($_SERVER['HTTP_CLIENT_IP']) ) {
  $ip = $_SERVER['HTTP_CLIENT_IP'];
 } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
 } else {
  $ip = $_SERVER['REMOTE_ADDR'];
 }
 return $ip;
}


?>
