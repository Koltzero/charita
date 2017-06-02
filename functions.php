<?php

class articles{
    private $dibi;
        
    private function loadDibi(){
        $database = $this->dibi = dibi::connect([
            'driver'   => 'mysqli',
            'host'     => MYSQL_HOSTNAME,
            'username' => MYSQL_USERNAME,
            'password' => MYSQL_PASSWORD,
            'database' => MYSQL_DATABASE,
        ]);
        return $database;
    }
    
    private function loadArticle($name){
            $database = $this->loadDibi();
            $article = $database->fetchAll("SELECT * FROM articles WHERE name = '$name'");
            foreach($article as $n => $rows){
                $data = [
                    "title" => $rows["title"],
                    "content" => $rows["content"],
                    "name" => $rows["name"],
                ];
            }
            return $data;
    }
    
    public function isAnyArticle(){
        $db = $this->loadDibi();
        $articles = $db->fetchAll("SELECT * FROM articles");
        if($articles){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function renderArticle($name){
            $article = $this->loadArticle($name);
            return $article;
        }
        
    public function renderAllArticles(){
            $database = $this->loadDibi();
            $articles = $database->fetchAll('SELECT * FROM articles WHERE 1');
            return $articles;
        }
    
}
class flashMessages{
    private $messages = [];

    public function addMessage($text,$type="info"){
        $this->messages[] = [
            "text" => $text,
            "type" => $type,
        ];
    }

    public function renderMessages(){
        foreach($this->messages as $message){
            printf('<div class="alert alert-%s">%s</div>',$message["type"],$message["text"]);
        }
    }        
}
    