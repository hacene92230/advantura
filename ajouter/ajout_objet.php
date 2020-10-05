<?php
include_once "../include/verif_membres.php";
include_once "../include/config.php";
if (isset($_POST['ajout_objet']))
{
    $nom_objet = htmlspecialchars($_POST['nom_objet'], ENT_QUOTES);
    $emplacement_objet = htmlspecialchars($_POST['emplacement_objet'], ENT_QUOTES);
    $categorie_objet = htmlspecialchars($_POST['categorie_objet'], ENT_QUOTES);
    $desc_objet = htmlspecialchars($_POST['desc_objet'], ENT_QUOTES);
       if (empty($nom_objet) || empty($emplacement_objet) || empty($categorie_objet) || empty($desc_objet))
  {
        echo "Erreur lors de l'ajout d'un nouvelle objet, vérifi que tu à bien rempli tout les champs.";
echo '<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>';
}
else {
        $req = $bdd->prepare("INSERT INTO objets (nom_objet,emplacement_objet,categorie_objet,desc_objet) VALUES (:nom_objet,:emplacement_objet	,:categorie_objet,:desc_objet)");
        try {
            $req->execute(array(
                'nom_objet' => $nom_objet,
'emplacement_objet' => $emplacement_objet,               
                'categorie_objet' => $categorie_objet,
                             'desc_objet' => $desc_objet));
echo "Vous avez bien ajouter un nouvelle objet, merci pour votre contribution.";
            echo '<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>';
        } catch (Exception $ex)
		{
            die('Erreur lors de l\'ajout d\'un objet. Erreur : ' . $ex->getMessage());
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
  <title>création d'un nouvelle objet</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>
<br />
<h1>Créer un nouvelle objet</h1>
<br />
<form name="ajout_objet" action="ajout_objet.php" method="POST">
<p>nom de votre objet.</p>
<p>Ne mettez pas d'articles avant celui-ci.</p>
<input type="text" name="nom_objet" value="" /><br />
<br />
<p>veuillez sélectioné parmis les choix ci-dessous l'emplacement de votre objet.</p>
<select name="emplacement_objet">
<option value="tête">tête</option>
<option value="oreille gauche">oreille gauche</option>
<option value="oreille droite">oreille droite</option>
<option value="yeux">yeux</option>
<option value="nez">nez</option>
<option value="cou">cou</option>
<option value="épaule gauche">épaule gauche</option>
<option value="épaule droite">épaule droite</option>
<option value="do
<option value="bras gauche">bras gauche</option>
<option value="bras droit">bras droit</option>
<option value="poignet gauche">poignet gauche</option>
<option value="poignet droit">poignet droit</option>
<option value="main gauche">main gauche</option>
<option value="main droite">main droite</option>
<option value="doigt gauche">doigts gauche</option>
<option value="doigts droit">doigts droit</option>
<option value="jambes">jambes</option>
<option value="pieds">pieds</option>
</select>
<br />
<p>veuillez sélectioné parmis les choix ci-dessous la catégorie de votre objet.</p>
<select name="categorie_objet">
    <option value="arme">arme</option>
    <option value="armure">armure</option>
    <option value="vêtement">vêtement</option>
  <option value="nourriture">nourriture</option>
  <option value="végétaux">végétaux</option>
  <option value="potion">potion</option>
  <option value="conteneure">conteneure</option>
  </select>
<br />
<p>entrez la description  de votre objet.</p>
<p>Veillez à bien précisez  votre description  d'objet, ne la faite pas trop longue non plus., évitez les mots familiers.</p>
<p>Veillez à éviter les fautes d'orthographe bien que sa soit pas facile pour tout le monde.</p>
<textarea name="desc_objet" cols="30" rows="5"></textarea>
<br />
<p>cliquez sur le bouton ci-dessous pour ajouter votre objet.</p>
<input type="submit" name="ajout_objet" value ="j'ajoute mon objet.">
</form>