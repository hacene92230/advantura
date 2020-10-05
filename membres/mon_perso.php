<h1>information concernant  votre personnage</h1>
<br />
<?php
include_once "../include/verif_membres.php";
echo $result['pseudo'];
echo '<br />chez '.$result['karma'];
echo '<br />'.$result['classe'];
echo '<p><a href = "modif_profil.php">Modifier mon profil</a></p>';