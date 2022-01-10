<?php
include_once("config.php");

if(isset($_GET['idcommande']) == null){
	header("Location: commandes.php");
}

$stmt = $dbh->prepare("SELECT produit.* FROM commande 
											INNER JOIN produit_commande ON produit_commande.idcommande = commande.idcommande 
											INNER JOIN produit ON produit.idproduit = produit_commande.idproduit 
											WHERE commande.idcommande = :idcommande");
$stmt->bindParam(':idcommande', $_GET['idcommande']);
$stmt->execute();


?>
<html>
<head>
  <title>Commande</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$stmt2 = $dbh->prepare("SELECT sum(produit.prix) as somme FROM commande 
											INNER JOIN produit_commande ON produit_commande.idcommande = commande.idcommande
											INNER JOIN produit ON produit.idproduit = produit_commande.idproduit 
											WHERE commande.idcommande = :idcommande");
$stmt2->bindParam(':idcommande', $_GET['idcommande']);
$stmt2->execute();

?>
Montant de la commande : <?php echo $stmt2->fetch()['somme']; ?>â‚¬
<br/>

<?php
$stmt3 = $dbh->prepare("SELECT client.* FROM commande 
											INNER JOIN client ON client.idclient = commande.idclient
											WHERE commande.idcommande = :idcommande");
$stmt3->bindParam(':idcommande', $_GET['idcommande']);
$stmt3->execute();

?>
Client : <?php echo $stmt3->fetch()['nom']; ?>

<br/>
<br/>
<br/>
Liste produits
<table>
    <thead>
        <tr>
            <th>idproduit</th>
            <th>Nom</th>
            <th>Prix</th>
        </tr>
    </thead>
    <tbody>
<?php
$somme = 0;
foreach($stmt->fetchAll() as $row){
	echo "<tr>";
	echo "<td>";
		echo $row['idproduit'];
	echo "</td>";
	echo "<td>";
		echo $row['nom'];
	echo "</td>";
	echo "<td>";
		echo $row['prix'];
	echo "</td>";
	echo "</tr>";
	$somme = $somme + $row['prix'];
}
?>
  </tbody>
</table>
<?php echo "somme : ".$somme."â‚¬";?>
</body>
</html>	