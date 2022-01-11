<?php

require_once("config.php");

// Ã  faire avant 
$stmt = $dbh->prepare("ALTER table etat modify idetat int AUTO_INCREMENT;");
$stmt->execute();

try {
	$stmt = $dbh->prepare("INSERT INTO etat (libelle) VALUES (:libelle);");
	$stmt->bindValue(':libelle', $_GET['libelle'], PDO::PARAM_STR);
	$stmt->execute();
} catch (PDOException $e) {
	print "Erreur !: " . $e->getMessage() . "<br/>";
	die();
}
?>