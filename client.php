<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>client</title>
</head>
<body>

    <?php
    $dbh = new PDO('mysql:host=localhost;dbname=eCommercePHP','root','root');
    $stmt=$dbh->prepare("SELECT * FROM client 
                        INNER JOIN adresse ON adresse.idadresse = client.idadresse 
                        WHERE idclient = :idclient");
    $stmt->bindParam(':idclient', $_GET['idclient']);
    
    $stmt->execute();

        
    ?>
    <table>
    <thead>
        <tr>
            <th>idclient</th>
            <th>nom</th>
            <th>email</th>
            <th>téléphone</th>
			<th>idadresse</th>
            <th>ville</th>
            <th>pays</th>
            <th>adresse</th>
        </tr>
    </thead>
    <tbody>
		<?php
		foreach ($stmt->fetchAll() as $row) {
			// echo $row[0]." ".utf8_encode($row[1])."<br/>";
			echo "<tr>";
				echo "<td>";
					echo $row['idclient'];
				echo "</td>";
				
				echo "<td>";
					echo utf8_encode($row['nom']);
				echo "</td>";

                echo "<td>";
                	echo utf8_encode($row['email']);
                echo "</td>";

                echo "<td>";
	                echo utf8_encode($row['telephone']);
                echo "</td>";

                echo "<td>";
                    echo utf8_encode($row['idadresse']);
                echo "</td>";

                echo "<td>";
                    echo utf8_encode($row['pays']);
                echo "</td>";

                echo "<td>";
                    echo utf8_encode($row['ville']);
                echo "</td>";

                echo "<td>";
                    echo utf8_encode($row['adresse']);
                echo "</td>";

				echo "<td>";
					echo "<a href='client.php'>clients</a>";
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