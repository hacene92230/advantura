<?php
include_once "../include/verif_membres.php";
if (isset($_POST['ap_modif']))
{
$id = $_POST['ap_modif'];
include_once "../include/config.php";
$mdp = sha1($_POST['mdp']);
$mdp_confirme = $_POST['mdp'];
if($_POST['mdp_confirme'] != $_POST['mdp'])
{
echo "<h3>les 2 mot de passe que vous avez entrez ne sont pas identique</h3>";
}
$req = $bdd->prepare('UPDATE perso SET email = ?, mdp = ? WHERE id = ?');
try
{
$req->execute(array(
$_POST['email'],
sha1($_POST['mdp']),
$_POST['id']));
echo "<h3>la modification s'est correctement effectuer</h3>";
}
    catch (Exception $ex)
	{
	die('<h3>Une erreur est survenu lors de la modification de vos informations.</h3>');
$reponse->closeCursor();
}
}
else
{
?>
<form action="modif_profil.php" method="post">
<input type="hidden" name="id" value="<?php echo $result['id']; ?>"/>
  <p>email</p>
  <input type="text" name="email" value="<?php echo $result['email'];?>"/>
<p>Nouveau mot de passe</p>
<input type="password" name="mdp"/>
<p>Confirmez le nouveau mot de passe</p>
<input type="password" name="mdp_confirme"/>
<p><input type="submit" name="ap_modif" value ="appliquer les modifications"></p>
</form>
<?php
}
?>