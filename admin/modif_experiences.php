<?php require '../connexion/connexion.php'; ?>
<?php

if (isset($_POST['titre_e'])) {
    if($_POST['titre_e']!=''){
        $experience = addslashes($_POST['titre_e']);
        $e_experience = addslashes($_POST['sous_titre_e']);
        $dates_experiences = addslashes($_POST['dates_e']);
        $description_experiences = addslashes($_POST['description_e']);

        $pdocv->exec("UPDATE t_experiences SET champ_titre_e = '$experience' , champ_sous_titre_e = '$e_experience' , champ_dates_e = '$dates_experiences' , champ_description_e = '$description_experiences' WHERE id_experience = '$id_experience')");
        header("location: ../admin/experiences.php");
        exit();
    }

}

?>
<?php require '../admin/navigation.inc/haut.inc.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                <?php
                    $sql = $pdocv->prepare("SELECT * FROM t_experiences WHERE utilisateur_id = '1'"); // prepare la requete
                    $sql->execute(); // execute-la
                    $nbr_experiences = $sql->rowCount(); // compte les lignes
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
                                        $ligne_experience['id_experience']; ?>"><i class="glyphicon glyphicon-pencil pull-right"></i></a></td>
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
                        <h1>Formulaire de mise à jour de l'experience</h1>
                    </div>
                        <div class="form-group">
                            <label for="titre_e">Poste</label>
                            <input id="titre_e" type="text" name="titre_e" class="form-control" style="width:200px;" value="<?php
                            echo $ligne_experience['titre_e']; ?>">
                            <label for="sous_titre_e">Entreprise</label>
                            <input id="sous_titre_e" type="text" name="sous_titre_e" class="form-control" style="width:200px;" value="<?php
                            echo $ligne_experience['sous_titre_e']; ?>">
                            <label>Date</label>
                            <input id="dates_e" type="date" name="dates_e" class="form-control" style="width:200px;" value="<?php
                            echo $ligne_experience['dates_e']; ?>">
                            <br>
                            <label>Description</label>
                            <br>
                            <input id="description_e" type="text" name="description_e" class="form-control" rows="8" cols="40" value="<?php
                            echo $ligne_experience['description_e']; ?>">
                            <input hidden name="id_experience" value="<?php echo
                            $ligne_competence['id_experience']; ?>">
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
