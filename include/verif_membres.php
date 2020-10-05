<?php
include_once"config.php";
$req = $bdd->prepare("SELECT * FROM perso WHERE pseudo=:membre");
$req->execute(array('membre' => $_SESSION['membre']));
$result = $req->fetchAll();
$req->closeCursor();
if (count($result) == 0) 
{
echo '<script>alert("Une erreur s\'est produite.");</script>';
echo '<p><p><a href = "../../index.php">retournez à l\'accueil.</a></p>';
die();
}
if ($_SESSION["membre"]) {
$result = $result[0];
$grade = intval($result['grade']);
}
?>