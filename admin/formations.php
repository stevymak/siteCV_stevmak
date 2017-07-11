<?php require '../connexion/connexion.php'; ?>
<?php

        if (isset($_POST['titre_f'])) {
            if($_POST['titre_f']!=''){
                $formation = addslashes($_POST['titre_f']);
                $f_formation = addslashes($_POST['sous_titre_f']);
                $date_formation = addslashes($_POST['date_f']);
                $description_formation = addslashes($_POST['description_f']);
                $id_formation = addslashes($_POST['id_formation']);

                $pdocv->exec("INSERT INTO t_formations VALUES (NULL , '$formation' , '$f_formation' , '$date_formation' , '$description_formation' , '$id_formation')");

                header("location: ../admin/formations.php");

                exit();
            }

        }

if (isset($_GET['id_formation'])){
    $eraser = $_GET['id_formation'];
    $sql = "DELETE FROM t_formations WHERE id_formation = '$eraser'";
    $pdocv->query($sql);
    header("location: ../admin/formations.php");
}
?>
<?php require '../admin/navigation.inc/haut.inc.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                <?php
                    $sql = $pdocv->prepare("SELECT * FROM t_formations WHERE utilisateur_id = '1'");
                    $sql->execute();
                    $nbr_formations = $sql->rowCount();
                ?>

                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Formations
                        </h1>
                        <br>
                        <p>Il y a <?php echo $nbr_formations; ?> formations dans la table pour <?php echo $ligne['pseudo']; ?></p>
                        <br>
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

                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Formation</th>
                                        <th>Organisme de Formation</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Modifier</th>
                                        <th>Supprimer</th>
                                    </tr>
                                    <tr>
                                        <?php while ($ligne_formation = $sql->fetch()) { ?>
                                        <td><?php echo $ligne_formation['titre_f']; ?></td>
                                        <td><?php echo $ligne_formation['sous_titre_f']; ?></td>
                                        <td><?php echo $ligne_formation['date_f']; ?></td>
                                        <td><?php echo $ligne_formation['description_f']; ?></td>
                                        <td><a href="modif_formations.php?id_formation=<?php echo
                                        $ligne_formation['id_formation']; ?>">
                                        <i class="glyphicon glyphicon-pencil pull-right"></i></a></td>
                                        <td><a href="formations.php?id_formation=<?php echo
                                        $ligne_formation['id_formation']; ?>">
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

                <form class="form-group" action="formations.php" method="post">
                    <div class="text-center col-md-12">
                        <h1>Ajouter une formation</h1>
                    </div>
                    <div class="form-group">
                        <label for="titre_f">Formation</label>
                        <input required id="titre_f" name="titre_f" type="text" class="form-control" style="width:200px;">
                        <label for="sous_titre_f">Organisme de formation</label>
                        <input required id="sous_titre_f" name="sous_titre_f" type="text" class="form-control" style="width:200px;">
                        <label for="date_f">Date</label>
                        <input required id="date_f" name="date_f" type="date" class="form-control" style="width:200px;">
                        <br>
                        <label for="description_f">Description</label>
                        <br>
                        <textarea class="ckeditor" name="description_f" id="description_f" rows="8" cols="40"></textarea>
                        <input hidden name="id_formation" value="<?php echo
                        $ligne_formation['id_formation']; ?>">

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

    <script> CKEDITOR.replace( 'description_f' ); </script>

</body>

</html>
