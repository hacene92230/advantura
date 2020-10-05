<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>Message adventura</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<h2>affichage du message</h2>
<?php
include"../../include/config.php";
include"../../include/verif_membres.php";
$id_message = (isset($_GET['id_message'])) ? $_GET['id_message'] : -1;
$req = $bdd->prepare('SELECT * FROM messagerie WHERE id = :id');
$req->bindParam(':id', $id_message, PDO::PARAM_INT);
$req->execute();
$message = $req->fetch();
$id_message = (isset($_GET['id_message'])) ? $_GET['id_message'] : -1;
$req = $bdd->prepare('SELECT * FROM messagerie WHERE id = :id');
$req->bindParam(':id', $id_message, PDO::PARAM_INT);
$req->execute();
$message = $req->fetch();
echo "Message reçu le " .$message['date_envoi'].'<br />';
echo "Message envoyé par: " .$message['envoyeur_de_message'].'<br /><br />';
echo "sujet : " .$message['titre'].'<br />';
echo "contenu du message: " .$message['message'];
?>
<br />