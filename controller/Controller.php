<?php

require_once('./model/Model.php');

class Controller
{
    protected $modelArticle;

    function __construct()
    {
        $this->modelArticle = new Model();
    }

    public function getIndex()
    {

        $articlesList = $this->modelArticle->getEpisodes();

        require('./view/indexView.php');
    }

    public function getArticles()
    {
        $articlesList = $this->modelArticle->getEpisodes();

        require('./view/listArticlesView.php');
    }

    public function getArticle($id){
        $article = $this->modelArticle->getEpisode($id);
        $article = $article->fetch();
        require('./view/articleView.php');
    }
}