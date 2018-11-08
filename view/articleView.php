<article>
    <h1>
        <?= strip_tags($article['title'])?>
    </h1>
<p>Posté le <?= $article['date_create']; ?>
<p><?= nl2br(strip_tags($article['content'])); ?></p>
	<h2>Commentaires : </h2>
	<?php
	while ($comment = $comments->fetch()){
	//for ($i=0; $i < $comments.length ; $i++) { 
	?>
	    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
	<?php
	}
	?>
	<h2>Ajouter un commentaire : </h2>
	<form action="index.php?action=addComment&amp;id=<?= $article['id']; ?>" methode="post">
        <p>
          <label for="author">Pseudo : </label>
        </p>
          <input type="text" name="author" id="author" value="<?php if(isset($author)) echo $author ?>" />
        <p>
          <label for="comment">Commentaire : </label>
        </p>
          <textarea name="content" id="content" value="<?php if(isset($content)) echo $content ?>"></textarea>
        <p>
          <button type="submit">Envoyer</button>
        </p>
      </form>
</article>



