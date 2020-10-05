<?php
include"config.php";
	if(isset($_GET['id_news']) AND !empty($_GET['id_news'])) {
   $get_id_news = htmlspecialchars($_GET['id_news']);
   $news = $bdd->prepare('SELECT * FROM news WHERE id_news = ?');
   $news->execute(array($get_id_news));
   if($news->rowCount() == 1) {
      $news = $news->fetch();
      $titre_news = $news['titre_news'];
      $contenu = $news['texte_news'];
   } else {
      echo 'Cette news n\'existe pas !';
echo '<p><a href = "../index.php">retournez à l\'accueil. </a></p>';
   }
} else {
   die('Erreur');
echo '<p><a href = "../index.php">retournez à l\'accueil. </a></p>';
}
?><!DOCTYPE html>
<html>
<head>
<title>Accueil</title>
<metacharset="utf-8">
</head>
<body>
<h1><?= $titre_news?></h1>
<p><?= $contenu?></p>
<p><a href = "../index.php">retournez à l'accueil.</a></p>
</body>
</html>