<?php require '../connexion/connexion.php'; ?>
<?php

        if (isset($_POST['titre_f'])) {
                $titre_f = addslashes($_POST['titre_f']);
                $sous_titre_f = addslashes($_POST['sous_titre_f']);
                $date_f = addslashes($_POST['date_f']);
                $description_f = addslashes($_POST['description_f']);
                $id_formation = $_POST['id_formation'];


                $pdocv->exec("UPDATE t_formations SET titre_f = '$titre_f', sous_titre_f = '$sous_titre_f', date_f = '$date_f', description_f = '$description_f' WHERE id_formation = '$id_formation'");

                header("location: ../admin/formations.php");

                exit();
            }

        $id_formation = $_GET['id_formation'];
        $sql = $pdocv->query("SELECT * FROM t_formations WHERE id_formation = '$id_formation'");
        $ligne_formation = $sql->fetch();



?>
<?php require '../admin/navigation.inc/haut.inc.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">

                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Formations
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Tableau de Bord</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Formations
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <br>
                <br>

                <div class="row">
                    <form class="form-group" action="" method="post">
                        <div class="text-center col-md-12">
                        <h1>Formulaire de mise à jour de Formation</h1>
                    </div>
                        <div class="form-group">
                            <label for="titre_f">Formation</label>
                            <input id="titre_f" type="text" name="titre_f" class="form-control" style="width:200px;" value="<?php
                            echo $ligne_formation['titre_f']; ?>">
                            <label for="sous_titre_f">Organisme de Formation</label>
                            <input id="sous_titre_f" type="text" name="sous_titre_f" class="form-control" style="width:200px;" value="<?php
                            echo $ligne_formation['sous_titre_f']; ?>">
                            <label for="date_f">Date</label>
                            <input id="date_f" type="date" name="date_f" class="form-control" style="width:200px;" value="<?php
                            echo $ligne_formation['date_f']; ?>">
                            <br>
                            <label for="description_f">Description</label>
                            <br>
                            <input id="description_f" type="text" name="description_f" class="form-control" value="<?php
                            echo $ligne_formation['description_f']; ?>">
                            <input hidden name="id_formation" value="<?php echo
                            $ligne_formations['id_formation']; ?>">
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

    <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>

    <script> CKEDITOR.replace( 'description_f' ); </script>

</body>

</html>
