<?php
//les 3 lignes permettent d'afficher les erreurs sur la page
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$dbh = new PDO('mysql:host=localhost;dbname=eCommercePHP','root','root');

$stmt = $dbh->prepare("ALTER table etat modify idetat int AUTO_INCREMENT;");
$stmt->execute();

// lancement de la requete
$stmt = $dbh->prepare("INSERT INTO etat (libelle) VALUES (:libelle);");
	$stmt->bindValue(':libelle', $_GET['libelle'], PDO::PARAM_STR);
	
    $stmt->execute();
//} catch (PDOException $e) {
//	print "Erreur !: " . $e->getMessage() . "<br/>";
//	die();
//}

$stmt->execute();

// format this into html
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