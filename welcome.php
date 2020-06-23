<?php
session_start();
if($_SESSION["user_type"]=="admin")
{
    //redirige l'admine vers le  dashboard:
    header("location:index.php");
    exit();
}

?>

<html>
<body>
<h1> Welcome <?php echo $_SESSION["username"] ?></h1>
<br>
 <p> your account type is : <?php echo $_SESSION["user_type"] ?></p>
<a href="logout.php"><button>Logout </button></a>
</body>
</html>