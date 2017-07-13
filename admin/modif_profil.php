<?php require '../connexion/connexion.php'; ?>
<?php require '../admin/navigation.inc/haut.inc.php'; ?>
<?php

        if (isset($_POST['prenom']) && $_POST['mdp'] == $_POST['mdp2']) {
                $nom = addslashes($_POST['nom']);
                $prenom = addslashes($_POST['prenom']);
                $email = addslashes($_POST['email']);
                $pseudo = addslashes($_POST['pseudo']);
                $telephone = addslashes($_POST['telephone']);
                $mdp = addslashes($_POST['mdp']);
                $id_utilisateur = $_POST['id_utilisateur'];

                $pdocv->exec("UPDATE t_utilisateurs SET nom = '$nom', prenom = '$prenom', email = '$email', pseudo = '$pseudo', telephone = '$telpehone', mdp = '$mdp'  WHERE id_utilisateur = '$id_utilisateur'");

                header("location: ../admin/profil.php");

                exit();
            }
            else {
                echo "<div class='alert-danger'>Erreur dans le formulaire</div>";
            }



        $id_utilisateur = $_GET['id_utilisateur'];
        $sql = $pdocv->query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur'");
        $ligne_utilisateur = $sql->fetch();

?>
<div id="page-wrapper">

    <?php
    $sql = $pdocv->query("SELECT * FROM t_utilisateurs WHERE id_utilisateur ='1'");
    $ligne_profil = $sql->fetch();
     ?>

    <div class="container-fluid">
        <br><br>
<div class="container-fluid well span6">
    <div class="container" style="padding-top: 60px;">
  <h1 class="text-center page-header">Modifier profil</h1>
  <div class="row">

    <!-- edit form column -->
    <div class="col-md-offset-2 col-md-8 col-sm-6 col-xs-12 personal-info">

      <h3 class="text-center">Infos</h3>
      <br>
      <form class="form-horizontal" role="form">
        <div class="form-group">
          <label class="col-lg-3 control-label">Nom:</label>
          <div class="col-lg-8">
            <input class="form-control" id="nom" name="nom" value="<?php echo $ligne['nom']; ?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Prénom:</label>
          <div class="col-lg-8">
            <input class="form-control" id="prenom" name="prenom" value="<?php echo $ligne['prenom']; ?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" id="email" name="email" value="<?php echo $ligne['email']; ?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Pseudo:</label>
          <div class="col-md-8">
            <input class="form-control" id="pseudo" name="pseudo" value="<?php echo $ligne['pseudo']; ?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Numéro de Téléphone:</label>
          <div class="col-md-8">
            <input class="form-control" id="telephone" name="telephone" value="<?php echo $ligne['telephone']; ?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Mot de Passe:</label>
          <div class="col-md-8">
            <input class="form-control" id="mdp" name="mdp" value="<?php echo $ligne['mdp']; ?>" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Confirmer Mot de Passe:</label>
          <div class="col-md-8">
            <input class="form-control" id="mdp2" name="mdp2" value="" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Sauvegarder changement" type="submit">
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>

    </div>

</div>

<?php require "../admin/navigation.inc/bas.inc.php"; ?>
