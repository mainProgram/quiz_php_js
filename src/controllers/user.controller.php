<?php
require_once PATH_SRC."models".DIRECTORY_SEPARATOR."user.model.php";

//TRAITEMENTS DES REQUETES POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["action"])){

    }
}

//TRAITEMENTS DES REQUETES GET
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_REQUEST["action"])){
        switch($_REQUEST["action"]){
            case "home":
                if(is_admin())
                    list_players();
                elseif(is_player())
                    game();
                else{
                    header("Location:".WEB_ROOT);exit();
                }
            break;
            case "list_players":
                if(is_admin())
                    list_players();
                else{
                    header("Location:".WEB_ROOT);exit();
                }
            break;
            case "create_admin":
                if(is_admin())
                    create_admin();
                else{
                    header("Location:".WEB_ROOT);exit();
                }
            break;
            case "create_player":
                create_player();
            break;
            default:
                require_once PATH_VIEWS."security".DIRECTORY_SEPARATOR."error404.html.php";
            break;
        }
    }
    else{
        require_once PATH_VIEWS."security".DIRECTORY_SEPARATOR."connection.html.php";
    }
}

function list_players(){
    //BUFFER pour stocker un flux temporairement
    ob_start();
        // Appel du model
        $data = get_all_players(ROLE_PLAYER);
        require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."listPlayers.html.php");
    $content_for_views = ob_get_clean();

    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."home.html.php");
}

function create_admin(){
    ob_start();
        require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."register.html.php");
    $content_for_views = ob_get_clean();

    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."home.html.php");
}

function create_player(){
    ob_start();
        require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."register.html.php");
    $content_for_views = ob_get_clean();

    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."home_player.html.php");
}

function game(){
    //BUFFER pour stocker un flux temporairement
    ob_start();
        require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."game.html.php");
    $content_for_views = ob_get_clean();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."home_player.html.php");
}