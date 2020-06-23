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
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Dashboard</h3>
                            <br>
                        </div>
                    </div>
                </div>
                <!--/page title-->

                <!-- tableau des utilisateurs -->
                <div class="col-md-12" style="background-color: white;padding:1rem;border-radius:1rem">
                    <h4>Logs</h4>
                    <table id="log_table" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Num</th>
                                <th>Username</th>
                                <th>Ip address</th>
                                <th>Browser</th>
                                <th>OS</th>
                                <th>Login time</th>
                                <th>Logout time</th>
                                <th></th>

                            </tr>
                        </thead>
                    </table>


                    <!-----------script php et js----------->
                    <?php
                    //inclu le fichier de gestion de la base pour utiliser les fonction
                    require("gestion_bd.php");
                    ?>

                    <script>
                        //---------------tabeau avec le plugin Datatables---------------
                        $(document).ready(function() {
                            //déclaration de la table contenant les données et appel de DataTable et recupperation des log avec ajax
                            table = $('#log_table').DataTable({
                                "ajax": {
                                    "method": "POST",
                                    "url": "gestion_bd.php?nomfonct=recuperer_log",
                                    "dataSrc": ""
                                },
                                "columns": [{
                                        "data": "num"
                                    }, {
                                        "data": "username"
                                    },
                                    {
                                        "data": "ip_address"
                                    },
                                    {
                                        "data": "browser"
                                    },
                                    {
                                        "data": "os"
                                    },
                                    {
                                        "data": "login_time"
                                    },
                                    {
                                        "data": "logout_time"
                                    },
                                    {
                                        "data": null,
                                        'render': function(data, type, row) {
                                            //rajoute une colonne connenant les bouton de chaque ligne
                                            str = '<div class="btn-group btn-group-sm">' +
                                                '<a href="#" class="btn btn-info"  data-toggle="modal" data-target="#editModal" id="' + row.id + '" onClick="edit_log(this)"><i class="fas fa-edit"></i></a>' +
                                                '<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#editModal" id="' + row.id + '" onClick="del_log(this)" ><i class="fas fa-trash"></i></a></div>'
                                            return str;
                                        }
                                    }

                                ]
                            });
                        });


                        //fonction pour la modification du log :
                        function edit_log(id) {
                            //tr la ligne courante du bouton cliqué
                            var tr = $(id).closest('tr');
                            //recuperer les donnees , data : tableau contenant les données de la ligne
                            var data = table.row(tr).data();

                            //modifie titre du modal
                            document.getElementById("ModalLabel").innerHTML = "Edit log:&nbsp" + data["num"];

                            //rempli le modal avec un formulaire contenant les information a modifier
                            document.getElementById("bodyModal").innerHTML =
                                '<form method="POST" name="form_modifier">' +
                                '<input type="hidden" name="numLog" value="' + data["num"] + '">' +
                                '<div class="form-group"><label >Username</label>' +
                                '<input type="text" class="form-control" name="ch_user" value="' + data["username"] +
                                '"></div>' +
                                '<div class="form-group"><label >ip address</label>' +
                                '<input type="text" class="form-control" name="ch_ip" value="' + data["ip_address"] +
                                '"></div>' +
                                '<div class="form-group"><label >Browser</label>' +
                                '<input type="text" class="form-control" name="ch_browser" value="' + data["browser"] +
                                '"></div>' +
                                '<div class="form-group"><label >OS</label>' +
                                '<input type="text" class="form-control" name="ch_os" value="' + data["os"] +
                                '"></div>' +
                                '<div class="form-group"><label >Login time</label>' +
                                '<input type="text" class="form-control" name="ch_login_time" disabled="disabled" value="' + data["login_time"] +
                                '"></div>' +
                                '<div class="form-group"><label >Logout time</label>' +
                                '<input type="text" class="form-control" name="ch_logout_time" disabled="disabled" value="' + data["logout_time"] +
                                '"></div>' +
                                '<div class="row justify-content-md-center"><div class="col-md-4">' +
                                '<button type="submit"  name="modiflog" class="btn btn-primary btn-lg btn-block">Edit</button></div></div></form> ';


                        }

                        //fonction pour la suppression d'un log :
                        function del_log(id) {
                            //tr la ligne courante du bouton cliqué
                            var tr = $(id).closest('tr');
                            //recuperer les donnees , data : tableau contenant les données de la ligne
                            var data = table.row(tr).data();

                            //modifie titre du modal
                            document.getElementById("ModalLabel").innerHTML = "Delete log:&nbsp" + data["num"];
                            //modifie le contenu du modal
                            document.getElementById("bodyModal").innerHTML = "Are you sure you want to delete the log:<br>" +
                                '<form method="POST" name="form_suppr">' +
                                '<input type="hidden" name="numLog" value="' + data["num"] + '">' +
                                '<br><label >Username:&nbsp</label>' + data["username"] +
                                '<br><label >Ip address:&nbsp</label>' + data["ip_address"] +
                                '<br><label >Browser:&nbsp</label>' + data["browser"] +
                                '<br><label >OS:&nbsp</label>' + data["os"] +
                                '<br><label >Login time:&nbsp</label>' + data["login_time"] +
                                '<br><label >Logout time:&nbsp</label>' + data["logout_time"] +
                                '<br><div class="row justify-content-md-center"><div class="col-md-4">' +
                                '<button type="submit" name="supprlog" class="btn btn-danger btn-lg btn-block">Delete</button></div></div></form> ';
                        }
                    </script>

                    <!------------ php pour la modification ou la suppression de log  ------------>
                    <?php

                    // code pour suppression de log en recuperant le num du log fourni par le formulaire
                    if (isset($_POST["supprlog"])) {
                        $numLog = $_POST["numLog"];

                        //executer la fonction defini dans "gestion_bd.php" pour supprimer log
                        supprimer_log($numLog);
                    }

                    //code pour la modification du log :(au moint un champ saisi)
                    if (
                        isset($_POST["modiflog"]) &&
                        (isset($_POST["ch_user"]) || isset($_POST["ch_ip"]) ||
                            isset($_POST["ch_browser"]) || isset($_POST["ch_os"]))
                    ) {
                        modifier_log($_POST["numLog"], $_POST["ch_user"], $_POST["ch_ip"], $_POST["ch_browser"], $_POST["ch_os"]);
                    }

                    ?>

                    <!-- panneau d'édition et suppression -->
                    <!-- Modal -->
                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLabel"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="bodyModal">
                                    ...
                                </div>
                                <div class="modal-footer ">
                                    <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- fin panneau d'édition et suppression -->
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