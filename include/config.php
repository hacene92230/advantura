<?php
ob_start();
	session_start();
	$BD_serveur     = "localhost";
    $BD_utilisateur = "hacene";
    $BD_motDePasse  = "albatros92I";
    $BD_base        = "rpg";
    try {
		$bdd = new PDO('mysql:host=' . $BD_serveur . ';dbname=' . $BD_base, $BD_utilisateur, $BD_motDePasse, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $bdd->exec("SET CHARACTER SET utf8");
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	catch (Exception $ex) {
		die('Impossible de se connecter à la base de données.');
	}
ob_end_clean();
	?>