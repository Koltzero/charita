<?php

/*
 * There is everything about connecting, used cookies and remember me
 */
class editation{
    
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
            printf("ready_for_edit");
            // location : admin/editation
        }
    }
    
    private function isLogged(){
        if(isset($_COOKIE["auth_me"]) && $_COOKIE["auth_me"] == "true"){
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
                    $result = TRUE;
                }
            }
        }
        return $result;
    }
    
    private function logIn(){
        $logIn = $this->getLogForm();
        if($logIn == TRUE){
            setcookie("auth_me","true",time()+216000);
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
        //$this->logIn();
    }
}
