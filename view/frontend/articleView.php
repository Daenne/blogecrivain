<?php include('./view/template/header.php'); ?>
<section class="section">
  <div class="container">
      <div class="tile is-vertical box">
        <h2 class="title is-2">
        <?= strip_tags($article['title'])?>
        </h2>

        <p class="subtitle is-4">Posté le <?= $article['date_create']; ?>
        <p><?= nl2br($article['content']); ?></p> 
      </div>
      <div class="tile is-vertical">
          <h3 class="title is-3">Commentaires : </h3>
          <?php
          while ($comment = $comments->fetch()){
          ?>
          <div class="card">
            <header class="card-header">
              <p class="card-header-title">
                <strong><?= strip_tags($comment['author']) ?></strong>
              </p>
            </header>
            <div class="card-content">
              <div class="content">
                <?= nl2br(strip_tags($comment['content'])); ?>
                <br>
                le <?= $comment['comment_date_fr'] ?>
              </div>
              <form action="index.php?action=warningComment&amp;id=<?= $comment['id']; ?>" method="post"">
                <input class="button is-warning is-small" type="submit" value="Signaler">
              </form> 
            </div>
          </div><br/>
          <?php
          }
          ?>      
      </div>
      <br/>
      <div class="tile is-vertical">
        <h3 class="title is-3">Ajouter un commentaire : </h3>

        <form action="index.php?action=addComment&amp;id=<?= $article['id']; ?>" method ="post">
            <div class="field">
              <label for="author" class="label">Pseudo</label>
              <div class="control">
                <input class="input is-link" name="author" type="text" placeholder="Exemple : Jean Forteroche">
              </div>
                <p class="help">Entrez un pseudo</p>
            </div>
            <div class="field">
              <label class="label" for="content">Message</label>
              <div class="control">
                <textarea class="textarea is-link" name="content" placeholder="J'écris ici mon commentaire"></textarea>
              </div>
            </div>
            <p><button class="button is-link" type="submit">Envoyer</button></p>
          </form>
      </div>
  </div>
</section>
<?php include('./view/template/footer.php'); ?>  



