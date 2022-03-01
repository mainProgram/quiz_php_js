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
        if(!is_connect()){
            header("Location:".WEB_ROOT);
            exit();
        }
        switch($_REQUEST["action"]){
            case "home":
                if(is_admin())
                    list_players();
                else
                    game();
            break;
            case "list_players":
                list_players();
            break;
            default:
                echo "ERROR 404";
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

function game(){
    //BUFFER pour stocker un flux temporairement
    ob_start();

    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."game.html.php");
    $content_for_views = ob_get_clean();

    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."home.html.php");
}