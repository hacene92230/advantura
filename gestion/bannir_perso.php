<?php
include"../include/config.php";
include"../include/verif_membres.php";
if (isset($_POST['bannir']))
{
$verif_bannissement = $bdd->prepare('SELECT * from perso_bannissement, perso where id_perso = :id');
$verif_bannissement->execute(array('id' => $_POST['perso']));
while ($bannissement = $verif_bannissement->fetch())
{
if($bannissement['id_perso'] = $_POST['perso'])
{
echo "ce personnage est déjà banni.";
echo '<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>';
die();
}
}
$req = $bdd->prepare("INSERT INTO perso_bannissement (id_perso,raison_ban) VALUES (:id_perso,:raison_ban)");
        try {
            $req->execute(array(
                'id_perso' => $_POST['perso'],
                             'raison_ban' => $_POST['raison_ban']));
echo 'Ce personnage vient d\'être banni';
echo '<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>';
die();
        } catch (Exception $ex)
		{
echo "erreur lors du banissement de ce personnage";
            echo '<p><a href = "../accueil_admin.php">retournez au panel admin. </a></p>';
die();
            $req->closeCursor();
}
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="ISO-8859-15">
  <title>Bannir un personnage adventura</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<a href="../accueil_admin.php">Revenir au panel admin.</a>
<h2>Bannir un personnage</h2>
<form action="bannir_perso.php" method="post">
<p>Rien de plus simple pour bannir un personnage.</p>
<p>Choisis le personnage à bannir puis clique sur bannir ce personnage.</p>
<p>Ensuite tu arrivera dans une nouvelle page, et précise les raisons qui te conduise à bannir ce personnage ensuite clique sur appliquer le mbannissement.</p>
<select name="perso">
<?php
$reponse = $bdd->prepare('SELECT * FROM perso');
$reponse->execute();
while ($donnees = $reponse->fetch())
{
echo '<option value="'.$donnees['id'].'">'.$donnees['pseudo'].'</option>';
}
$reponse->closeCursor();
?>
</select>
<br />
<p>Raison qui vous pousse à bannir ce personnage.</p>
<textarea name="raison_ban"></textarea>
<br />
<input type="submit" name="bannir" value ="Bannir ce personnage.">
</form>
</body>