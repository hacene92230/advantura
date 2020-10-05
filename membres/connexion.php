<?php
if (isset($_POST['pseudo']) && isset($_POST['mdp']))
{
include_once "../include/config.php";
$pseudo         = $_POST["pseudo"];
	$mdp = sha1($_POST["mdp"]);
	$req = $bdd->prepare("SELECT * FROM perso WHERE pseudo = :pseudo AND mdp = :mdp");
	$req->execute(array('pseudo' => $pseudo, 'mdp' => $mdp));
	$result = $req->fetchAll();
	$req->closeCursor();
	if (count($result) == 1) {
$_SESSION["membre"] = TRUE;
$_SESSION["membre"] = $pseudo;
header("Location: accueil_membres.php");
die();
	}
	else {
$_SESSION["membre"] = FALSE;
header("Location: probleme.php");
die();
	}
}
else
{ ?>
<h2>connexion</h2>
<br />
<p>Veuillez saisir ci-dessous les identifiants que vous avez configuré lors de votre inscription.</p>
<form action="membres/connexion.php" method="post">
	<label for="pseudo">Pseudo :</label>
	<br />
	<input type="text" id="pseudo" name="pseudo" maxlength="32" required />
	<br />
	<label for="mdp">Mot de passe :</label>
	<br />
	<input type="password" id="mdp" name="mdp" maxlength="16" required />
	<br />
<input type="checkbox" name="souvenir" />Se souvenir de moi
<br />
	<input type="submit" value="Se connecté."/>
<br />
<br />
<p><a href = "">J'ai oublié mon mot de passe.</a></p>
</form>
<?php
  if (!empty($req)) {
      $req->closeCursor ();
  }
}
?>