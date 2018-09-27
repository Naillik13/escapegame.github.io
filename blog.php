<?php
    session_start();
    if ( !isset( $_SESSION['id'] ) ) {
        header( 'Location: login.php');
    }
    require_once 'inc/functions.php';

    $articles = bdd_select('SELECT id, titre, contenu, date, url FROM article');


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html" ; charset="utf-8">
    <title>Le Motel</title>
    <meta charset="UTF-8">
    <meta keyword="">
    <meta description="">
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/blog.css">

</head>
<body>
    <nav>
        <form method="POST" action="deconnexion.php"><h1>NEWS</h1><button type="submit">DECONNEXION</button></form>
    </nav>

    <section>
        <?php
            foreach ($articles as $article){
                ?>
                <a href="article.php?id=<?php echo $article['id'] ?>">
                    <article>
                        <img src="img/<?php echo $article['url'] ?>"/>
                        <h2> <?php echo $article['titre'] ?></h2>
                        <time datetime="<?php echo $article['date'] ?>"><?php echo date("d/m/Y", strtotime($article['date'])) ?></time>
                    </article>
                </a>
                <?php
            }

        ?>
    </section>
</body>


</html>