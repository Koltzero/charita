<?php
    spl_autoload_register(function ($class_name){
        require_once("datagrid/oop/$class_name.php");
    });