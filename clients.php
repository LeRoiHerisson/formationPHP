<?php
//les 3 lignes permettent d'afficher les erreurs sur la page
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$dbh = new PDO('mysql:host=localhost;dbname=eCommercePHP','root','root');

// pull all the clients limit to 25

$stmt=$dbh->prepare("SELECT * FROM client LIMIT 25");

//pull php code

$stmt->execute();

// format this into html

?>
<table>
    <thead>
        <tr>
            <th>idclient</th>
            <th>nom</th>
            <th>téléphone</th>
			<th>détail</th>
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
                	echo utf8_encode($row['telephone']);
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
