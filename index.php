<?php
    if(isset($_SERVER["PATH_INFO"]) && $_SERVER["PATH_INFO"] == "/admin"){
        $new_path = str_replace("/index.php","",$_SERVER["REQUEST_URI"]);
        header("Location:$new_path/login.php");
    }
    require_once("init.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="source/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="source/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="source/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="css/resizeable.css" rel="stylesheet">
        <link href="css/googleMap.css" rel="stylesheet">        
        <link href="css/chatWindow.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
    </head>
    <body id="body">
        <?php
            $chat = new chatWindow();
            $chat->createWindow();
            $fm->renderMessages();
        ?> 
        
        
    </body>
</html>
