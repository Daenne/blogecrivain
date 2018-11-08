    <h2>Derniers articles en ligne</h2>

    <?php

    while ($article = $articlesList->fetch()) { ?>
        <article>
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
                    <?=$article['title']?>
                </h3>
                <p>Posté le <?= $article['date_create']; ?>
                <p><?= nl2br($content); ?></p>
                <a href="index.php?action=article&id=<?= $article['id']; ?>">Lire la suite</a>

            </div>
        </article>

    <?php
    }
    ?>
