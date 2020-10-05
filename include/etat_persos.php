<?php
$req = $bdd->prepare('SELECT * FROM perso WHERE id =' . $result['id']);
$req->execute();
while($donnees = $req->fetch())
{
echo '<p><h2>vie: '.$donnees['pv'].'/'.$donnees['pv_max'].'</h2></p>';
echo '<p>xp: '.$donnees['xp'].'/'.$donnees['xp_max'].'</p>';
echo '<p>mouvement: '.$donnees['endurance'].'/'.$donnees['endurance_max'].'</p>';
echo '<p>mana: '.$donnees['mana'].'/'.$donnees['mana_max'].'</p>';
//echo '<p>vous avez '.$donnees['argent'].'pièces d\'or sur'.$donnees['argent_dispo'].'pièces d\'or en banque'.'</p>';
}
?>