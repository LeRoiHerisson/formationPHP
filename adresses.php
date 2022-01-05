<?php
//les 3 lignes permettent d'afficher les erreurs sur la page
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$dbh = new PDO('mysql:host=localhost;dbname=eCommercePHP','root','root');

// pull all the clients limit to 25

$stmt=$dbh->prepare("SELECT * FROM adresse LIMIT 25");

//pull php code

$stmt->execute();

// format this into html

?>
<table>
    <thead>
        <tr>
            <th>idadresse</th>
            <th>pays</th>
            <th>ville</th>
            <th>adresse</th>
        </tr>
    </thead>
    <tbody>
		<?php
		foreach ($stmt->fetchAll() as $row) {
			// echo $row[0]." ".utf8_encode($row[1])."<br/>";
			echo "<tr>";
				echo "<td>";
				echo $row['idadresse'];
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
			echo "</tr>";
		}
		?>
    </tbody>
</table>

?>
