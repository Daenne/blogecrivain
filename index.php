<?php

require_once('controller/Controller.php');

$controller = new Controller();

if (isset($_GET['action'])) {
//	switch ($_GET['action']) {
//		case '':
//			$controller->getIndex();
//			break;
//		case 'blog':
//			$controller->getArticles();
//			break;
//		case 'article':
//			$controller->getArticle(isnumeric($_GET['id']));
//			break;
//		default:
//			$controller->getIndex();
//			break;
//	}
    if ($_GET['action'] == '') {
        $controller->getIndex();
    }
    elseif((isset($_GET['action']) == 'blog')){
        $controller->getArticles();
    }
    elseif((isset($_GET['action']) == 'article')){
       	$controller->getArticle(isnumeric($_GET['id']));
       	//$controller->getComments(isnumeric($_GET['articleid']));
    }
    elseif((isset($_GET['action']) == 'article&id=?')){
    	$controller->getArticle(isnumeric($_GET['id']));
       	$controller->getComments(isnumeric($_GET['articleid']));
    }
}
else
{
    $controller->getIndex();
}


