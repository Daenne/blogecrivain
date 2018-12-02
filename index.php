<?php

session_start();

require_once('controller/Controller.php');

$controller = new Controller();

try { 
    if (isset($_GET['action'])) 
    {
      //Way to get login
      if ($_GET['action'] == 'login')
      {
        if(isset($_SESSION['authentification']))
        {
          $controller->getIndexAdmin();
        }
        else 
        {
          if ((isset($_POST['pseudo'])) AND (isset($_POST['password']))) 
          {
            $controller->getAdminConnexion(($_POST['pseudo']), ($_POST['password']));
          }
          else        
          {
            $controller->getLogin();
          }
        }
      }

      //Way to get home page
      elseif ($_GET['action'] == 'blog') 
      {
        $controller->getIndex();
      } 

      //Way to get articles page
      elseif ($_GET['action'] == 'articles') 
      {
        $controller->getArticles();
      }  

      //Way to add a comment
      elseif ($_GET['action'] == 'addComment') 
      {
        if (isset($_GET['id']) && $_GET['id'] > 0) 
        {
          if (!empty($_POST['author']) && !empty($_POST['content'])) 
          { 	
            $controller->addComment($_GET['id'], $_POST['author'], $_POST['content']);
          }
          else 
          {
            throw new Exception("<p>Tous les champs ne sont pas remplis. Retour à la page d'accueil <a href=\"index.php?action=blog\">ici</a></p>");
          }
        }
        else 
        {
          throw new Exception("<p>Aucun identifiant de billet envoyé. Retour à la page d'accueil <a href=\"index.php?action=blog\">ici</a></p>");
        }
      }

      //Way to get an article
      elseif ($_GET['action'] == 'article') 
      {
        if (isset($_GET['id']) && $_GET['id'] > 0) 
        {
          $controller->getArticle($_GET['id']);
        }
        else 
        {
          throw new Exception("<p>Aucun identifiant de billet envoyé. Retour à la page d'accueil <a href=\"index.php?action=blog\">ici</a></p>");
        }
      }

      //Way to report a comment
      elseif ($_GET['action'] == 'warningComment')
      {
        if(isset($_GET["id"]) && $_GET["id"] > 0) 
        {
          $controller->changeComment($_GET['id']);
        }
        else 
        {
          throw new Exception("<p>Ce commentaire n'a pas pu être signalé. Retour à la page d'accueil <a href=\"index.php?action=blog\">ici</a></p>");
          
        }
      }

      //Way to get admin home page
      elseif($_GET['action'] == 'admin'){
        if (isset($_SESSION['authentification'])) 
        {
          $controller->getIndexAdmin();
        }
        else 
        {
          $controller->getLogin();
        } 
      } 

      //Way to write an article already exist
      elseif($_GET['action'] == 'writeArticle')
        {
          if (isset($_SESSION['authentification'])) 
          {
            if (!empty($_POST['title']) && !empty($_POST['content'])) 
            {
              if(isset($_GET["id"]) && $_GET["id"] > 0)
              {
                $controller->changeArticle($_GET["id"], $_POST["title"], $_POST["content"]);
              }
              else
              {
                throw new Exception("<p>Impossible de modifier l'article. Retour à la page d'accueil <a href=\"index.php?action=blog\">ici</a></p>");
              }
            }
            else 
            {
              throw new Exception("<p>Tous les champs ne sont pas remplis. Retour à la page d'accueil <a href=\"index.php?action=blog\">ici</a></p>");
            }
          }
          else 
          {
            throw new Exception("<p>Vous n'avez pas les accès nécessaires. Retour à la page d'accueil <a href=\"index.php?action=blog\">ici</a></p>");
          }
        }

      //Way to add a new article
      elseif ($_GET['action'] == 'addArticle') 
      {
        if(isset($_SESSION['authentification']))
        {
          if (!empty($_POST['title']) && !empty($_POST['content'])) 
          {
            $controller->addArticle($_POST['title'], $_POST['content']);
          }
          else
          {
            throw new Exception("<p>Tous les champs ne sont pas remplis. Retour à la page d'accueil <a href=\"index.php?action=blog\">ici</a></p>");
          }
        }
        else 
        {
          throw new Exception("<p>Vous n'avez pas les accès nécessaires. Retour à la page d'accueil <a href=\"index.php?action=blog\">ici</a></p>");
        }
      }

      //Way to edit page
      elseif($_GET['action'] == 'updateArticle')
      {

        if (isset($_SESSION['authentification']))
        {
          if (isset($_GET['id']) && $_GET['id'] > 0) 
          {
            $controller->showArticle($_GET['id']);
          }
          else 
          {
            throw new Exception("<p>Impossible de modifier l'article. Retour à la page d'accueil <a href=\"index.php?action=blog\">ici</a></p>");
          }
        }
        else 
        {
          throw new Exception("<p>Vous n'avez pas les accès nécessaires. Retour à la page d'accueil <a href=\"index.php?action=blog\">ici</a></p>");
        }       
      }

      //Way to delete an article
      elseif($_GET['action'] == 'deleteArticle')
      {
        if(isset($_SESSION['authentification']))
        {
          if (isset($_GET['id']) && $_GET['id'] > 0) 
          {
            $controller->stopArticle($_GET['id']);
          }
          else 
          {
            throw new Exception("<p>Impossible de supprimer l'article. Retour à la page d'accueil <a href=\"index.php?action=blog\">ici</a></p>");
          }
        }
        else 
        {
          throw new Exception("<p>Vous n'avez pas les accès nécessaires. Retour à la page d'accueil <a href=\"index.php?action=blog\">ici</a></p>");
        }
      }

      //Way to get admin comments page
      elseif($_GET['action'] == 'adminComment')
      {
        if(isset($_SESSION['authentification']))
        {
          $controller->getAllComments();
        }
        else 
        {
          throw new Exception("<p>Vous n'avez pas les accès nécessaires. Retour à la page d'accueil <a href=\"index.php?action=blog\">ici</a></p>");
        }
      }

      //Way to delete a comment
      elseif($_GET['action'] == 'deleteComment')
      {
        if(isset($_SESSION['authentification']))
        {
          if (isset($_GET['id']) && $_GET['id'] > 0) 
          {
            $controller->stopComment($_GET['id']);
          }
          else 
          {
            throw new Exception("<p>Impossible de supprimer ce commentaire. Retour à la page d'accueil <a href=\"index.php?action=blog\">ici</a></p>");
          }
        }
        else 
        {
          throw new Exception("<p>Vous n'avez pas les accès nécessaires. Retour à la page d'accueil <a href=\"index.php?action=blog\">ici</a></p>");
        }
      }

      //Way to logout admin page
      elseif ($_GET['action'] == 'endAdmin')
      {
        if (isset($_SESSION['authentification']))
        {
          $_SESSION['authentification'] = false;
          session_unset();
          session_destroy();
          $controller->getIndex();
        }
        else
        {
          $controller->getIndex();
        }
      }
    }
    else 
    {
        $controller->getIndex();
    }
}
catch(Exception $e) 
{ 
    echo 'Erreur : ' . $e->getMessage();
}