<?php

require_once("config.php");

// Ã  faire avant sur workbench
// ALTER table etat modify idetat int AUTO_INCREMENT;


try {
    $nom=$_POST["nom"];
    $email=$_POST["email"];
    $telephone=$_POST["telephone"];
	$stmt = $dbh->prepare("INSERT INTO client (nom,email,telephone) VALUES ('$nom', '$email','$telephone');");
	//$stmt->bindParam(":nom",$_GET["nom"]);
    //$stmt->bindParam(":prix",$_GET["prix"]);
	$stmt->execute();
    
} catch (PDOException $e) {
	print "Erreur !: " . $e->getMessage() . "<br/>";
	die();
}
 

// SELECT * FROM etat;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Client</title>
</head>


<body>
    <?php
        
        mysql_connect("localhost","root","root");
        mysql_select_db("eCommercePHP");
        $select="eCommercePHP";
        if(isset($select)&&$select!=""){
        $select=$_POST['NEW'];
        }
    ?>


<form id="form_insert" action="" method="post">
	<label for="nom">Nom :</label>
	<input type="text" id="nom" name="nom" required>
    <br>
    <label for="email">Email :</label>
	<input type="email" id="email" name="email" required>
    <br>
    <label for="telephone">Telphone :</label>
	<input type="tel" id="telephone" name="telephone" required>
    <br>
    <label for="adresse">Adresse :</label>
        <select name='adresse'>
        <option value="">--- Select ---</option>
        <?php
        $stmt=$dbh->prepare("SELECT adresse FROM adresse");
        $stmt->execute();
        foreach($stmt->fetchAll(PDO::FETCH_NUM) AS $line){
          echo '<option value ="'.$line[0].'">'.$line[0].'</option>';
        }

        ?>
        </select>
        </form>
    <br>
	<button type="submit" form="form_insert" value="Submit">Valider</button>
</form>

</body>
</html>