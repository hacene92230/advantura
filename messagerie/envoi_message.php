<?php
include"../../include/verif_membres.php";
include"../../include/config.php";
if (isset($_POST['msg_envoi']))
{
?>
<audio src="msg_envoi.mp4" autoplay></audio>
<?php
$_POST['msg_destinataire'] = stripslashes(trim($_POST['msg_destinataire']));
$_POST['titre'] = stripslashes(trim($_POST['titre']));
$_POST['message'] = stripslashes(trim($_POST['message']));
$_POST['envoyeur_de_message'] = stripslashes(trim($_POST['envoyeur_de_message']));
$_POST['date_envoi'] = stripslashes(trim($_POST['date_envoi']));
$msg_destinataire = $_POST['msg_destinataire'];
$titre = $_POST['titre'];
$message = $_POST['message'];
$envoyeur_de_message = $_POST['envoyeur_de_message'];
$date_envoi = $_POST['date_envoi'];
$req = $bdd->prepare("INSERT INTO messagerie (destinataire,titre,message,envoyeur_de_message,date_envoi) VALUES (:msg_destinataire,:titre,:message,:envoyeur_de_message,:date_envoi)");
try
{
$req->execute(array(
'msg_destinataire' => $msg_destinataire,
'titre' => $titre,
'message' => $message,
'envoyeur_de_message' => $envoyeur_de_message,
'date_envoi' => $date_envoi));
?>
<script type="text/javascript">
setTimeout(function() {
  window.location = "messagerie.php";
},1700.800);
</script>
<?php
echo "message envoyer";
die();
}
catch (Exception $ex)
{
die('Erreur lors de l\'envoi de votre message.');
$req->closeCursor();
}}
else
{
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>Envoi d'un message adventura</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<h2>Envoi de message</h2>
<br />
<form action="envoi_messages.php" method="post">
<a href="messagerie.php">Retour à la messagerie.</a>
<br />
<p>Parmis tout les membres de la liste choisissez celui à qui vous voullez envoyer le message.</p>
<select name="msg_destinataire">
<?php
$reponse = $bdd->query('SELECT * FROM perso');
$donnees = $reponse->fetchAll();
foreach($donnees as $donnee) {
  echo '<option value="'.$donnee['pseudo'].'">'.$donnee['pseudo'].'</option>';
}
$reponse->closeCursor();
?>
</select>
<input type="hidden" name="envoyeur_de_message" maxlength="146" required value="<?php echo $result ['pseudo']; ?>"/>
<p>titre du message:</p>
<p><input type="text" name="titre" value=""/></p>
<p>Votre message:</p>
<p><textarea name="message"></textarea>
<input type="hidden" name="date_envoi" maxlength="16" required value="<?php echo date('d/m/Y'); ?>"/>
<br />
<input type="submit" name="msg_envoi" value ="Envoyer mon message.">
</form>
<?php
}
?>