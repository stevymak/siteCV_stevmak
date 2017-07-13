<?php require '../connexion/connexion.php'; ?>
<?php
/* ***************** LOISIRS ********************************* */

        if (isset($_POST['loisir'])) {
            if($_POST['loisir']!=''){
                $loisir = addslashes($_POST['loisir']);

                $pdocv->exec("INSERT INTO t_loisirs VALUES (NULL, '$loisir' , '1')");
                header("location: ../admin/loisirs.php");
                exit();
            }
        }

if (isset($_GET['id_loisir'])){
    $eraser = $_GET['id_loisir'];
    $sql = "DELETE FROM t_loisirs WHERE id_loisir = '$eraser'";
    $pdocv->query($sql);
    header("location: ../admin/loisirs.php");
}
?>
<?php require '../admin/navigation.inc/haut.inc.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                <?php
                    $sql = $pdocv->prepare("SELECT * FROM t_loisirs WHERE utilisateur_id = '1'");
                    $sql->execute();
                    $nbr_loisir = $sql->rowCount();
                ?>

                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Loisirs
                        </h1>
                        <br>
                        <p>Il y a <?php echo $nbr_loisir; ?> loisirs dans la table pour <?php echo $ligne['pseudo']; ?></p>
                        <br>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php"> Tableau de Bord </a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Loisirs
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
                                        <th>Loisirs</th>
                                        <th>Modifier</th>
                                        <th>Supprimer</th>
                                    </tr>
                                    <tr>
                                        <?php while ($ligne_loisir = $sql->fetch()) { ?>
                                        <td><?php echo $ligne_loisir['loisir']; ?></td>
                                        <td><a href="modif_loisirs.php?id_loisir=<?php echo
                                        $ligne_loisir['id_loisir']; ?>"><i class="glyphicon glyphicon-pencil pull-right"></i></a></td>
                                        <td><a href="loisirs.php?id_loisir=<?php echo
                                        $ligne_loisir['id_loisir']; ?>">
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

                <form class="form-group" action="loisirs.php" method="post">
                    <div class="text-center col-md-12">
                        <h1>Insertion d'un loisir</h1>
                    </div>
                    <div class="form-group">
                        <label>Loisirs</label>
                        <input required id="loisir" name="loisir" type="text" class="form-control" style="width:200px;">
                    </div>
                    <button type="submit" class="btn btn-default">Ajouter</button>
                </form>
            </div>

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>

<?php require "../admin/navigation.inc/bas.inc.php"; ?>
