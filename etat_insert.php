<?php
//les 3 lignes permettent d'afficher les erreurs sur la page
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$dbh = new PDO('mysql:host=localhost;dbname=eCommercePHP','root','root');

// pull all the clients limit to 25

$stmt=$dbh->prepare("SELECT * FROM etats
-- WHERE idclient = :idclient");

$stmt->bindParam(':idetat', $_GET['idetat']);
//pull php code

$stmt->execute();

// format this into html

?>
<html>
<head>
<title>Insertion de etat dans la base</title>
</head>
<body></body>

// lancement de la requete
// $sql = 'INSERT INTO etat (libelle) VALUES (:libelle);"


</html>