<?php

require_once("config.php");



try {
    
	$stmt = $dbh->prepare("DELETE FROM adresse WHERE idadresse = :idadresse;");

	$stmt->execute();
    
} catch (PDOException $e) {
	print "Erreur !: " . $e->getMessage() . "<br/>";
	die();
}

?>

