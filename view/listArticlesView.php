<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" href="../Web/css/style.css" />
    <title>Liste des articles</title>
  </head>
  <body>
    <?php include('/template/header.php'); ?>
    <section class="articles">
        <h2>Derniers articles en ligne</h2>
        <?php
            while ($article = $articlesList->fetch()) { ?>
            <div>
                <?php
                if (strlen($article['content']) <= 200)
                {
                    $content = $article['content'];
                }
                else
                {
                    $begin = substr($article['content'], 0, 200);
                    $begin = substr($begin, 0, strrpos($begin, ' ')) . '...';
                    $content = $begin;
                } ?>
                <h3>
                    <?= strip_tags($article['title']); ?>
                </h3>
                <p>Posté le <?= $article['date_create']; ?>
                <p><?= nl2br(strip_tags($content)); ?></p>
                <a href="index.php?action=article&id=<?= $article['id']; ?>">Lire la suite</a>

            </div>
        <?php
        }
        ?> 
    </section>
    <?php include('/template/footer.php'); ?>   
  </body>

</html>