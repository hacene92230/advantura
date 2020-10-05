<?php
$verif_objet = $bdd->prepare('SELECT * FROM objet_position AS OP, perso_position AS PP INNER JOIN objets AS O WHERE O.id_objet = OP.id_objet and OP.x = PP.x and OP.y = PP.y');
$verif_objet->execute();
$objet_exist = $verif_objet->rowCount();
if($objet_exist > 0)
{
echo '<br /><h2>objets</h2>';
foreach ($verif_objet as $objet)
{
echo '<br /><a href="../fonctions/objets/prendre_objet.php?id_objet='.$objet['id_objet'].'">'.$objet['nombre'].' '.$objet['nom_objet'].'</a></h1>';
}
}
?>