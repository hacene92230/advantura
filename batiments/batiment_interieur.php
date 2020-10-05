<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include"../../include/config.php";
$id_batiment = (isset($_GET['id_batiment'])) ? $_GET['id_batiment'] : -1;
$type = (isset($_GET['type'])) ? $_GET['type'] : -1;
$req = $bdd->prepare('SELECT * FROM map_batiments WHERE id_batiment  = :id_batiment AND type = :type');
$req->bindParam(':id_batiment', $id_batiment, PDO::PARAM_INT);
$req->bindParam(':type', $type, PDO::PARAM_STR);
$req->execute();
$interieur = $req->fetch();
  echo '<p><h2>'.$interieur['nom_batiment'].'</h2></p><br />';
  echo $interieur['desc_batiment'];

?>