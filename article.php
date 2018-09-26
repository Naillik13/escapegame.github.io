<?php
session_start();
if ( !isset( $_SESSION['id'] ) && !isset($_GET['id']) ) {
    header( 'Location: login.php');
}
require_once 'inc/functions.php';

$article = bdd_select('SELECT id, titre, contenu, date, url FROM article WHERE id=' . $_GET['id']);


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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/blog.css">

</head>
<body>
<nav>
    <form method="POST" action="deconnexion.php"><a href="blog.php"><h1><i class="fas fa-chevron-left"></i>NEWS</h1></a><button type="submit">DECONNEXION</button></form>
</nav>

<section>
    <article>
        <img src="img/<?php echo $article[0]['url'] ?>"/>
        <h2 id="titre"> <?php echo $article[0]['titre'] ?></h2>

        <p><?php echo $article[0]['contenu'] ?></p>
        <time datetime="<?php echo $article[0]['date'] ?>"><?php echo date("d/m/Y", strtotime($article[0]['date'])) ?></time>
    </article>
</section>
</body>


</html>