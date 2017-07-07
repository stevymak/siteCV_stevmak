<?php require '../connexion/connexion.php'; ?>
<?php

        if (isset($_POST['titre_e'])) {
            if($_POST['titre_e']!=''){
                $experience = addslashes($_POST['titre_e']);

                $pdocv->exec("INSERT INTO t_experiencess VALUES (NULL, '$experiences' , '1')");
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
                                        <th>experiences</th>
                                        <th>modifier</th>
                                        <th>supprimer</th>
                                    </tr>
                                    <tr>
                                        <?php while ($ligne_experience = $sql->fetch()) { ?>
                                        <td><?php echo $ligne_experience['titre_e']; ?></td>
                                        <td><?php echo $ligne_experience['sous_titre_e']; ?></td>
                                        <td><?php echo $ligne_experience['description_e']; ?></td>
                                        <td><?php echo $ligne_experience['dates_e']; ?></td>
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
                        <h1>Ajouter une experience</h1>
                    </div>
                    <div class="form-group">
                        <label>Experiences</label>
                        <input required id="experience" name="experience" type="text" class="form-control" style="width:200px;">
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

</body>

</html>
