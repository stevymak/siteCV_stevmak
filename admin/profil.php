<?php require '../connexion/connexion.php'; ?>
<?php require '../admin/navigation.inc/haut.inc.php'; ?>

<div id="page-wrapper">

    <?php
    $sql = $pdocv->query("SELECT * FROM t_utilisateurs WHERE id_utilisateur ='1'");
    $ligne_profil = $sql->fetch();
     ?>

    <div class="container-fluid">

        <div class="row">
            <h1><?php echo $ligne_profil['prenom']. ' ' .$ligne_profil['nom']; ?></h1>
        </div>
        <br>
        <div class="row">
            <?php
            $sql = $pdocv->query("SELECT * FROM t_titres_cv WHERE utilisateur_id = '1'");
            $ligne_accroche = $sql->fetch();
            ?>
            <p><strong>Intitulé du Poste</strong></p>
            <p><?php echo $ligne_accroche['accroche']. ' ' . $ligne_accroche['titre_cv']; ?></p>
        </div>
        <div class="row">
            <?php
            $sql = $pdocv->query("SELECT * FROM t_utilisateurs WHERE utilisateur_id = '1'");
            $ligne_email = $sql->fetch();
            ?>
            <p><strong>Mail</strong></p>
            <p><?php echo $ligne_email['email']; ?></p>
        </div>

    </div>

</div>
