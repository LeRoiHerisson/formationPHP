<?php
//les 3 lignes permettent d'afficher les erreurs sur la page
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$dbh = new PDO('mysql:host=localhost;dbname=eCommercePHP','root','root');

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

?>
<html>
<head>
<title>Insertion de etat dans la base</title>
</head>
<body></body>

</html>