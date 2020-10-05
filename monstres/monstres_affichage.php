<?php
$verif_monstre = $bdd->prepare('SELECT * FROM monstre_combat AS MC, monstres AS M WHERE MC.id_monstre = M.id_monstre and MC.x = :x and MC.y = :y');
$verif_monstre->execute(array('x' => $result['x'], 'y' => $result['y']));
$monstre_exist = $verif_monstre->rowCount();
if($monstre_exist >0)
{
echo '<br /><h2>monstres</h2><br />';
while ($monstre = $verif_monstre->fetch())
{
echo '<a href="../monstres/monstre_combat.php?id_monstre='.$monstre['id_monstre'].'&amp;id_combat='.$monstre['id_combat'].'">'.' '.$monstre['nom_monstre'].'</a><br />';
echo '<p>Il lui reste '.$monstre['rest_pv_monstre'].'points de vie</p>';
}
}
?>