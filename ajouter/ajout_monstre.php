<?php
include_once "../include/verif_membres.php";
include_once "../include/config.php";
if (isset($_POST['ajout_monstre']))
{
    $nom_monstre = htmlspecialchars($_POST['nom_monstre'], ENT_QUOTES);
    $att_min = htmlspecialchars($_POST['att_min'], ENT_QUOTES);
    $att_max = htmlspecialchars($_POST['att_max'], ENT_QUOTES);
$pv_monstre = htmlspecialchars($_POST['pv_monstre'], ENT_QUOTES);
	  $gain_xp = htmlspecialchars($_POST['gain_xp'], ENT_QUOTES);
		   if (empty($nom_monstre) || empty($att_min) || empty($att_max) || empty($pv_monstre) || empty($gain_xp))
  {
        echo "Erreur lors de l'ajout d'un nouveau monstre, vérifi que tu à bien rempli tout les champs.";
echo '<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>';
die();
}
else
{
$req = $bdd->prepare("INSERT INTO monstres (nom_monstre,att_min,att_max,pv_monstre,gain_xp) VALUES (:nom_monstre,:att_min,:att_max,:pv_monstre,:gain_xp)");
        try {
            $req->execute(array(
                'nom_monstre' => $nom_monstre,
                'att_min' => $att_min,
                             'att_max' => $att_max,
'pv_monstre' => $pv_monstre,
'gain_xp' => $gain_xp));
echo "Vous avez bien ajouter un nouveau monstre, merci pour votre contribution.";
            echo '<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>';
        } catch (Exception $ex)
		{
            die('Erreur lors de l\'ajout d\'un monstre. Erreur : ' . $ex->getMessage());
            echo '<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>';
            $req->closeCursor();
        }
        exit();
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>création d'un nouveau monstre</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>
<br />
<h1>Créer un nouveau monstre</h1>
<br />
<form name="form_ajout" action="ajout_monstre.php" method="POST">
<p>nom du monstre.</p>
<input type="text" name="nom_monstre" value="" /><br />
<p>Préciser le coup minimum infligé par le monstre, les dégats varirons entre l'attaque minimum et l'attaque maximum.</p>
<input type="text" name="att_min" value="" /><br />
<p>Ici, préciser l'attaque maximum, c'est le coup maximum qque pourra infligé votre monstre.</p>
<input type="text" name="att_max" value="" /><br />
<p>Points de vie de votre monstre.</p>
<input type="text" name="pv_monstre" value="" /><br />
<p>précisez l'xp gagner par le joueur en tuant ce monstre.</p>
<p>petit conseil, ne mettez pas une valeur trop grande, pour ne pas trop facilité la montée de niveau rapide.</p>
<input type="text" name="gain_xp" value="" /><br />
<br />
<p>cliquez sur le bouton ci-dessous pour ajouter ce monstre.</p>
<input type="submit" name="ajout_monstre" value ="Ajouter ce monstre.">
</form>