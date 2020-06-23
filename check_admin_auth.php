<?php
/**
 * verifie si l'utilisateur est connecté sinon-> login.php
 * si l'utilisateur connecté n'est pas un admin -> welcome.php
 */
session_start();

if(!isset($_SESSION["username"]))
{
    header("location:login.php");
    exit();
}
else{
    if($_SESSION["user_type"]!="admin")
    {
        header("location:welcome.php");
        exit();
    }
}

?>