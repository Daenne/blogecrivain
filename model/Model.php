<?php

require_once('Connexion.php');

class Model extends Connexion {
    
    protected $db;

    public function __construct(){
        $this->db = $this->getDb();
    }

    //ADMIN

    public function adminConnexion ($pseudo, $password){
        $result = $this->db->prepare('SELECT pseudo, password FROM members WHERE id = 1');
        $result->execute(array($pseudo, $password));
        $result = $result->fetch();
        return $result;
    }

    //ARTICLE(S)
        //CREATE

    public function postArticle($title, $content){
        $article = $this->db->prepare('INSERT INTO articles(title, content, date_create, date_update) VALUES (?, ?, NOW(), NOW())');
        $newArticle = $article->execute(array($title, $content));
        return $newArticle;
    }
        //READ

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
        //UPDATE

    public function updateArticle ($id, $title, $content) {
        $request = $this->db->prepare('UPDATE articles SET title = ?, content = ?, date_update = NOW() WHERE id =' . $id);
        $updateArticle = $request->execute(array($title, $content));
        return $updateArticle;
    }    
        //DELETE

    public function deleteArticle ($id) {
        $request = $this->db->prepare('DELETE FROM articles WHERE id = :id');
        $request->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $deleteArticle = $request->execute();
        return $deleteArticle;
    }


    //COMMENTS
        //CREATE

    public function getAllComments(){
        $sql = 'SELECT * FROM comments ORDER BY warning DESC';
        $request = $this->db->query($sql);
        return $request;
    }

    public function getComments($id) {
        $comments = $this->db->prepare('SELECT id, articleid, author, content, DATE_FORMAT(date_create, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE articleid = ? ORDER BY date_create DESC');
        $comments->execute(array($id));
        return $comments;
    }
        //READ

    public function postComment($articleid, $author, $content) {
        $comments = $this->db->prepare('INSERT INTO comments(articleid, author, content, date_create, date_update, warning) VALUES (?, ?, ?, NOW(), NOW(), 0)');
        $affectedLines = $comments->execute(array($articleid, $author, $content));
        return $affectedLines;
    }
        //UPDATE

    public function warningComment($id){
        $request = $this->db->prepare('UPDATE comments SET warning = 1 WHERE id =' . $id);
        $updateComment = $request->execute();
        return $updateComment;
    }    
        //DELETE

    public function deleteComment ($id) {
        $request = $this->db->prepare('DELETE FROM comments WHERE id =:id');
        $request->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $deleteComment = $request->execute();
        return $deleteArticle;
    }

}