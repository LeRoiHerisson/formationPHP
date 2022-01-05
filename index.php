
<?php
//les 3 lignes permettent d'afficher les erreurs sur la page
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

//la ligne permet de se connecter à la base de données
//$dbh = new PDO('mysql:host=localhost;dbname=eCommercePHP', 'root', 'root');


// permet d'afficher la liste des produits
/*try {
    $dbh = new PDO('mysql:host=localhost;dbname=eCommercePHP','root','root');
   foreach($dbh->query('SELECT*from produit')as $row) {
    print_r($row);
   }
   $dbh = null;
} catch (PDOException $e) {
    print "Erreur!:" .$e->getMessage(). "<br/>";
    die();
}
*/

// $stmt = statement
/*$dbh = new PDO('mysql:host=localhost;dbname=eCommercePHP','root','root');
$stmt=$dbh->prepare("SELECT * FROM produit WHERE idproduit =:idproduit");
$stmt->bindParam(':idproduit', $idproduit);

$idproduit='5';
$stmt->execute();
//Afficher les résultats : print_r
print_r($stmt->fetchAll());
*/


// exo 
//1. Afficher la liste des états des commandes (ensemble)
/*$dbh = new PDO('mysql:host=localhost;dbname=eCommercePHP','root','root');
$stmt=$dbh->prepare("SELECT * FROM etat");

$stmt->execute();

print_r($stmt->fetchAll());
*/
//2. Afficher la liste des clients (id, nom) avec une limite à 5
/*$dbh = new PDO('mysql:host=localhost;dbname=eCommercePHP','root','root');
$stmt=$dbh->prepare("SELECT * FROM client WHERE idproduit =:idproduit, idnom =:idnom");
$stmt->bindParam(":idproduit", $idproduit, ":idnom",$idnom);

$idproduit='5';
$idnom='5';
$stmt->execute();

//Afficher les résultats : print_r

print_r($stmt->fetchAll());
*/
//3. Afficher la cliente avec id 558
/*$dbh = new PDO('mysql:host=localhost;dbname=eCommercePHP','root','root');
$stmt=$dbh->prepare("SELECT * FROM client WHERE idclient =:idclient");
$stmt->bindParam(':idclient', $idclient);

$idclient='558';
$stmt->execute();

//Afficher les résultats : print_r

print_r($stmt->fetchAll());*/

//aficher le nom du produit ayant l'id 15
/*$dbh = new PDO('mysql:host=localhost;dbname=eCommercePHP','root','root');
$stmt=$dbh->prepare("SELECT * FROM produit WHERE idproduit =:idproduit");
$stmt->bindParam(':idproduit', $idproduit);

$idproduit='15';
$stmt->execute();

//Afficher les résultats : print_r

print_r($stmt->fetchAll());
*/
//aficher le client qui a commande commandeid 741
/*$dbh = new PDO('mysql:host=localhost;dbname=eCommercePHP','root','root');
$stmt=$dbh->prepare("SELECT * FROM client INNER JOIN commande ON commande.idclient = client.idclient WHERE idcommande =:idcommande");
$stmt->bindParam(':idcommande', $idcommande);

$idcommande='741';
$stmt->execute();

//Afficher les résultats : print_r

print_r($stmt->fetchAll());
*/

/*1 connexion BD
2 table
3 imbriquer les deux*/

// 1 connexion BD
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
?>

