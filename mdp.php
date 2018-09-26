<?php
function bdd_insert( string $query, array $params = [] ) : int {
  require 'inc/pdo.php';

  if ( $params ) {
    $req = $bdd->prepare( $query );
    $req->execute( $params );
  }
  else {
    $req = $bdd->query( $query );
  }

  $inserted = $req->rowCount();

  return $inserted;
  echo $inserted;
}
bdd_insert('INSERT INTO utilisateur (username, password) VALUES (:username, :password)', [
  'username' => 'LeMotel',
  'password' => password_hash( 'password', PASSWORD_DEFAULT)
]);

?>
