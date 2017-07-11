<?php require '../connexion/connexion.php'; ?>
<?php

        if (isset($_POST['titre_e'])) {
            if($_POST['titre_e']!=''){
                $experience = addslashes($_POST['titre_e']);
                $e_experience = addslashes($_POST['sous_titre_e']);
                $dates_experiences = addslashes($_POST['dates_e']);
                $description_experiences = addslashes($_POST['description_e']);
                $id_experience = $_POST['id_experience'];

                $pdocv->exec("INSERT INTO t_experiences VALUES (NULL , '$experience' , '$e_experience' , '$dates_experiences' , '$description_experiences' , '1')");

                header("location: ../admin/experiences.php");

                exit();
            }

        }

if (isset($_GET['id_experience'])){
    $eraser = $_GET['id_experience'];
    $sql = "DELETE FROM t_experiences WHERE id_experience = '$eraser'";
    $pdocv->query($sql);
    header("location: ../admin/experiences.php");
}
?>
<?php require '../admin/navigation.inc/haut.inc.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                <?php
                    $sql = $pdocv->prepare("SELECT * FROM t_experiences WHERE utilisateur_id = '1'");
                    $sql->execute();
                    $nbr_experiences = $sql->rowCount();
                ?>

                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Experiences
                        </h1>
                        <br>
                        <p>Il y a <?php echo $nbr_experiences; ?> experiences dans la table pour <?php echo $ligne['pseudo']; ?></p>
                        <br>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Tableau de Bord</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Experiences
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Poste</th>
                                        <th>Entreprise</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Modifier</th>
                                        <th>Supprimer</th>
                                    </tr>
                                    <tr>
                                        <?php while ($ligne_experience = $sql->fetch()) { ?>
                                        <td><?php echo $ligne_experience['titre_e']; ?></td>
                                        <td><?php echo $ligne_experience['sous_titre_e']; ?></td>
                                        <td><?php echo $ligne_experience['dates_e']; ?></td>
                                        <td><?php echo $ligne_experience['description_e']; ?></td>
                                        <td><a href="modif_experiences.php?id_experience=<?php echo
                                        $ligne_experience['id_experience']; ?>">
                                        <i class="glyphicon glyphicon-pencil pull-right"></i></a></td>
                                        <td><a href="experiences.php?id_experience=<?php echo
                                        $ligne_experience['id_experience']; ?>">
                                        <i class="glyphicon glyphicon-trash pull-right"></i></a></td>
                                    </tr>
                                         <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <br>
                <br>

            <div class="row">

                <form class="form-group" action="experiences.php" method="post">
                    <div class="text-center col-md-12">
                        <h1>Ajouter une experience</h1>
                    </div>
                    <div class="form-group">
                        <label for="titre_e">Poste</label>
                        <input required id="titre_e" name="titre_e" type="text" class="form-control" style="width:200px;">
                        <label for="sous_titre_e">Entreprise</label>
                        <input required id="sous_titre_e" name="sous_titre_e" type="text" class="form-control" style="width:200px;">
                        <label for="dates_e">Date</label>
                        <input required id="dates_e" name="dates_e" type="date" class="form-control" style="width:200px;">
                        <br>
                        <label for="description_e">Description</label>
                        <br>
                        <textarea name="description_e" id="description_e" rows="8" cols="40"></textarea>
                        <input hidden name="id_experience" value="<?php echo
                        $ligne_experience['id_experience']; ?>">

                    </div>
                    <button type="submit" class="btn btn-default">Ajouter</button>
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
    <script> CKEDITOR.replace( 'description_e' ); </script>

</body>

</html>
