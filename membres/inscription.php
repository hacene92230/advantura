<?php
include "../include/config.php";
if (isset($_POST['inscription']))
{
$_POST['pseudo'] = stripslashes(trim($_POST['pseudo']));
$_POST['mdp'] = stripslashes(trim($_POST['mdp']));
$_POST['mdp_confirme'] = stripslashes(trim($_POST['mdp_confirme']));
$_POST['classe'] = stripslashes(trim($_POST['classe']));
$_POST['sexe'] = stripslashes(trim($_POST['sexe']));
$_POST['email'] = stripslashes(trim($_POST['email']));
$_POST['karma'] = stripslashes(trim($_POST['karma']));
if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{
$pseudo = $_POST['pseudo'];
$mdp = sha1($_POST['mdp']);
$mdp_confirme = $_POST['mdp'];
$classe = $_POST['classe'];
$sexe = $_POST['sexe'];
$email = $_POST['email'];
$karma = $_POST['karma'];
if($_POST['mdp_confirme'] != $_POST['mdp'])
{
echo "les 2 motdepasse que vous avez entrez ne sont pas identique";
die();
}
$req = $bdd->prepare("INSERT INTO perso (pseudo,mdp,classe,sexe,email,karma) VALUES (:pseudo,:mdp,:classe,:sexe,:email,:karma)");
try
{
	$req->execute(array(
'pseudo' => $pseudo,
'mdp' => $mdp,
'classe' => $classe,
'sexe' => $sexe,
'email' => $email,
'karma' => $karma));
echo 'Votre inscription a bien été prise en compte.';
echo('<br /><a href="../index.php">cliquez ici pour vous conecter</a>');
}
catch (Exception $ex)
{
die('Erreur lors de votre inscription.');
}
$req->closeCursor();
}
}
else
{
?><form action="inscription.php" method="post">
<p><label>Adresse e-mail</p>
<p><input type="email" name="email" maxlength="128" required/> <br /></p>
<p></label></p>
<p><label>Classe de votre personnage:</p>
<select name="classe">
<p><option value="guerrier">guerrier</option></p>
<option value="mage">mage</option>
</select>
</label>
<p><label>Karma de votre personnage:</p>
<select name="karma">
<option value="dragon">dragon</option>
<option value="grifon">grifon</option>
</select>
</label>
<p>label>sexe:</p>
<select name="sexe">
<option value="homme">un homme</option>
<option value="femme">une femme</option>
</select>
</label>
<p><label> Pseudo</p>
<p><input type="text" name="pseudo" maxlength="222" required/> <br /></p>
</label>
<p><label>Mot de passe</p>
<p><input type="password" name="mdp" maxlength="16" required/></p>
</label>
<p><label>confirmez votre mot de passe</p>
<p><input type="password" name="mdp_confirme" maxlength="16" required/></p>
</label>
<input type="submit" name="inscription" value="s'inscrir"/>
</form>
</body>	
</html>
<?php
}
?>