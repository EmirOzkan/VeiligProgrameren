<?php
session_start();
if(isset($_SESSION["email"]))
{
    echo '<h3>Het inloggen is gelukt! - '.$_SESSION["email"].'</h3>';
    echo '<br /><br /><a href="logout.php">Uitloggen</a>';
}
else
{
    header("location:index.php");
}
?>
