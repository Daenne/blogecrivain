<article>
    <h1>
        <?=$article['title']?>
    </h1>


<p>Posté le <?= $article['date_create']; ?>
<p><?= nl2br($article['content']); ?></p>

</div>
</article>
