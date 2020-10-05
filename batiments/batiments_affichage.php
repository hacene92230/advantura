<?php
$verif_batiments = $bdd->prepare('SELECT * FROM map_batiments INNER JOIN map_lieux WHERE map_batiments.nom_lieu = map_lieux.nom_lieu');
$verif_batiments->execute();
if(!isset($lieu))
{
}
	else
{
echo '<br /><br /><h2>bâtiments</h2>';
foreach ($verif_batiments as $batiment)
{
echo '<br /><a href="../fonctions/batiments/batiment_interieur.php?id_batiment='.$batiment['id_batiment'].'&amp;type='.$batiment['type'].'">'.$batiment['nom_batiment'].'</a></h1>';
}
}
?>