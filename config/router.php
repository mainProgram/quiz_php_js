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
            default:
                echo "ERROR 404";
            break;
        }
    }else{
        require_once PATH_SRC."controllers/security.controller.php";
    }