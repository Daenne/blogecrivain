<?php include('./view/template/header.php'); ?>
<section class="section">
  <div class="container">
    <h2 class="title is-2">Derniers articles en ligne</h2>
    <article class="message is-link">
        <?php
            while ($article = $articlesList->fetch()) { ?>
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
        <div class="message-header">
            <p><?= strip_tags($article['title']); ?></p>
        </div>
        <div class="message-body">
            <p class="subtitle is-5">Posté le <?= $article['date_create']; ?>
            <p><?= nl2br(strip_tags($content)); ?></p>
            <a href="index.php?action=article&id=<?= $article['id']; ?>">Lire la suite</a>
        </div>
        <?php
        }
        ?>
    </article>
  </div>        
</section>
<?php include('./view/template/footer.php'); ?>   
