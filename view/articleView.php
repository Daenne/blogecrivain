<article>
    <h1>
        <?= strip_tags($article['title'])?>
    </h1>
<p>Posté le <?= $article['date_create']; ?>
<p><?= nl2br(strip_tags($article['content'])); ?></p>
	<h2>Commentaires : </h2>
	<? php
	while ($comments)
	{
	?>
	    <p><strong><?= htmlspecialchars($comments['author']) ?></strong> le <?= $comments['comment_date_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($comments['content'])) ?></p>
	<?php
	}
	?>
<form action="articleView.php?id=<?= $article['id']; ?>" methode="post">
        <p>
          <label for="author">Pseudo : </label>
        </p>
          <input type="text" name="author" id="author" value="<?php if(isset($author)) echo $author ?>" />
        <p>
          <label for="comment">Commentaire : </label>
        </p>
          <textarea name="comment" id="comment" value="<?php if(isset($comment)) echo $comment ?>"></textarea>
        <p>
          <button type="submit">Envoyer</button>
        </p>
      </form>

</div>
</article>



