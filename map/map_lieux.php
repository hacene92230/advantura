<?php
$verif_lieux = $bdd->prepare('SELECT * FROM map_villes WHERE :x = x AND :y = y');
 $verif_lieux->execute([':x' => $result['x'], ':y' => $result['y']]);
 foreach ($verif_lieux as $lieu)
{
echo '<br />dans la vil de '.$lieu['nom_lieu'];
}
?>