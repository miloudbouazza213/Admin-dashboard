<?php
/**
 * fichier contenant les differentes fonction pour la connexion
 * d'un utilisateur
 * 
 * 
 */

    // se connecter a la base de données :

    //parametre et connextion a la base 
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $db = "dashboard_admin_bd";
  $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connexion a la base de données échouée : %s\n" . $mysqli->error);
  

  // recuperer les champs username et password :

  $username = $_POST["username"];
  $password = $_POST["password"];

  //verifier si l'utilisatuer existe dans la base :
    $requete = " SELECT * FROM `users` WHERE `username` ='" .$username."'" ;

    if($result = $mysqli->query($requete))
    {
        //si l'utilisateur existe recuperer le password pour verfication :
        if($result->num_rows > 0)
        {
            $row =$result->fetch_assoc();
            $encrypted_pwd =  $row["password"];
            if(password_verify($password,$encrypted_pwd)){
                session_start();
                //varible de session a récuperer par les autre pages:
                $_SESSION["username"]=$username;
                $_SESSION["user_type"]= $row["user_type"];
                //redirection vers la page d'acceuil:
                header("location:welcome.php");

            }
            else{echo "warning";
            }
        }
    }
    else{
        echo "error while trying to get data from database";
    }


