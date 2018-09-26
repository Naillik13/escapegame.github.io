<?php
function account_exists() : array {
    $membre = bdd_select( 'SELECT id, password FROM utilisateur WHERE username = ?', [$_POST['username']] );
    if ( !empty( $membre ) && password_verify( $_POST['password'], $membre[0]['password'] ) ) {
        return $membre[0];
    }
    else {
        return [];
    }
}
function bdd_select( string $query, array $params = [] ) {
  require 'pdo.php';

  if ( $params ) {
    $req = $bdd->prepare( $query );
    $req->execute( $params );
  }
  else {
    $req = $bdd->query( $query );
  }

  $data = $req->fetchAll();
  $req = null;
  $bdd = null;
  return $data;
}

function bdd_delete( string $query, array $params = [] ) : int {
  require 'pdo.php';

  if ( $params ) {
    $req = $bdd->prepare( $query );
    $req->execute( $params );
  }
  else {
    $req = $bdd->query( $query );
  }

  $deleted = $req->rowCount();
  $req = null;
  $bdd = null;
  return $deleted;
}
function bdd_update( string $query, array $params = [] ) : int {
  require 'pdo.php';

  if ( $params ) {
    $req = $bdd->prepare( $query );
    $req->execute( $params );
  }
  else {
    $req = $bdd->query( $query );
  }

  $updated = $req->rowCount();
  $req = null;
  $bdd = null;
  return $updated;
}
function bdd_insert( string $query, array $params = [] ) : int {
  require 'pdo.php';

  if ( $params ) {
    $req = $bdd->prepare( $query );
    $req->execute( $params );
  }
  else {
    $req = $bdd->query( $query );
  }

  $inserted = $bdd->lastInsertId();
  $req = null;
  $bdd = null;
  return $inserted;
}
?>
