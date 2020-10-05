<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>adventura</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<?php
include_once "../include/verif_membres.php";
include_once "../map/map_affichage.php";
include "../include/etat_persos.php";
include"../monstres/monstres_affichage.php";
//include "../batiments/batiments_affichage.php";
include"../objets/objets_affichage.php";
include "../include/menu_perso.html";
if($result['grade'] == 1)
{
    echo '<p><a href = "../accueil_admin.php">panel admin.</a></p>';
}
?>
</body>
</html>