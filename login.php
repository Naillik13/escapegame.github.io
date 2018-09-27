<?php
session_start();
if ( isset( $_SESSION['id'] ) ) {
    header( 'Location: blog.php');
}
if (!empty( $_POST )) {
    extract( $_POST );
    require_once 'inc/functions.php';

    $membre = account_exists();

    if ($membre) {
        $_SESSION['id'] = $membre['id'];
        $_SESSION['username'] = $_POST['username'];
        header( 'Location: blog.php');
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
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">

</head>
<body>
<nav>
<form method="POST">
    <div id="input-name"><input class="mb-2" type="text" name="username" placeholder="Nom"><br/><input type="password" name="password" placeholder="Prénom"></div>
    <button name="btn_login" type="submit">SE CONNECTER</button>
</form>
</nav>
<?php if ( isset( $erreur ) ) : ?>
    <div class="alert alert-danger"><?= $erreur ?></div>
<?php endif ?>
<div class="sketchfab-embed-wrapper"><iframe height="480" src="https://sketchfab.com/models/399c0b3023fc434ebfaa74517469c798/embed?autospin=0.2&amp;autostart=1&amp;preload=1" frameborder="0" allow="autoplay; fullscreen; vr" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>

</div>
</body>
</html>