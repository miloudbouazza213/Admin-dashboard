<?php
require("check_admin_auth.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--title-->
    <title>Admin Dashboard | Edit users </title>

    <!-- Bootstrap -->
    <link href="gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome kit ( + recent que la version de gentellela) -->
    <script src="https://kit.fontawesome.com/e74c79c765.js" crossorigin="anonymous"></script>

    <!-- NProgress -->
    <link href="gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="gentelella/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet" />

    <!-- Custom Theme Style -->
    <link href="gentelella/build/css/custom.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="gentelella/vendors/jquery/dist/jquery.min.js"></script>
    <!--datatables cdn-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/b-1.6.1/r-2.2.3/sc-2.0.1/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/b-1.6.1/r-2.2.3/sc-2.0.1/datatables.min.js"></script>

</head>

<body class="nav-md ">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <!--title on sidebar-->
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.php" class="site_title"> <i class="fa fa-cogs"></i> <span>AdminDashboard</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="https://via.placeholder.com/150" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?php echo $_SESSION["username"] ?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a href="./."><i class="fa fa-tachometer-alt"></i> Dashboard </span></a>
                                </li>

                            </ul>

                        </div>

                        <div class="menu_section">
                            <h3>Manage users</h3>
                            <ul class="nav side-menu">
                                <!--ajouter un user-->
                                <li>
                                    <a href="./add_user.php"><i class="fa fa-user-plus"></i>
                                        Add user
                                    </a>
                                </li>

                                <!--modifier utilisateur et reset pwd-->
                                <li>
                                    <a href="./edit_users.php">
                                        <i class="fa fa-user-edit"></i>
                                        Edit users
                                    </a>
                                </li>

                                <!--modifier l'acces d'un utilisateur-->
                                <li class="nav-item">
                                    <a href="./user_access.php"><i class="fa fa-user-cog"></i>Edit user access</a>
                                </li>

                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">

                        <ul class=" navbar-right">

                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <?php echo $_SESSION["username"] ?>
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-88px, 21px, 0px);">

                                    <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </div>
                            </li>
                        </ul>

                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">

                <!--page title-->
                <div class="row">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Add user</h3>
                        </div>
                    </div>
                </div>
                <!--/page title-->

                <div class="row justify-content-md-center">
                    <!-- formulaire d'ajout-->

                    <div class="col-md-5">
                        <div class="card card-primary">
                            <form class="form" method="POST" onsubmit="return validerForm()" >
                                <div class="card-body">
                                    <div class="form-group"><label>Username</label>
                                        <input type="text" class="form-control" id="ch_user" name="ch_user">
                                    </div>
                                    <div class="form-group"><label>Email address</label>
                                        <input type="email" class="form-control" id="ch_email" name="ch_email"></div>
                                    <div class="form-group"><label>User type</label>
                                        <select class="form-control" id="select_type" name="select_type">
                                            <option>client</option>
                                            <option>admin</option>
                                        </select>
                                    </div>
                                    <div class="form-group"><label>Password</label>
                                        <input type="password" oninput="verifier_pwd()" class="form-control" id="pwd1" name="ch_pwd1" placeholder="enter a password"></div>
                                    <div class="form-group"><label>Confirm password</label>
                                        <input type="password" oninput="valider_pwds()" class="form-control" id="pwd2" name="ch_pwd2"></div>
                                    <p id="msg_erreur" style="color:red;"></p>
                                    <p id="msg_erreur2" style="color:red;"></p>
                                    <p id="msg_erreur3" style="color:red;"></p>

                                    <div class="row justify-content-md-center">
                                        <div class="col-md-5">
                                            <button type="submit" id="btn_Ajout" disabled name="btn_ajout_user" class="btn btn-primary btn-lg btn-block">Add user</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row justify-content-md-center">

                    <div class=" col-md-3 col-sm-12 ">
                        <a href="./edit_users.php">
                            <div class="tile-stats">
                                <div class="icon" style="margin-left: 1rem"><i class="fa fa-users"></i>
                                </div>
                                <h3>Registered users</h3>
                                <div class="count" id="nb_user"></div>
                                <p>manage users</p>
                            </div>
                        </a>
                    </div>

                </div>

                <!-----------script php et js----------->
                <?php
                //inclu le fichier de gestion de la base pour utiliser les fonction
                require("gestion_bd.php");
                ?>

                <script>
                    //--------------recuperer liste utilisateurs et remplir la box nombre d'utilisateurs-----------------

                    //recuperer les données des utilisateurs de la base avec une requete xhr : 
                    function recuperer_donnees() {
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "gestion_bd.php?nomfonct=recuperer_utilisateurs", true);
                        xhr.send();
                        xhr.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                //liste des utilisateurs:
                                tab_user = JSON.parse(this.responseText);

                                //remplir carte nombre user :
                                document.getElementById("nb_user").innerHTML = Object.keys(tab_user).length;
                            }
                        }
                    }

                    //premiere recuperation de donnees :
                    recuperer_donnees();

                    //booleens pour la validation du formulaire :
                    pwds_valides = false;
                    pwd_correct = false;


                    //fonction pour verifier si mot de passe valide 

                    function verifier_pwd() {
                        //recuperer la valeur du champ pwd1 :
                        var expression = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,40}$/; // 6 to 20 characters which contain at least one numeric digit,
                        // one uppercase and one lowercase letter]

                        //recuperer la valeur du champ pwd1 : et tester 
                        if (document.getElementById("pwd1").value.match(expression)) {
                            document.getElementById("msg_erreur").innerHTML = "";
                            pwd_correct = true;
                        } else {
                            document.getElementById("msg_erreur").innerHTML = "incorrect password  <br>" +
                                "password must contain : 6 to 40 characters , at least one numeric digit, one uppercase and one lowercase letter";
                            pwd_correct = false;
                        }

                    }

                    //fonction pour verifier si l'email est valide 
                    function verifier_email() {
                        //recuperer la valeur du champ pwd1 :
                        var expression = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; // https://www.w3resource.com/javascript/form/email-validation.php

                        //recuperer la valeur du champ pwd1 : et tester 
                        if (document.getElementById("ch_email").value.match(expression)) {
                            document.getElementById("msg_erreur3").innerHTML = "";
                            return true;
                        } else {
                            document.getElementById("msg_erreur3").innerHTML = "incorrect email address : <br>" +
                                "please enter a valid email address (exemple@exemple.fr)";
                            return false;
                        }
                    }


                    //fonction pour verifier que les deux champs mot de passe sont identique et activer bouton si email valide et pwds valides
                    function valider_pwds() {
                        //verifier si les deux champs sont identiques et que le mot de passe est valide 
                        if (document.getElementById("pwd1").value == document.getElementById("pwd2").value && pwd_correct == true) {
                            // effacer erreur et booleen pour le validation du formulaire
                            document.getElementById("msg_erreur2").innerHTML = "";
                            pwds_valides = true;
                        } else {
                            // afficher erreur
                            pwds_valides = false;
                            document.getElementById("msg_erreur2").innerHTML = "these passwords don't match";

                        }

                        //activer 
                        if (pwd_correct && pwds_valides) {
                            //activer bouton Add user
                            document.getElementById("btn_Ajout").disabled = false;

                        } else { //desactiver bouton Add user
                            document.getElementById("btn_Ajout").disabled = true;

                        }
                    }



                    //verifier si le nom d'utilisateur et l'email existe déja avant d'envoyer .
                    function validerForm() {
                        form_valide = verifier_email(); //si l'email est valide return true;
                        //verifier si les champs utilisateur ou email ne sont pas vide:
                        if (document.getElementById("ch_user").value == "" || document.getElementById("ch_email").value == "") {
                            //afficher erreur et booleen pour la validation
                            document.getElementById("msg_erreur").innerHTML = "all fields are required";
                            form_valide = false;
                        }

                        //verifier si le nom dutilisateur ou l'email ne soient pas déja utilisé par un autre utilisateur
                        else {
                            //efface les zone de message d'erreur
                            document.getElementById("msg_erreur").innerHTML = "";
                            document.getElementById("msg_erreur2").innerHTML = "";

                            //tableau sans la ligne correspondant a l'utilisateur actuel (id correspond a l'indice de la ligne actuel)
                            var tab_verif = tab_user.splice(id, 1);
                            if (check(tab_verif, "username", document.getElementById("ch_user").value)) {
                                document.getElementById("msg_erreur").innerHTML = "this username is already taken";
                                form_valide = false;
                            }
                            if (check(tab_verif, "email", document.getElementById("ch_email").value)) {
                                document.getElementById("msg_erreur2").innerHTML = "this email address is already taken";
                                form_valide = false;
                            }

                        }
                        //retourne true si le formulaire est correct sinon false
                        return form_valide;

                    }

                    //fonction de recherche d'une valeur dans un tableau multidimentionnel 
                    //https://stackoverflow.com/questions/52103644/includes-in-multidimensional-array
                    function check(array, key, value) {
                        return array.some(object => object[key] === value);
                    }
                </script>

                <!------------ php pour l'ajout d'un utilisateur  ------------>
                <?php


                if (
                    isset($_POST["btn_ajout_user"])
                    && isset($_POST["ch_user"]) && isset($_POST["ch_email"]) && isset($_POST["select_type"]) && isset($_POST["ch_pwd1"])
                ) {
                    //appel de la fonction ajouter utilisateur du ficher de gestion de la bd
                    ajouter_utilisateur($_POST["ch_user"],
                    $_POST["ch_email"],
                    $_POST["select_type"],
                    $_POST["ch_pwd1"]);
                }

                ?>

            </div> <!-- /page content -->


        </div>
    </div>
    <!-- footer content -->
    <footer style="text-align: right">
        <div class="pull-right">
            Made with Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->

    <!-- Bootstrap -->
    <script src="gentelella/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="gentelella/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="gentelella/vendors/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="gentelella/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="gentelella/build/js/custom.min.js"></script>
</body>

</html>