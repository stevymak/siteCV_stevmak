// console.log("wewewe");

$(function() {//verifier que le chargement de la page se faiot correctement
    //on met un écouteur d'évènement, au click sur les balises a pour cela il faut ajouter une class .suppr sur la balise a
$('.suppr').on("click",function(evenement){
    evenement.preventDefault();// cela empeche le comportement par défaut du a
    if(confirm('Voulez vous effacer cette inifo ?')){//on vérifie si l'utilisateur a cliqué, oui ? on fait le contenu du if ; non ? on fait rien
        //console.log('alors ?');
        window.location.href= $(this).attr('href');
        }
    });
});
