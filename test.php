<?php


session_start();

//-- redirection si non connecté :

if ($_SESSION["logged_in"] == 0 )
{
    header("location:login.php");
    exit(); //arrete l'execution de la page
}

echo "<h1>page d test</h1>"


?>