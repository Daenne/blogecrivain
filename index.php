<?php

require_once('controller/Controller.php');

$controller = new Controller();

try { // On essaie de faire des choses
    if (isset($_GET['action'])) {
        //if ($_GET['action'] == 'blog') {
        //    $controller->getIndex();
        //}
        if ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['content'])) {
                	
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
        elseif ($_GET['action'] == 'article') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $controller->getArticle($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        //else if ($_GET['action'] == 'login') {
        //	if ((isset($_POST['password'])) AND (($_POST['password']) ==  "kangourou")) AND (isset($_POST['pseudo'])) AND (($_POST['pseudo']) == "admin"));
        //		$controller->getIndexAdmin();
        //	}
        //	else {
        //		throw new Exception('Pseudo et/ou mot de passe incorrect(s)');
        //	}
        //}
    }
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


