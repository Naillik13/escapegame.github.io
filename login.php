<?php
session_start();
if ( isset( $_SESSION['id'] ) ) {
    header( 'Location: index.html');
}
if (!empty( $_POST )) {
    extract( $_POST );
    require_once 'inc/functions.php';

    $membre = account_exists();

    if ($membre) {
        $_SESSION['id'] = $membre['id'];
        $_SESSION['username'] = $_POST['username'];
        header( 'Location: index.html');
    }
    else {
        $erreur = 'Raté... Essayes encore !';

    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html" ;="" charset="utf-8">
    <title>Le Motel</title>
    <meta charset="utf-8">
    <meta keyword="">
    <meta description="">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
<form method="POST" class="row">
    <div id="input-name" class="col-6"><input type="text" name="username" placeholder="Pseudo"><br/><input type="password" name="password" placeholder="Password"></div>
    <button name="btn_login" type="submit" class="col-4 offset-1 text-center">SE CONNECTER</button>
</form>
<?php if ( isset( $erreur ) ) : ?>
    <div class="alert alert-danger"><?= $erreur ?></div>
<?php endif ?>
</body>
</html>