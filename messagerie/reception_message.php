<?php
include"../../include/verif_membres.php";
include"../../include/config.php";
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>Réception de message adventura</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<h2>Réception de message:</h2>
<p><a href="messagerie.php">retournez à la messagerie<a></p>
<br />
<?php
$req = $bdd->prepare('SELECT * FROM messagerie WHERE destinataire = :pseudo');
$req->bindParam(':pseudo', $result['pseudo']);
$req->execute();
while ($donnees = $req->fetch())
{
?><?php
echo '<h2><a href="affichage_message.php?id_message='.$donnees['id'].'">'.$donnees['titre'].'</a></h2>';
echo 'écris par: ' . $donnees['envoyeur_de_message'] . '<br />';
?>
<br />
<?php
}
?>