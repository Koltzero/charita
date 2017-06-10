<?php

/*
 * There is everything about connecting, used cookies and remember me
 */
class login extends flashMessages{
    
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
    
    public function __construct(){
        if($this->isLogged() == FALSE){
            $this->logIn();
        }
        else{
            $new_path = str_replace("/login.php","",$_SERVER["REQUEST_URI"]);
            header("Location:$new_path/logged.php");
        }
    }
        
    
    private function isLogged(){
        if(isset($_COOKIE["auth_me"]) && $_COOKIE["auth_me"] == "connected"){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    private function getLogForm(){
        require_once("datagrid/forms/logIn.php");
        $db = $this->loadDibi();
        $result = FALSE;
        if(isset($_POST["send"])){
            if(isset($_POST["username"]) && isset($_POST["password"])){
                $username = $_POST["username"];
                $password = $_POST["password"];
                if($db->fetch("SELECT * FROM users WHERE username = '$username' AND password = '$password'") == TRUE){
                    setcookie("username",$username,time()+210600);
                    $result = TRUE;
                }
            }
        }
        return $result;
    }
    
    private function logIn(){
        $logIn = $this->getLogForm();
        if($logIn == TRUE){
            setcookie("auth_me","connected",time()+216000);
            header("refresh:0");
            $this->isLogged();
        }
        else{
            $this->logInFailure();
        }
    }
    
    private function logInFailure(){
        $fm = new flashMessages;
        $fm->addMessage("Zadali jste špatné údaje, zkuste to prosím znovu!","danger");
        $fm->renderMessages();
    }
}
