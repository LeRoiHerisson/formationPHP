<?php
include_once("config.php");

$stmt = $dbh->prepare("SELECT * 
					FROM commande 
					INNER JOIN etat ON etat.idetat=commande.idetat 
					LIMIT 25");

$stmt->execute();

?>
<html>
<head>
  <title>Commandes</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
</head>
<body>

	Liste produits commandÃ©s
	<table>
	    <thead>
	        <tr>
	            <th>idcommande</th>
	            <th>Date</th>
	            <th>Etat</th>
	            <th>Nb produits</th>
	            <th>DÃ©tail</th>
	        </tr>
	    </thead>
	    <tbody>
<?php
	foreach ($stmt->fetchAll() as $row) {
		$stmt2 = $dbh->prepare("SELECT count(*) as nb FROM produit_commande WHERE idcommande = :idcommande");
		$stmt2->bindParam(':idcommande', $row['idcommande']);
		$stmt2->execute();
		echo "<tr>";
		echo "<td>";
		echo $row['idcommande'];
		echo "</td>";
		echo "<td>";
		echo $row['date'];
		echo "</td>";
		echo "<td>";
		echo utf8_encode($row['libelle']);
		echo "</td>";
		echo "<td>";
		// echo "nb prdt";
		print_r($stmt2->fetchAll()[0]['nb']);
		echo "</td>";
		echo "<td>";
		echo "<a href='commande.php?idcommande=".$row['idcommande']."'>";
		echo "dÃ©tail";
		echo "</a>";
		echo "</td>";
		echo "</tr>";
	}
?>
	    </tbody>
	</table>
</body>
</html>