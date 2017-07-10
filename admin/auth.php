<?php require '../connexion/connexion.php'; ?>

<?php

if(isset($_GET['action']) && $_GET['action'] == "deconnexion") // si l'internaute demande une deconnexion
{
	session_destroy();// supprime la session

    header('location: auth.php');
}

?>

<?php

/*
Page: auth.php
*/
session_start(); // à mettre tout en haut du fichier .php, cette fonction propre à PHP servira à maintenir la $_SESSION

$msg_authentification_erreur='';

if(isset($_POST['connexion'])) {

    $pseudo = addslashes($_POST['pseudo']);
    $mdp = addslashes($_POST['mdp']);

    $sql = $pdocv->prepare("SELECT * FROM t_utilisateurs WHERE pseudo='$pseudo' AND mdp='$mdp' ");
    $sql->execute();
    $nbr_utilisateur = $sql->rowCount();

    if($nbr_utilisateur == 0){
        $msg_authentification_erreur="Erreur d'authentification !";
    }else{
        $ligne_utilisateur = $sql->fetch();

        $_SESSION['connexion']='connecté';
        $_SESSION['id_utilisateur']=$ligne_utilisateur['id_utilisateur'];
        $_SESSION['prenom']=$ligne_utilisateur['prenom'];
        $_SESSION['nom']=$ligne_utilisateur['nom'];

        header('location: index.php');

    }
}
?>
<!--
Les balises <form> sert à dire que c'est un formulaire
on lui demande de faire fonctionner la page connexion.php une fois le bouton "Connexion" cliqué
on lui dit également que c'est un formulaire de type "POST"
 
Les balises <input> sont les champs de formulaire
type="text" sera du texte
type="password" sera des petits points noir (texte caché)
type="submit" sera un bouton pour valider le formulaire
name="nom de l'input" sert à le reconnaitre une fois le bouton submit cliqué, pour le code PHP
 -->
<div class="col-sm-4">
    <div class="panel panel-yellow">
        <div class="panel-heading">
            <h3 class="panel-title">Connexion</h3>
        </div>
        <div class="panel-body">
            <form class="form-control" action="auth.php" method="post">
                Pseudo: <input style="margin-left:40px;" type="text" name="pseudo" value="" required="" />

            <br>
            <br>

                Mdp: <input style="margin-left:56px;" type="password" name="mdp" value="" required=""/>

            <br>
            <br>
                 
                <input class="btn" type="submit" name="connexion" value="Connexion" />
            </form>
        </div>
    </div>
</div>
