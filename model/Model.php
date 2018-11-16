<?php

require_once('Connexion.php');

class Model extends Connexion {
    protected $db;

    public function __construct(){
        $this->db = $this->getDb();
    }

    //METHODES POUR CHERCHER ID ET MDP

    public function adminConnexion ($pseudo, $password){
        $request = $this->$db->prepare('SELECT pseudo, password FROM members WHERE id = 1');
        $request->execute(array($pseudo, $password));
        $result = $request->fetch();

        return $result;

    }

    //public function getAdminId(){
    //    $request = $this->db->prepare('SELECT pseudo FROM members WHERE id = 1');
    //    $request->execute();
    //    return $request;

    //}

    //public function getAdminPW(){
    //    $request = $this->db->prepare('SELECT password FROM members WHERE id = 1');
    //    $request->execute();
    //    return $request;

    //}

    //METHODES AFFICHAGE ARTICLE(s)

    public function getArticles()
    {
        $sql = 'SELECT * FROM articles ORDER BY id DESC';
        $request = $this->db->query($sql);

        return $request;
    }

    public function getArticle($id){
        $request = $this->db->prepare('SELECT * FROM articles WHERE id = :id');
        $request->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $request->execute();
        return $request;
    }

    //METHODES QUI INFLUENT SUR UN ARTICLE

    //Méthode pour ajouter un article
    public function postArticle($id, $title, $content){
        $article = $this->db->prepare('INSERT INTO articles(id, title, content, date_create, date_update) VALUES (?, ?, ?, NOW(), NOW())');
        $newArticle = $article->execute(array($id, $title, $content));
        return $newArticle;
    }

    //Méthode pour modifier un article
    public function updateArticle ($id) {
        $article = $this->db->prepare('UPDATE articles SET title = ?, content = ?, date_update = NOW() WHERE id = ?');
        $updateArticle = $article->execute(array($id));
        return $updateArticle;
    }

    //Méthode pour supprimer un article
    public function deleteArticle ($id) {
        $article = $this->db->prepare('DELETE FROM articles WHERE id = ?');
        $deleteArticle = $article->execute(array($id));
        return $deleteArticle;
    }

    //METHODES POUR LES COMMENTAIRES

    public function getComments($id) {
        $comments = $this->db->prepare('SELECT id, articleid, author, content, DATE_FORMAT(date_create, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE articleid = ? ORDER BY date_create DESC');
        $comments->execute(array($id));
        return $comments;
    }

    public function postComment($articleid, $author, $content) {
        $comments = $this->db->prepare('INSERT INTO comments(articleid, author, content, date_create, date_update) VALUES (?, ?, ?, NOW(), NOW())');
        $affectedLines = $comments->execute(array($articleid, $author, $content));
        return $affectedLines;
    }
}