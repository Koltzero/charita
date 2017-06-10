<?php

/*
 * There is everything about editation and working with articticles across database
 * Changing passwords, adding users in administrator mode
 * Changing global informations as title, email, tel. number, location and much more.
 * Creating new navigation is in developing
 */

class editation extends flashMessages{
    
    private function loadDibi(){
        $db = new Dibi\Connection([
            'driver'   => 'mysqli',
            'host'     => MYSQL_HOSTNAME,
            'username' => MYSQL_USERNAME,
            'password' => MYSQL_PASSWORD,
            'database' => MYSQL_DATABASE
        ]);
        return $db;
    }
    
    public function render($page){
        // domovská stránka
        if($page == "Homepage"){echo"<style>.render{display:none;}</style>";}
        // editace článků
        if($page == "Articles"){$this->articles();}
        // změna hesla
        if($page == "Account"){$this->account();}
    }
    
    // loading all existing articles
    private function articles(){
        $db = $this->loadDibi();
        $articles = $db->fetchAll("SELECT * FROM articles WHERE 1");
        foreach($articles as $article){
            printf('<a href="logged.php?page=Articles&article=%s">%s</a>',$article["id"],$article["title"]);
        }
    // load article's ID in URL
        if(isset($_GET["article"])){
            $id = $_GET["article"];
            $searched = $db->fetch("SELECT * FROM articles WHERE id = '$id'");
            // generate inputs from form for editation
        }
    }
}