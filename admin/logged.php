<?php
    if($_COOKIE["auth_me"] != "connected"){
        $new_path = str_replace("/logged.php","",$_SERVER["REQUEST_URI"]);
        header("Location:$new_path/login.php");
    }
    require_once("init.php");
    $edit = new editation();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../source/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../source/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="../source/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="menu col-xs-2">
                    <img src="datagrid/img/logo.png"/>
                    <div class="navbar col-xs-12">
                        <a class="nav-link col-xs-12"><li class="nav-item col-xs-12">Page</li></a>
                        <a class="nav-link col-xs-12"><li class="nav-item col-xs-12">Page</li></a>
                        <a class="nav-link col-xs-12"><li class="nav-item col-xs-12">Page</li></a>
                    </div>
                </div>
                <div class="head col-xs-10">
                    <div class="col-xs-6 head-location">
                        <i class="fa fa-2x fa-desktop"></i>
                        <?php
                            if(isset($_GET["page"])){
                                $page = $_GET["page"];
                            }
                            else{
                                $page = "Homepage";
                            }
                            printf("Edit/<b>".$page."</b>");
                        ?>
                    </div>
                    <div class="col-xs-2 offset-xs-2 head-user">
                        <b>
                            <i class="fa fa-2x fa-user" aria-hidden="true"></i>
                            <?php
                                echo $_COOKIE["username"];
                            ?>
                        </b>
                    </div>
                    <div class="col-xs-2 head-logOut">
                        <form method="post">
                            <input value="Odhlásit se" name="logOut" type="submit" class="btn btn-primary"/>
                        </form>
                        <?php
                            if(isset($_POST["logOut"])){
                                unset($_COOKIE["auth_me"]);
                                $new_path = str_replace("/admin/logged.php","",$_SERVER["REQUEST_URI"]);
                                header("Location:$new_path/index.php");
                            }
                        ?>
                    </div>
                </div>
                <div class="fast-bar col-xs-10">
                    fast-bar
                </div>
                <div class="render col-xs-10">
                    <div class="row">
                        <div class="render-title col-xs-12">Články</div>
                        <?php
                            $edit->render($page);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
