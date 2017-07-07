<?php require '../connexion/connexion.php'; ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Test connexion</title>
        <link rel="stylesheet" href="/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    </head>
    <body>
        <?php
        $sql = $pdocv->query("SELECT * FROM t_utilisateurs WHERE id_utilisateur ='1'");
        $ligne = $sql->fetch();
         ?>
        <p>Coucou ! <?php echo $ligne['prenom'].' '.$ligne['nom'] ; ?></p>
    </body>
</html>
