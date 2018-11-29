<?php

session_start();

require_once('controller/Controller.php');

$controller = new Controller();

try { 
    if (isset($_GET['action'])) {

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

      //Chemin pour page d'accueil
      elseif ($_GET['action'] == 'blog') 
      {
        $controller->getIndex();
      } 

      //Chemin pour les articles
      elseif ($_GET['action'] == 'articles') 
      {
        $controller->getArticles();
      }  

      //Chemin pour ajout commentaire
      elseif ($_GET['action'] == 'addComment') 
      {
        if (isset($_GET['id']) && $_GET['id'] > 0) 
        {
          if (!empty($_POST['author']) && !empty($_POST['content'])) 
          { 	
            $controller->addComment($_GET['id'], $_POST['author'], $_POST['content']);
          }
          else {
            throw new Exception('Tous les champs ne sont pas remplis !');
          }
        }
        else {
          throw new Exception('Aucun identifiant de billet envoyé');
        }
      }

      //Chemin pour un article
      elseif ($_GET['action'] == 'article') 
      {
        if (isset($_GET['id']) && $_GET['id'] > 0) 
        {
          $controller->getArticle($_GET['id']);
        }
        else {
          throw new Exception('Aucun identifiant de billet envoyé');
        }
      }

      //Chemin pour signaler
      elseif ($_GET['action'] == 'warningComment')
      {
        if(isset($_GET["id"]) && $_GET["id"] > 0) {
          $controller->changeComment($_GET['id']);
      }
        else {
          throw new Exception("Le billet n'a pas pu être signalé : aucun identifiant de commentaire trouvé");
          
        }
      }


//EN TRAVAUX

      elseif($_GET['action'] == 'admin'){
        if (isset($_SESSION['authentification'])) 
        {
          $controller->getIndexAdmin();
        }
        else {
          $controller->getLogin();
        } 
      }  
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
                throw new Exception("Impossible de modifier l'article");
              }
            }
            else {
              throw new Exception('Tous les champs ne sont pas remplis !');
            }
          }
          else {
            throw new Exception("Vous n'avez pas les autorisations nécessaires");
          }
        }

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
            throw new Exception("Veuillez remplir tous les champs");
          }
        }
        else 
        {
          throw new Exception("Vous n'avez pas les autorisations nécessaires");
        }
      }

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
            throw new Exception("Impossible de modifier l'article");
          }
        }
        else 
        {
          throw new Exception("Vous n'avez pas les autorisations nécessaires");
        }       
      }

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
            throw new Exception("Impossible de supprimer l'article");
          }
        }
        else 
        {
          throw new Exception("Vous n'avez pas les autorisations nécessaires");
        }
      }

      elseif($_GET['action'] == 'adminComment')
      {
        if(isset($_SESSION['authentification']))
        {
          $controller->getAllComments();
        }
        else 
        {
          throw new Exception("Vous n'avez pas les autorisations nécessaires");
        }
      }
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
            throw new Exception("Impossible de supprimer le commentaire");
          }
        }
        else 
        {
          throw new Exception("Vous n'avez pas les autorisations nécessaires");
        }
      }

      elseif ($_GET['action'] == 'endAdmin')
      {
        if (isset($_SESSION['authentification']))
        {
          session_unset();
          session_destroy();
          $controller->getIndex();
        }
        else
        {
          $controller->getIndex();
        }
      }
 



      //Chemin pour s'authentifier PAS VALIDE POUR LE MOMENT
      //elseif (isset($_SESSION['pseudo']))
      //{
      //  echo 'Bonjour ' . $_SESSION['pseudo'];

      //  if($_GET['action'] == 'admin'){
      //    echo'coucou action admin';
       //   $controller->getIndexAdmin();
       // }  
        //Chemin pour ajouter un article
       // elseif($_GET['action'] == 'admin&amp;addArticle')
       // {
       //   if (isset($_GET['id']) && $_GET['id'] > 0) 
       //   {
       //     if (!empty($_POST['title']) && !empty($_POST['content'])) 
        //    {
       //       $controller->addArticle($_POST['title'], $_POST['content']);
        //    }
        //    else {
        //      throw new Exception('Tous les champs ne sont pas remplis !');
       //     }
        //  }
        //  else {
        //    throw new Exception('Aucun identifiant de billet envoyé');
        //  }
       // }
        //Chemin pour update un article
       // elseif($_GET['action'] == 'admin&amp;updateArticle')
       // {
       //   if (isset($_GET['id']) && $_GET['id'] > 0) 
       //   {
       //     $controller->getArticle($id);
       //   }
      //    else {
       //     throw new Exception('Aucun identifiant de billet envoyé');
       //   }
       // }
        //Chemin pour delete un article
        //elseif($_GET['action'] == 'admin&amp;deleteArticle')
       // {
       //   if (isset($_GET['id']) && $_GET['id'] > 0) 
       //   {
        //    $controller->getArticle($_GET['id']);
       //   }
       //   else {
        //    throw new Exception('Aucun identifiant de billet envoyé');
        //  }
       // }
      //}
    }
    else {
        $controller->getIndex();
    }
}
catch(Exception $e) { 
    echo 'Erreur : ' . $e->getMessage();
}





//if (isset($_GET['action'])) {
//	switch ($_GET['action']) {
//		case '':
//			$controller->getIndex();
//			break;	
//		case 'addComment':
//			if (isset($_GET['id']) && $_GET['id'] > 0) {

 //           if (!empty($_POST['author']) && !empty($_POST['content'])) {
  //              addComment($_GET['id'], $_POST['author'], $_POST['content']);
  //          }
   //         else {
    //           echo 'Erreur : tous les champs ne sont pas remplis !';
    //        }
//
     //   	}else {
     //       echo 'Erreur : aucun identifiant de billet envoyé';
     //   	}
       // 	break;
	//	case 'article':
		//	if ((isset($_GET['id'])) && ($_GET['id'] >0)){
		//		$controller->getArticle($_GET['id']);
		//	//	$controller->getComments($_GET['id']);	
		//	}else {
		//		$controller->getIndex();
		//	}
		//	break;

		//case 'blog':
		//	$controller->getArticles();
		//	break;
		//default:
		//	$controller->getIndex();
		//	break;
	//}
    //if ($_GET['action'] == '') {
    //    $controller->getIndex();
    //}
    //elseif((isset($_GET['action']) == 'blog')){
    //    $controller->getArticles();
    //}
    //elseif((isset($_GET['action']) == 'article')){
    //   	$controller->getArticle(isnumeric($_GET['id']));
       	//$controller->getComments(isnumeric($_GET['articleid']));
       	//if (isset($_GET['id']) && $_GET['id']){
       	//	$controller->getArticle($_GET['id']);
       	//}else {
       	//	$controller->getArticles();
       	//}
    //}
    //elseif((isset($_GET['action']) == 'article&id=?')){
    //	$controller->getArticle(isnumeric($_GET['id']));
     //  	$controller->getComments(isnumeric($_GET['articleid']));
    //}
//}
//else
//{
 //   $controller->getIndex();
//}


