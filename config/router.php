<?php
// LE ROUTER PERMET DE CHARGER LES CONTROLLERS

    if(isset($_REQUEST["controller"])){
        switch($_REQUEST["controller"]){
            case "security":
                require_once PATH_SRC."controllers/security.controller.php";
            break;
            case "user":
                require_once PATH_SRC."controllers/user.controller.php";
            break;
            case "question":
                require_once PATH_SRC."controllers/question.controller.php";
            break;
            default:
                require_once PATH_VIEWS."security".DIRECTORY_SEPARATOR."error404.html.php";
            break;
        }
    }else{
        require_once PATH_SRC."controllers/security.controller.php";
    }