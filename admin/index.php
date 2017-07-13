<?php require '../connexion/connexion.php'; ?>
<?php

    session_start();
        if (isset($_SESSION['connexion']) && $_SESSION['connexion']=='connecté') {
                $id_utilisateur=$_SESSION['id_utilisateur'];
                $prenom=$_SESSION['prenom'];
                $nom=$_SESSION['nom'];
        }else{
            header('location:auth.php');
        }
 ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    $sql = $pdocv->query("SELECT * FROM t_utilisateurs WHERE id_utilisateur ='1'");
    $ligne = $sql->fetch();
     ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - <?php echo $ligne['prenom'].' '.$ligne['nom'] ; ?> </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../css/style.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Menu Admin <?php $date = date("d-m-Y");
$heure = date("H:i");
echo $date ." ". $heure;?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong><?php echo $ligne['prenom'].' '.$ligne['nom']; ?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong><?php echo $ligne['prenom'].' '.$ligne['nom']; ?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo " " . $ligne['prenom'].' '.$ligne['nom'] ; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profil.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="auth.php?action=deconnexion"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Tableau de Bord </a>
                    </li>
                    <li>
                        <a href="competences.php"><i class="fa fa-fw fa-table"></i> Compétences</a>
                    </li>
                    <li>
                        <a href="formations.php"><i class="fa fa-fw fa-table"></i> Formations </a>
                    </li>
                    <li>
                        <a href="experiences.php"><i class="fa fa-fw fa-table"></i> Experiences</a>
                    </li>
                    <li>
                        <a href="loisirs.php"><i class="glyphicon glyphicon-tower"></i> Loisirs </a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.php"><i class="fa fa-fw fa-desktop"></i> Elements Bootstrap </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        $sql = $pdocv->query("SELECT * FROM t_titres_cv WHERE utilisateur_id = '1'");
                        $ligne_accroche = $sql->fetch();
                        ?>
                        <h1 class="page-header">
                            Admin <small><?php echo $ligne_accroche['accroche']. ' ' . $ligne_accroche['titre_cv']; ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Tableau de Bord
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-6">

                        <?php
                            $sql = $pdocv->prepare("SELECT * FROM t_competences WHERE utilisateur_id = '1'"); // prepare la requete
                            $sql->execute(); // execute-la
                            $nbr_competences = $sql->rowCount(); // compte les lignes
                        ?>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <span class="badge">
                                        <?php echo $nbr_competences; ?>
                                        </span>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"></div>
                                        <div>Competences</div>
                                    </div>
                                </div>
                            </div>
                            <a href="competences.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Plus de Détails</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6">

                        <?php
                            $sql = $pdocv->prepare("SELECT * FROM t_experiences WHERE utilisateur_id = '1'");
                            $sql->execute();
                            $nbr_experiences = $sql->rowCount();
                        ?>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <span class="badge">
                                        <?php echo $nbr_experiences; ?>
                                        </span>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"></div>
                                        <div>Experiences</div>
                                    </div>
                                </div>
                            </div>
                            <a href="experiences.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Plus de Détails</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">

                        <?php
                            $sql = $pdocv->prepare("SELECT * FROM t_experiences WHERE utilisateur_id = '1'");
                            $sql->execute();
                            $nbr_loisirs = $sql->rowCount();
                        ?>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <span class="badge">
                                        <?php echo $nbr_loisirs; ?>
                                        </span>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"></div>
                                        <div>Loisirs</div>
                                    </div>
                                </div>
                            </div>
                            <a href="loisirs.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Plus de Détails</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6">

                        <?php
                            $sql = $pdocv->prepare("SELECT * FROM t_formations WHERE utilisateur_id = '1'");
                            $sql->execute();
                            $nbr_formations = $sql->rowCount();
                        ?>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <span class="badge">
                                        <?php echo $nbr_formations; ?>
                                        </span>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"></div>
                                        <div>Formations</div>
                                    </div>
                                </div>
                            </div>
                            <a href="formations.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Plus de Détails</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

            <footer>
                <nav class="navbar navbar-fixed-bottom navbar-default">
                    <div class="container text-center" style="background-color:#222;height:50px;width:100%;">
                        <?php echo date('Y') ?> - Tous droits reservés
                    </div>
                </nav>
            </footer>

        </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->

    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
