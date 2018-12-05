<?php 
include('./view/template/header.php'); 
include('./view/template/headerAdmin.php'); 
?>
<section class="section">
  <div class="container">    
    <h2 class="title is-2">Ajouter un article : </h2>

      <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=vf59xyjgxn48ibyemdd9z3bljo7vnd99c667lokvdam3ykfi"></script>
      <script>tinymce.init({ selector:'textarea'});</script>

    <form action="index.php?action=addArticle" method ="post">
      <div class="field">
        <label for="title" class="label">Titre : </label>
        <div class="control">
            <input class="input is-link" name="title" type="text">
        </div>
      </div>
      <div class="field">
        <label class="label" for="content">Article : </label>
        <div class="control">
          <textarea class="textarea" name="content"></textarea>
        </div>  
      </div>
        <p>
          <button class="button is-link" type="submit" name="addArticle">Ajouter</button>
        </p>
    </form><br/>


    <?php
    while ($article = $articlesList->fetch()) { 
      if (strlen($article['content']) <= 200)
      {
        $content = $article['content'];
      }
      else
      {
        $begin = substr($article['content'], 0, 200);
        $begin = substr($begin, 0, strrpos($begin, ' ')) . '...';
        $content = $begin;
      } 
    ?>
    <div class="card">
      <header class="card-header">
        <p class="card-header-title title is-3">
          <?= strip_tags($article['title']); ?>
        </p>
      </header>
      <div class="card-content">
        <div class="content">
          <?= $content; ?>
          <br>
          <p>Posté le <?= $article['date_create']; ?></p>
        </div>
      </div>
      <footer class="card-footer">
        <a href="index.php?action=article&id=<?= $article['id']; ?>" class="card-footer-item">Lire la suite</a>
        <a href="index.php?action=updateArticle&id=<?= $article['id']; ?>" class="card-footer-item"><button class="button is-link">Modifier</button></a>
        <a href="index.php?action=deleteArticle&id=<?= $article['id']; ?>" class="card-footer-item"><button class="button is-danger">Supprimer</button></a>
      </footer>
    </div>
    <br/>  
    <?php
    }
    ?>
  </div>
</section>
<?php include('./view/template/footer.php'); ?> 


