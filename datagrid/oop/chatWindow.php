<?php

/*
 * Part of website which is created for placing asks 
 * Does NOT work as realtime communitation
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
    
    public function createWindow(){
        require_once("datagrid/forms/chatWindow.html");
    } 
}
