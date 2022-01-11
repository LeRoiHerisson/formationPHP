<?php

require_once("config.php");

// Ã  faire avant sur workbench
// ALTER table etat modify idetat int AUTO_INCREMENT;


try {
    $ville=$_POST["ville"];
    $pays=$_POST["pays"];
    $adresse=$_POST["adresse"];
	$stmt = $dbh->prepare("INSERT INTO adresse (ville,pays,adresse) VALUES ('$ville', '$pays','$adresse');");
	//$stmt->bindParam(":nom",$_GET["nom"]);
    //$stmt->bindParam(":prix",$_GET["prix"]);
	$stmt->execute();
    
} catch (PDOException $e) {
	print "Erreur !: " . $e->getMessage() . "<br/>";
	die();
}
 

// SELECT * FROM etat;

?>