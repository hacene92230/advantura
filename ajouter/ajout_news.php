<?php
include_once "../include/verif_membres.php";
include_once "../include/config.php";
if (isset($_POST['ajout_news']))
{
$titre_news = htmlspecialchars($_POST['titre_news'], ENT_QUOTES);
$texte_news = htmlspecialchars($_POST['texte_news'], ENT_QUOTES);
if (empty($titre_news) || empty($texte_news))
  {
echo "Erreur lors de l'ajout d'une nouvelle news, vérifi que tu à bien rempli tout les champs.";
echo '<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>';
die();
}
else
{
        $req = $bdd->prepare("INSERT INTO news (date_news,titre_news,texte_news) VALUES (NOW(),:titre_news,:texte_news)");
        try {
            $req->execute(array(
                'titre_news' => $titre_news,
                             'texte_news' => $texte_news));
echo "Vous avez bien ajouter une nouvelle news, merci pour votre contribution.";
            echo '<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>';
        } catch (Exception $ex)
		{
            die('Erreur lors de l\'ajout d\'une news. Erreur : ' . $ex->getMessage());
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
  <title>création d'une news</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>
<br />
<h1>Créer une nouvelle news</h1>
<br />
<form name="ajout_news" action="ajout_news.php" method="POST">
<br />
<p>titre de votre news.</p>
  <input type="text" name="titre_news" value="" /><br />
<br />
<p>texte de votre news:</p>
<textarea name="texte_news" cols="30" rows="5"></textarea>
<br />
<p>cliquez sur le bouton ci-dessous pour ajouter votre objet.</p>
<input type="submit" name="ajout_news" value ="j'ajoute ma news.">
</form>