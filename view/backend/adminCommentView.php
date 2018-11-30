<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--<link rel="stylesheet" href="../Web/css/style.css" />-->
    <title>Administration</title>
  </head>
  <body>
    <h1>Interface utilisateur</h1>
    <a href="index.php?action=endAdmin"><button>Déconnexion</button></a>
    <div class="commentAdmin">
        <h2>Gestionnaire des commentaires</h2>
        <a href="index.php?action=admin"><li>Gérer les articles</li></a>

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
                    <td><strong><?= strip_tags($comment['author']) ?></strong></td>
                    <td>le <?= $comment['date_create'] ?></td>
                    <td><?= nl2br(strip_tags($comment['content'])) ?></td>
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
  </body>
</html>