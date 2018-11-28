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
	<table>
    	<thead>
        	<tr>
            	<th>Auteur</th>
            	<th>Contenu</th>
            	<th>Date</th>
            	<th>Statut</th>
        	</tr>
    	</thead>

    	<tbody>
        	<tr>
            	<td><strong><?= htmlspecialchars($comment['author']) ?></strong></td>
            	<td>le <?= $comment['date_create'] ?></td>
            	<td><?= nl2br(htmlspecialchars($comment['content'])) ?></td>
            	<td>
            		<?php
        			if ($comment['warning'] == 0) {
        				echo "";
        			}
        			else {
        				echo "Signalé";
        			}
        			?>
            	</td>
            	<td><a href="index.php?action=deleteComment&amp;id=<?= $comment['id']; ?>"><button>Supprimer</button></a></td>
        	</tr>
    	</tbody>
	</table>	
	<?php
	}
	?>
</div>