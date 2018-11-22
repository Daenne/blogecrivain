<?php

require_once('controller/Controller.php');

$controller = new Controller();

try { 
    if (isset($_GET['action'])) {

      if ($_GET['action'] == 'login')
      {
        if ((isset($_POST['pseudo'])) AND (isset($_POST['password']))) 
        {
          if ((($_POST['pseudo']) == 'admin') AND (($_POST['password']) == 'Projet4administrati0n.')) 
          {
            $controller->getIndexAdmin();
          }
          else 
          { 
            throw new Exception('Pseudo et/ou mot de passe incorrect(s)');
            $controller->getLogin();
          }
        }
        else 
        {
          $controller->getLogin();
        }
        
        //$controller->getAdminConnexion(($_POST['pseudo']), ($_POST['password']));


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

//EN TRAVAUX

elseif($_GET['action'] == 'admin'){
          $controller->getIndexAdmin();
        }  
elseif($_GET['action'] == 'addArticle')
        {
            if (!empty($_POST['title']) && !empty($_POST['content'])) 
            {
              $controller->addArticle($_POST['title'], $_POST['content']);
            }
          else {
              throw new Exception('Tous les champs ne sont pas remplis !');
          }
        }
elseif($_GET['action'] == 'updateArticle')
        {
          if (isset($_GET['id']) && $_GET['id'] > 0) 
          {
            if(isset($_POST['title'], $_POST['content'])){
              if(!empty($_POST['title']) AND !empty($_POST['content']))
              {
                echo "coucou routeur";
                $controller->changeArticle($_GET['id'], $_POST['title'], $_POST['content']);
              }
              else {
                throw new Exception("Veuillez remplir tous les champs");
              }
            }else 
            {
              $controller->showArticle($_GET['id']);
                 
            }
          }
          else {
            throw new Exception('Aucun identifiant de billet envoyé');
          }
        }
elseif($_GET['action'] == 'deleteArticle')
        {
          if (isset($_GET['id']) && $_GET['id'] > 0) 
          {
            //echo "coucou routeur";
            $controller->stopArticle($_GET['id']);
            //$controller->getIndexAdmin();
          }
          else {
            throw new Exception('Aucun identifiant de billet envoyé');
          }
        }




      //Chemin pour s'authentifier PAS VALIDE POUR LE MOMENT
      elseif (isset($_SESSION['pseudo']))
      {
        echo 'Bonjour ' . $_SESSION['pseudo'];

        if($_GET['action'] == 'admin'){
          echo'coucou action admin';
          $controller->getIndexAdmin();
        }  
        //Chemin pour ajouter un article
        elseif($_GET['action'] == 'admin&amp;addArticle')
        {
          if (isset($_GET['id']) && $_GET['id'] > 0) 
          {
            if (!empty($_POST['title']) && !empty($_POST['content'])) 
            {
              $controller->addArticle($_POST['title'], $_POST['content']);
            }
            else {
              throw new Exception('Tous les champs ne sont pas remplis !');
            }
          }
          else {
            throw new Exception('Aucun identifiant de billet envoyé');
          }
        }
        //Chemin pour update un article
        elseif($_GET['action'] == 'admin&amp;updateArticle')
        {
          if (isset($_GET['id']) && $_GET['id'] > 0) 
          {
            $controller->getArticle($id);
          }
          else {
            throw new Exception('Aucun identifiant de billet envoyé');
          }
        }
        //Chemin pour delete un article
        elseif($_GET['action'] == 'admin&amp;deleteArticle')
        {
          if (isset($_GET['id']) && $_GET['id'] > 0) 
          {
            $controller->getArticle($_GET['id']);
          }
          else {
            throw new Exception('Aucun identifiant de billet envoyé');
          }
        }
      }
    }

        //else if ($_GET['action'] == 'login') {


          //$correctPseudo = $controller->idAdmin();
          //$correctPassWord = $controller->passwdAdmin();

        	//if (((isset($_POST['password'])) AND (($_POST['password']) ==  $correctPassWord)) AND ((isset($_POST['pseudo'])) AND (($_POST['pseudo']) == $correctPseudo))) {
        	//$controller->getIndexAdmin();

            
        	//}
        	//else {
        	//	throw new Exception('Pseudo et/ou mot de passe incorrect(s)');
        	//}
        //}

    else {
        $controller->getIndex();
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
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


