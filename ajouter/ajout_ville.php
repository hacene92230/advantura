<?php
include_once "../include/verif_membres.php";
include_once "../include/config.php";
if (isset($_POST['ajout_ville']))
{
    $nom_ville = htmlspecialchars($_POST['nom_ville'], ENT_QUOTES);
       $x = htmlspecialchars($_POST['x'], ENT_QUOTES);
	   $y = htmlspecialchars($_POST['y'], ENT_QUOTES);
	      if (empty($nom_ville) || empty($x) || empty($y))
  {
        echo "Erreur lors de l'ajout d'une nouvelle vile , vérifi que tu à bien rempli tout les champs.";
echo '<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>';
die();
}
else {
        $req = $bdd->prepare("INSERT INTO map_villes (nom_ville,x,y) VALUES (:nom_ville,:x,:y)");
        try {
            $req->execute(array(
                'nom_ville' => $nom_ville,
                                            'x' => $x,
							 'y' => $y));
							 echo "Vous avez bien ajouter une  nouvelle ville, merci pour votre contribution.";
            echo '<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>';
        } catch (Exception $ex)
		{
            die('Erreur lors de l\'ajout d\'une ville. Erreur : ' . $ex->getMessage());
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
  <title>création d'une nouvelle ville</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<p><a href="../accueil_admin.php">revenir au panel admin.</a></p>
<br />
<h1>Créer une nouvelle ville</h1>
<br />
<form name="ajout_ville" action="ajout_ville.php" method="POST">
  <p>ci-dessous veuillez taper le nom de la nouvelle ville.</p>
<p>les villes sont les lieux principales dans les fameuses zones, elles ont des objets précieux, c'est là que le commerce principale s'y déroule.</p>
  <input type="text" name="nom_ville" value="" /><br />
<p>veuillez précisé l'emplacement  x de votre ville.</p>
<p>il est préférable mais pas obligatoire de mettre les villes à l'endroit des zones.</p>
<input type="number" name="x" value="" /><br />
<p>précisez l'emplacement y de la ville.</p>
 <input type="number" name="y" value="" /><br />
<br />
<p>cliquez sur le bouton ci-dessous pour créer  cette nouvelle ville.</p>
<input type="submit" name="ajout_ville" value ="créer la nouvelle ville.">
</form>