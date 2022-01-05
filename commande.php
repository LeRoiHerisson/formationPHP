<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>commande</title>
</head>
<body>

    <?php
    $dbh = new PDO('mysql:host=localhost;dbname=eCommercePHP','root','root');
    $stmt=$dbh->prepare("SELECT `client`.*, `commande`.*, `produit`.*, `produit_commande`.*
        FROM `client`, `commande`, `produit`, `produit_commande`; 
        INNER JOIN produit_commande ON produit_commande.idcommande = commande.idcommande 
        INNER JOIN produit_commande ON produit_commande.idproduit = produit.idproduit
        INNER JOIN commande ON commande.idclient = client.idclient
        WHERE idcommande = :idcommande");
    $stmt->bindParam(':idcommande', $_GET['idcommande']);
    
    $stmt->execute();   
    ?>


<table>
    <thead>
        <tr>
            <th>idcommande</th>
            <th>idproduit</th>
            <th>nom</th>
            <th>prix</th>
			<th>idclient</th>
            <th>nom</th>
            <th>link vers client info</th>
        </tr>
    </thead>
    <tbody>
		<?php
		foreach ($stmt->fetchAll() as $row) {
			echo "<tr>";
				echo "<td>";
					echo $row['idccommande'];
				echo "</td>";
				
				echo "<td>";
					echo utf8_encode($row['idproduit']);
				echo "</td>";

                echo "<td>";
                	echo utf8_encode($row['nom']);
                echo "</td>";

                echo "<td>";
	                echo utf8_encode($row['prix']);
                echo "</td>";

                echo "<td>";
                    echo utf8_encode($row['idclient']);
                echo "</td>";

                echo "<td>";
                    echo utf8_encode($row['nom']);
                echo "</td>";

				echo "<td>";
					echo "<a href='clients.php'>clients</a>";
					//echo call from backend to the html the closing link tag
				echo "</td>";

                echo "<td>";
	                echo "<a href='client.php?idclient=".$row['idclient']."'>";
	                //dynamic generated link
	                echo "client ".$row['nom'];
	                //text that shows for the link
	                echo "</a>"; //echo call from backend to the html the closing link tag
        echo "</td>";
			echo "</tr>";
		}
		?>
    </tbody>
</table>
</body>
</html>