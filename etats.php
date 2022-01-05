
<?php
//les 3 lignes permettent d'afficher les erreurs sur la page
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$dbh = new PDO('mysql:host=localhost;dbname=eCommercePHP', 'root', 'root');
$stmt = $dbh->prepare("SELECT * FROM etat");
$stmt->execute();

// print_r($stmt->fetchAll());

?>

<table>
    <thead>
        <tr>
            <th>idetat</th>
            <th>libelle</th>
        </tr>
    </thead>
    <tbody>
		<?php
		foreach ($stmt->fetchAll() as $row) {
			// echo $row[0]." ".utf8_encode($row[1])."<br/>";
			echo "<tr>";
				echo "<td>";
				echo $row['idetat'];
				echo "</td>";
				
				echo "<td>";
				echo utf8_encode($row['libelle']);
				echo "</td>";
			echo "</tr>";
		}
		?>
    </tbody>
</table>