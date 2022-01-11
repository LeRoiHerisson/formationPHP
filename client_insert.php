<?php

require_once("config.php");

// Ã  faire avant sur workbench
// ALTER table etat modify idetat int AUTO_INCREMENT;


try {
    $nom=$_POST["nom"];
    $email=$_POST["email"];
    $telephone=$_POST["telephone"];
	$stmt = $dbh->prepare("INSERT INTO client (nom,email,telephone) VALUES ('$nom', '$email','$telephone');");
	//$stmt->bindParam(":nom",$_GET["nom"]);
    //$stmt->bindParam(":prix",$_GET["prix"]);
	$stmt->execute();
    
} catch (PDOException $e) {
	print "Erreur !: " . $e->getMessage() . "<br/>";
	die();
}
 

// SELECT * FROM etat;

?>