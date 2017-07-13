<?php require '../connexion/connexion.php'; ?>
<?php

        if(isset($_POST['titre_e'])) {
                $titre_e = addslashes($_POST['titre_e']);
                $sous_titre_e = addslashes($_POST['sous_titre_e']);
                $dates_e = addslashes($_POST['dates_e']);
                $description_e = addslashes($_POST['description_e']);
                $id_experience = $_POST['id_experience'];

                $pdocv->exec("UPDATE t_experiences SET titre_e = '$titre_e', sous_titre_e = '$sous_titre_e', dates_e = '$dates_e', description_e = '$description_e' WHERE id_experience = '$id_experience'");

                header("location: ../admin/experiences.php");

                exit();
            }
            $id_experience = $_GET['id_experience'];
            $sql = $pdocv->query("SELECT * FROM t_experiences WHERE id_experience = '$id_experience'");
            $ligne_experience = $sql->fetch();

?>
<?php require '../admin/navigation.inc/haut.inc.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Experiences
                        </h1>
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

                <br>
                <br>

                <div class="row">
                    <form class="form-group" action="" method="post">
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
                            <label for="dates_e">Date</label>
                            <input id="dates_e" type="date" name="dates_e" class="form-control" style="width:200px;" value="<?php
                            echo $ligne_experience['dates_e']; ?>">
                            <br>
                            <label for="description_e">Description</label>
                            <br>
                            <textarea id="description_e" type="text" name="description_e" class="form-control" rows="8" cols="40" value="<?php
                            echo $ligne_experience['description_e']; ?>"></textarea>
                            <input hidden name="id_experience" value="<?php echo
                            $ligne_experience['id_experience']; ?>">
                        </div>
                        <input type="submit" value="Mettre à jour" class="btn btn-primary btn-lg" style="margin-top:10px;">
                    </form>
                </div>

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>

<?php require "../admin/navigation.inc/bas.inc.php"; ?>
