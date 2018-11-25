<h1>Interface utilisateur</h1>

<h2>Gestionnaire des commentaires</h2>
<nav>
	<ul>
		<a href="index.php?action=admin"><li>Gérer les articles</li></a>
	</ul>
</nav>
<div class="comment">
	<?php
	while ($comment = $comments->fetch()){
	?>
	    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['date_create'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>

	<a href="index.php?action=deleteComment&amp;id=<?= $comment['id']; ?>"><button>Supprimer</button></a>	
	<?php
	}
	?>
</div>