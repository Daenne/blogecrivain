<?php

require_once('controller/Controller.php');

$controller = new Controller();

if (isset($_GET['action'])) {
    //
    //transformer en switch
    //
    if ($_GET['action'] == '') {
        $controller->getIndex();
    } elseif((isset($_GET['action']) == 'article')){
        $controller->getArticle($_GET['id']);

    } elseif((isset($_GET['action']) == 'blog')){
        $controller->getArticles();
    }
}
else{
    $controller->getIndex();
}


//&& is_numeric($_GET['id']
