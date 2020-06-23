<?php




///fichier contenant les differente fonction d'interrogation de la base de donnee 
/// modifier les parametre de connect_bd() pour changer le base , serveur , user ,...

function connect_bd(){
  //parametre et connextion a la base 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "dashboard_admin_bd";
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connexion a la base de données échouée : %s\n" . $mysqli->error);

return $mysqli;
}


///----------------------- gestion logs ----------------------------

function recuperer_log()
{
            $requete = "SELECT * FROM log_table";
            //connexion a la base
            $mysqli = connect_bd();
            //recuperation des log dans la base et sotckage dans tableau
            $tab_log = array();
            $i = 0;
            
            if ($resultat = $mysqli->query($requete)) 
            {
            
              while ($row = $resultat->fetch_assoc()) 
              {
                $tab_log[$i]= $row;
                $i++;
              };
              //retourner tableau pour javascript
              echo json_encode($tab_log);
            } 
            else 
            {
              echo "erreur lors de la recuperation des donnees de la base ";
            }
            $mysqli->close();
}

//fonction pour supprimer log

function supprimer_log($numLog)
{

  //connexion a la base
  $mysqli = connect_bd();

  $req_suppr = "DELETE FROM log_table WHERE `num`=". $numLog ;
  if($mysqli->query($req_suppr) === TRUE)
{
    echo '<div id="alert-bd" class="alert alert-success" role="alert">
    the log '. $numLog.' has been deleted </div>';

} else {
    echo '<div id="alert-bd" class="alert alert-danger" role="alert">
    '. "error while deleting the log'. $numLog.'</div>";
}

$mysqli->close();
}



//fonction pour modifier log :
function modifier_log($num,$username,$ip_address,$browser,$os)
{
  //se connecter a la base
  $mysqli = connect_bd();

  //requete de modification :
    $req_modif = "UPDATE log_table 
    SET username='". $username . "',ip_address = '" . $ip_address . "'
    ,browser='". $browser ."',os='".$os."' WHERE num=".$num;

  if($mysqli->query($req_modif) === TRUE)
{
    echo '<div id="alert-bd" class="alert alert-success" role="alert">
    the log '. $num.' has been modified </div>';

} else {
    echo '<div id="alert-bd" class="alert alert-danger" role="alert">
    '. "error while editing log'. $num.'</div>";
}


  //fermer la connexion
  $mysqli->close();
}
{
  
}

///----------------------- gestion utilisateurs ----------------------------
//recuperer utilisateurs 
function recuperer_utilisateurs()
{
            $requete = "SELECT * FROM users";
            //connexion a la base
            $mysqli = connect_bd();
            //recuperation des log dans la base et sotckage dans tableau
            $tab_users = array();
            $i = 0;
            
            if ($resultat = $mysqli->query($requete)) 
            {
            
              while ($row = $resultat->fetch_assoc()) 
              {
                $tab_users[$i]= $row;
                $i++;
              };
              //retourner tableau pour javascript
              echo json_encode($tab_users);
            } 
            else 
            {
              echo '<div id="alert-bd" class="alert alert-success" role="alert">
              error while getting users from database </div>' ;
            }
            $mysqli->close();
}

    //fonction pour ajouter utilisateur 
    function ajouter_utilisateur($username,$email,$type,$password)
{
      //connexion a la base
        $mysqli = connect_bd();

      // encrypter le mot de passe (algo PASSWORD_DEFAULT) avec un cout de 12
      //doc : https://www.php.net/manual/en/function.password-hash.php

  $password = password_hash($password,PASSWORD_DEFAULT,["cost"=> 12]);

  //requete ajout:
    $req_ajout ="INSERT INTO `users` ( `user_type`, `username`, `email`, `password`) 
    VALUES ('".$type."', '".$username."', '".$email."', '".$password."')";

        if($mysqli->query($req_ajout) === TRUE)
      {
          echo '<div id="alert-bd" class="alert alert-success" role="alert">'.
          "the user  ". $username.' has been added </div>';

      } else {
          echo '<div id="alert-bd" class="alert alert-danger" role="alert">
          '. "error while adding the user ". $username ."</div>";
      }

  //fermer la connexion
  $mysqli->close();
}


//fonction pour modifier utilisateur : (sans modification du type) 
  function modifier_utilisateur($idUser,$username,$email,$password)
  {
    
    //connexion a la base
  $mysqli = connect_bd();

  // encrypter le mot de passe (algo PASSWORD_DEFAULT) avec un cout de 12
  //doc : https://www.php.net/manual/en/function.password-hash.php

  $password = password_hash($password,PASSWORD_DEFAULT,["cost"=> 12]);

  //requete de modification :
    $req_modif = "UPDATE `users` SET `username`='".$username."',`email`='".$email."',`password`='".$password."' WHERE `id`=".$idUser;
        if($mysqli->query($req_modif) === TRUE)
      {
          echo '<div id="alert-bd" class="alert alert-success" role="alert">'.
          "the user ". $username."(". $idUser.') has been modified </div>';

      } else {
          echo '<div id="alert-bd" class="alert alert-danger" role="alert">
          '. "error while editing user ". $username."(". $idUser.")</div>";
      }

  //fermer la connexion
  $mysqli->close();

  }

//fonction pour supprimer un utilisateur :

function supprimer_utilisateur($idUser)
{

  //connexion a la base
  $mysqli = connect_bd();

  //requete de suppression utilisateur :
  $req_suppr = "DELETE FROM users WHERE `id`=". $idUser ;
  if($mysqli->query($req_suppr) === TRUE)
{
    echo '<div id="alert-bd" class="alert alert-success" role="alert">' .
    "the user ". $idUser.' has been deleted </div>';

} else {
    echo '<div id="alert-bd" class="alert alert-danger" role="alert">
    '. "error while deleting the user '. $idUser.'</div>";
}

$mysqli->close();
}

function modifier_type_utilisateur($idUser, $type){
  //connexion a la base
  $mysqli = connect_bd();

  //requete de modification :
    $req_modif = "UPDATE `users` SET `user_type`='".$type."' WHERE `id`=".$idUser;
        if($mysqli->query($req_modif) === TRUE)
      {
          echo '<div id="alert-bd" class="alert alert-success" role="alert">'.
          " user type of the user ".  $idUser.' has been modified </div>';

      } else {
          echo '<div id="alert-bd" class="alert alert-danger" role="alert">
          '. "error while editing user type of the user ".  $idUser."</div>";
      }



  //fermer la connexion
  $mysqli->close();

}




//-------------------------- outils pour les requetes xhr ---------------------

//permet d'executer une fonction appelee par un autre fichier ex: requete xhr a partir d'un nom
if(isset($_GET["nomfonct"]))
{
  $nom_fonct = $_GET["nomfonct"];
  // test et execute la fonction demandé avec le parametre $nom_fonct
    if(function_exists($nom_fonct))
    {
      $nom_fonct();
    }

}
  

?>