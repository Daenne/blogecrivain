<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--<link rel="stylesheet" href="../Web/css/style.css" />-->
    <title><?= $article['title']; ?></title>
  </head>
  <body>

    <section class="post">
      <?php include('./view/template/header.php'); ?>
      <div class="article">
        <h2>
        <?= strip_tags($article['title'])?>
        </h2>
        <p>Posté le <?= $article['date_create']; ?>
        <p><?= nl2br($article['content']); ?></p> 
      </div>
      <div class="comments">
        <h2>Commentaires : </h2>
        <?php
        while ($comment = $comments->fetch()){
        ?>
        <p><strong><?= strip_tags($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
        <p><?= nl2br(strip_tags($comment['content'])) ?></p>
        <form action="index.php?action=warningComment&amp;id=<?= $comment['id']; ?>" method="post"">
          <input type="submit" value="Signaler">
        </form> 
        <?php
        }
        ?>
        <h2>Ajouter un commentaire : </h2>

        <form action="index.php?action=addComment&amp;id=<?= $article['id']; ?>" method ="post">
          <p><label for="author">Pseudo : </label></p>
          <input type="text" name="author" id="author" />
          <p><label for="content">Commentaire : </label></p>
          <textarea name="content" id="content"></textarea>
          <p><button type="submit">Envoyer</button></p>
        </form> 
      </div>
      <?php include('./view/template/footer.php'); ?>  
    </section>
  </body>



