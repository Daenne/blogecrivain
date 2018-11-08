<?php

require_once('controller/Controller.php');

$controller = new Controller();

try { // On essaie de faire des choses
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'blog') {
            $controller->getIndex();
        }
        elseif ($_GET['action'] == 'article') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $controller->getArticle($_GET['id']);
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['content'])) {

                    $controller->addComment($_GET['id'], $_POST['author'], $_POST['content']);
                }
                else {
                    // Autre exception

                   throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                // Autre exception
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
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


