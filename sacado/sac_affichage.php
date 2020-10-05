<?php
include_once "../../include/config.php";
include_once "../../include/verif_membres.php";
include "../../include/etat_persos.php";
$verif_sac = $bdd->prepare('SELECT O.nom_objet, O.categorie_objet, PS.id_objet, PS.qtt FROM objets AS O INNER JOIN perso_sac AS PS WHERE O.id_objet = PS.id_objet AND id_perso = :id');
$verif_sac->execute(array('id' => $result['id']));
foreach ($verif_sac as $sac)
{
echo '<br /><p><button>'.$sac['qtt'].' '.$sac['nom_objet'].'</button></p>';
echo '<h3>'.$sac['categorie_objet'].'</h3>';
include "poser_objet.php";
include "equiper_objet.php";
}
?>