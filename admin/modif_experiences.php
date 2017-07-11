<?php require '../connexion/connexion.php'; ?>
<?php

if (isset($_POST['titre_e'])) {
    if($_POST['titre_e']!=''){
        $experience = addslashes($_POST['titre_e']);
        $e_experience = addslashes($_POST['sous_titre_e']);
        $dates_experiences = addslashes($_POST['dates_e']);
        $description_experiences = addslashes($_POST['description_e']);
        $id_experience = $_POST['id_experience'];

        $pdocv->exec('UPDATE t_experiences SET titre_e="'.$_POST['titre_e'].'", sous_titre_e="'.$_POST['sous_titre_e'].'", dates_e="'.$_POST['dates_e'].'", description_e="'.$_POST['description_e'].'", id_experience="'.$_POST['id_experience']);
        // header("locaton: ../admin/experiences.php");
        // exit();
    }

}

$id_experience = $_GET['id_experience'];
$sql = $pdocv->query("SELECT * FROM t_experiences WHERE id_experience = '$id_experience'");
$ligne_experience = $sql->fetch();

?>
<?php require '../admin/navigation.inc/haut.inc.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">


                <br>
                <br>

                <div class="row">
                    <form class="form-group" action="experiences.php" method="post">
                        <div class="text-center col-md-12">
                        <h1>Formulaire de mise à jour de l'experience</h1>
                    </div>
                        <div class="form-group">
                            <label for="experience">Poste</label>
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
                            <input id="description_e" type="text" name="description_e" class="form-control" rows="8" cols="40" value="<?php
                            echo $ligne_experience['description_e']; ?>">
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
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>


</body>

</html>
