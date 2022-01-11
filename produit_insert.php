<?php

require_once("config.php");

// Ã  faire avant sur workbench
// ALTER table etat modify idetat int AUTO_INCREMENT;


try {
	$stmt = $dbh->prepare("INSERT INTO produit (nom,prix) VALUES (:nom, :prix);");
	$stmt->bindParam(":nom",$_GET["nom"]);
    $stmt->bindParam(":prix",$_GET["prix"]);
	$stmt->execute();
    
} catch (PDOException $e) {
	print "Erreur !: " . $e->getMessage() . "<br/>";
	die();
}
 

// SELECT * FROM etat;

?>