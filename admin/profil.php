<?php require '../connexion/connexion.php'; ?>
<?php require '../admin/navigation.inc/haut.inc.php'; ?>
<?php
    if (isset($_GET['id_utilisateur'])){
        $eraser = $_GET['id_utilisateur'];
        $sql = "DELETE FROM t_utilisateurs WHERE id_utilisateur = '$eraser'";
        $pdocv->query($sql);
        header("location: ../admin/profil.php");
    }

?>

<div id="page-wrapper">

    <?php
    $sql = $pdocv->query("SELECT * FROM t_utilisateurs WHERE id_utilisateur ='1'");
    $ligne_profil = $sql->fetch();
     ?>

    <div class="container-fluid">
        <br><br>
<div class="container-fluid well span6">
	<div class="row-fluid">
        <div class="span2" >
		    <img src="" class="img-circle">
        </div>

        <div class="span8">
            <img src="" alt="">
            <h3><?php echo $ligne['prenom']." ".$ligne['nom']; ?></h3>
            <h6><?php echo $ligne['email']; ?></h6>
            <h6></h6>
            <h6><?php echo $ligne['age']; ?> ans</h6>
            <h6><?php echo $ligne['adresse']." ".$ligne['code_postal'].", ".$ligne['ville'] ; ?></h6>
        </div>

        <button type="submit" class="btn btn-default"><a href="modif_profil.php?id_utilisateur=<?php echo
        $ligne['id_utilisateur']; ?>">Modifier</a></button>

</div>
</div>

    </div>

</div>

<?php require "../admin/navigation.inc/bas.inc.php"; ?>
