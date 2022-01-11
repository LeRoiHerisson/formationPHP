<?php

// 1 Créer le fichier html avec le formulaire


// 2 Ã faire avant sur Workbench
// ALTER table produit modify idproduit int AUTO_INCREMENT;

// 3 dans le navigateur lancer http://localhost:8888/eCommercePHP/etat_insert_form.html

require_once("config.php");

try {
	$stmt = $dbh->prepare("INSERT INTO etat (libelle) VALUES (:libelle);");
	$stmt->bindValue(':libelle', $_GET['libelle'], PDO::PARAM_STR);
	$stmt->execute();
} catch (PDOException $e) {
	print "Erreur !: " . $e->getMessage() . "<br/>";
	die();
}

// 4 pour vérifier 
// SELECT* From etat Where name = "libelle";

?>


 