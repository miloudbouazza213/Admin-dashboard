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
                            <h3>Manage users access</h3>
                        </div>
                    </div>
                </div>
                <!--/page title-->

                <div class="row justify-content-md-center">

                    <!--formulaire de modification-->
                    <div class="col-md-4 my-auto">
                        <div class="card card-primary">
                            <form class="form" method="POST">
                                <div class="card-body">
                                    <form method="POST" name="form_suppr">
                                        <input type="hidden" name="id_user" id="id_user">
                                        <label>Username:&nbsp</label>
                                        <p id=l_username></p>
                                        <label>Email address:&nbsp</label>
                                        <p id=l_email></p>
                                        <label>User type:&nbsp</label>
                                        <p id=l_type></p>
                                        <div class="form-group"><label>Choose User type</label>
                                            <select class="form-control" id="select_type" name="select_type">
                                                <option>client</option>
                                                <option>admin</option>
                                            </select>
                                        </div>
                                        <div class="row justify-content-md-center">
                                            <div class="col-md-8">
                                                <button type="submit" id="btn_modif_type" disabled name="btn_modif_type" class="btn btn-primary btn-lg btn-block">Edit user type</button>
                                            </div>
                                        </div>

                                </div>
                            </form>
                        </div>
                    </div>

                    <!--formulaire de modification-->
                    <!--liste utilisateur-->
                    <div class="col-md-6">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Users list</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="user_table" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>User type</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </div>

                <!-----------script php et js----------->
                <?php
                //inclu le fichier de gestion de la base pour utiliser les fonction
                require("gestion_bd.php");
                ?>

                <script>
                    //---------------tabeau avec le plugin Datatables---------------
                    $(document).ready(function() {
                        //déclaration de la table contenant les données et appel de DataTable
                        table = $('#user_table').DataTable({
                            "ajax": {
                                "method": "POST",
                                "url": "gestion_bd.php?nomfonct=recuperer_utilisateurs",
                                "dataSrc": ""
                            },
                            "columns": [{
                                    "data": "id"
                                }, {
                                    "data": "username"
                                },
                                {
                                    "data": "email"
                                },
                                {
                                    "data": "user_type"
                                },
                                {
                                    "data": null,
                                    'render': function(data, type, row) {
                                        //rajoute une colonne connenant les bouton de chaque ligne
                                        str = '<div class="btn-group btn-group-sm">' +
                                            '<a href="#" class="btn btn-info" id="' + row.id + '" onClick="fill_form(this)"><i class="fas fa-user-cog"></i></a></div>'
                                        return str;
                                    }
                                }

                            ]
                        });


                    });


                    //remplir le formulaire avec les information de la ligne selectionné
                    function fill_form(id) {
                        //activer le bouton du formulaire
                        document.getElementById("btn_modif_type").disabled = false;
                        //tr la ligne courante du bouton cliqué
                        var tr = $(id).closest('tr');
                        //recuperer les donnees , data : tableau contenant les données de la ligne
                        var data = table.row(tr).data();


                        //remplir le formulaire avec les données de l'utilisateur choisit:
                        document.getElementById("id_user").value = data["id"];
                        document.getElementById("l_username").innerHTML = data["username"];
                        document.getElementById("l_email").innerHTML = data["email"];
                        document.getElementById("l_type").innerHTML = data["user_type"];
                    }
                </script>

                <!------------ php pour la modification du type de compte d'un utilisateur  ------------>
                <?php

                // code pour pour la modification en recuperant l'id de l'utilisateur fourni par le formulaire
                //executer la fonction defini dans "gestion_bd.php" pour modifier le type de l'utilisateur 
                if (isset($_POST["btn_modif_type"])) {
                    $idUser = (int) $_POST["id_user"];
                    modifier_type_utilisateur($idUser, $_POST["select_type"]);
                }
                ?>


            </div>
            <!-- /page content -->

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