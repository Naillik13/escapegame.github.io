<?php
try {
	$bdd = new PDO('mysql:host=localhost;dbname=escapegame;port=8888', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch( PDOException $e ){
	die( 'Erreur :' . $e->getMessage() );
}
?>
