<?php
$verif_zone = $bdd->prepare('SELECT * FROM map_zone WHERE :x >= debut_x AND :x <= fin_x AND :y >= debut_y AND :y <= fin_y');
 $verif_zone->execute([':x' => $result['x'], ':y' => $result['y']]);
$position = $verif_zone->fetch();
echo "<h1>vous êtes en ".$position['nom_zone'].'</h2>';
?>