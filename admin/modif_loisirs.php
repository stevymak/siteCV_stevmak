<?php require '../connexion/connexion.php'; ?>
<?php

    if (isset($_POST['loisir'])) {
            $loisir = addslashes($_POST['loisir']);
            $id_loisir = $_POST['id_loisir'];

            $pdocv->exec("UPDATE t_loisirs SET loisir = '$loisir' WHERE id_loisir = '$id_loisir'");

            header('location: ../admin/loisirs.php');

            exit();
    }
    $id_loisir = $_GET['id_loisir'];
    $sql = $pdocv->query("SELECT * FROM t_loisirs WHERE id_loisir = '$id_loisir'");
    $ligne_loisir = $sql->fetch();

?>
<?php require '../admin/navigation.inc/haut.inc.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <br>
                <br>

            <div class="row">

                <form class="form-group" action="" method="post">
                    <div class="text-center col-md-12">
                        <h1>Modifier un loisir</h1>
                    </div>
                    <div class="form-group">
                        <label>Loisirs</label>
                        <input required id="loisir" name="loisir" type="text" class="form-control" style="width:200px;" value="<?php
                        echo $ligne_loisir['loisir']; ?>">
                        <input hidden name="id_loisir" value="<?php echo
                        $ligne_loisir['id_loisir']; ?>">
                        <p class="help-block">Exemple : Football, Basketball...</p>
                    </div>
                    <button type="submit" class="btn btn-default">Modifier</button>
                </form>
            </div>

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>

<?php require "../admin/navigation.inc/bas.inc.php"; ?>
