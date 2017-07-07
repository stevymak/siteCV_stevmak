<?php require '../connexion/connexion.php'; ?>
<?php
/* ***************** COMPETENCE ********************************** */

        if (isset($_POST['competence'])) {
            if($_POST['competence']!=''){
                $competence = addslashes($_POST['competence']);

                $pdocv->exec("INSERT INTO t_competences VALUES (NULL, '$competence' , '1')");
                header("location: ../admin/competences.php");
                exit();
            }

        }

if (isset($_GET['id_competence'])){
    $eraser = $_GET['id_competence'];
    $sql = "DELETE FROM t_competences WHERE id_competence = '$eraser'";
    $pdocv->query($sql);
    header("location: ../admin/competences.php");
}
?>
<?php require '../admin/navigation.inc/haut.inc.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                <?php
                    $sql = $pdocv->prepare("SELECT * FROM t_competences WHERE utilisateur_id = '1'"); // prepare la requete
                    $sql->execute(); // execute-la
                    $nbr_competences = $sql->rowCount(); // compte les lignes
                ?>

                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Compétences
                        </h1>
                        <br>
                        <p>Il y a <?php echo $nbr_competences; ?> Compétences dans la table pour <?php echo $ligne['pseudo']; ?></p>
                        <br>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Tableau de Bord</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Compétences
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
                                        <th>Compétences</th>
                                        <th>Modifier</th>
                                        <th>Supprimer</th>
                                    </tr>
                                    <tr>
                                        <?php while ($ligne_competence = $sql->fetch()) { ?>
                                        <td><?php echo $ligne_competence['competence']; ?></td>
                                        <td><a href="modif_competences.php?id_competence=<?php echo
                                        $ligne_competence['id_competence']; ?>"><i class="glyphicon glyphicon-pencil pull-right"></i></a></td>
                                        <td><a href="competences.php?id_competence=<?php echo
                                        $ligne_competence['id_competence']; ?>">
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

                <form class="form-group" action="competences.php" method="post">
                    <div class="text-center col-md-12">
                        <h1>Insertion d'une compétence</h1>
                    </div>
                    <div class="form-group">
                        <label>Compétences</label>
                        <input required id="competence" name="competence" type="text" class="form-control" style="width:200px;">
                        <p class="help-block">Exemple : Html,Css...</p>
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
