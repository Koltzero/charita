<?php
    require_once("init.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="source/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="source/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="source/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <link href="css/resizeable.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
    </head>
    <body>
        <?php
            $chat = new chatWindow();
            $chat->createWindow();
        ?>
    </body>
</html>
