<?php

require_once("config.php");

// Ã  faire avant sur workbench
// ALTER table etat modify idetat int AUTO_INCREMENT;


try {
	$stmt = $dbh->prepare("INSERT INTO produit (nom) VALUES (:nom);");
	$stmt->bindValue(':nom', $_GET['nom'], PDO::PARAM_STR);
	$stmt->execute();
    $stmt2 = $dbh->prepare("INSERT INTO produit (prix) VALUES (:prix);");
	$stmt2->bindValue(':prix', $_GET['prix'], PDO::PARAM_STR);
	$stmt2->execute();
} catch (PDOException $e) {
	print "Erreur !: " . $e->getMessage() . "<br/>";
	die();
}
 

// SELECT * FROM etat;

?>