<?php require '../connexion/connexion.php'; ?>
<?php
    //gestion des contenus, mise a jour des compétence
    if (isset($_POST['competence'])) {
            $competence = addslashes($_POST['competence']);
            $id_competence = $_POST['id_competence'];
            $pdocv->exec("UPDATE t_competences SET competence = '$competence' WHERE id_competence = '$id_competence'");
            header('location: ../admin/competences.php');
            exit();
    }

    $id_competence = $_GET['id_competence'];
    $sql = $pdocv->query("SELECT * FROM t_competences WHERE id_competence = '$id_competence' ");
    $ligne_competence = $sql->fetch();

?>
<?php require '../admin/navigation.inc/haut.inc.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Modif Compétences
                        </h1>
                        <br>
                        <br>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Tableau de Bord</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Modif Compétences
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                        </div>
                    </div>
                </div>

                <br>
                <br>

                <div class="row">
                    <form class="text-center" action="modif_competences.php" method="post">
                        <div class="form-group">
                            <label for="competence">Formulaire de mise à jour de la compétence</label>
                            <input type="text" name="competence" class="form-control" value="<?php
                            echo $ligne_competence['competence']; ?>">
                            <input hidden name="id_competence" value="<?php echo
                            $ligne_competence['id_competence']; ?>">
                        </div>
                        <input type="submit" value="Mettre à jour" class="btn btn-primary btn-lg" style="margin-top:10px;">
                    </form>
                </div>

                <!-- /.row -->

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

</body>

</html>
