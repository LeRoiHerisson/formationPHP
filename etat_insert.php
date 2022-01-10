<?php
require_once("config.php");

$stmt = $bdh->prepare("INSERT INTO etat (libelle) VALUES (:libelle);");


?>