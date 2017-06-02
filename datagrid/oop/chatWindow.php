<?php

/*
 * Part of website which is created for placing asks 
 * Does NOT work as realtime communitation
 */

/* 
 * HOW DOES IT WORKS?
 * - load inputs from chatWindow.html which is submited
 * - control if requirements are fulfilled
 * - send to database and clear memory about inputs to avoid multiple-sends
 */
class chatWindow {
    
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
    
    private function checkForm(){
        if(isset($_POST["nickname"]) && count($_POST["nickname"]) <= 50){
            if(isset($_POST["title"]) && count($_POST["title"]) <= 100){
                if(isset($_POST["query"]) && count($_POST["query"]) <= 3000){
                    $this->sendMessage();
                }
            }
        }
    }
    
    private function sendMessage(){
        $db = $this->loadDibi();
        $nick = $_POST["nickname"];
        $title = $_POST["title"];
        $query = $_POST["query"];
        $date = date("Y")."-".date("m")."-".date("d");
        if(isset($nick) && isset($title) && isset($query)){
            $db->test("INSERT INTO messages (author,title,content,date) VALUES ('$nick','$title','$query','$date')");
        }
        $nick = "";
        $title = "";
        $query = "";
        $date = "";
        $_POST = array();
        header("Refresh:0");
        $fm = new flashMessages;
        $fm->addMessage("Zpráva byla úspěšně odeslána","success");
    }
    
    public function createWindow(){
        require_once("datagrid/forms/chatWindow.html");
        if(isset($_POST["send"])){
            $this->checkForm();
        }
    }
    
}
