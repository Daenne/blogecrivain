    <?php include('./view/template/header.php'); ?>
    <?php include('./view/template/headerAdmin.php'); ?>

      <form action="index.php?action=addArticle" method ="post">
        <p>
          <label for="title">Titre : </label>
        </p>
          <input type="textarea" name="title" id="title" />
        <p>
          <label for="content">Article : </label>
        </p>
          <textarea name="content" id="content"></textarea>
        <p>
          <button type="submit" name="addArticle">Ajouter</button>
        </p>
      </form>

      <?php
      while ($article = $articlesList->fetch()) { ?>
          <div class="post">
              <h3>
                <?= strip_tags($article['title']); ?>
              </h3>
              <p>Posté le <?= $article['date_create']; ?>
              <a href="index.php?action=article&id=<?= $article['id']; ?>">Lire la suite</a>
              <a href="index.php?action=updateArticle&id=<?= $article['id']; ?>"><button>Modifier</button></a>
              <a href="index.php?action=deleteArticle&id=<?= $article['id']; ?>"><button>Supprimer</button></a>
          </div>

    <?php
    }
    ?>
    </div>
    <script>tinymce.init({ selector:'textarea'});</script>
    <?php include('./view/template/footer.php'); ?> 


