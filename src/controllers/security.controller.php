<?php
require_once PATH_SRC."models".DIRECTORY_SEPARATOR."user.model.php";

//TRAITEMENTS DES REQUETES POST
if($_SERVER["REQUEST_METHOD"] == "POST"){ 
    if(isset($_REQUEST["action"])){
        if($_REQUEST["action"] == "connection"){
            // var_dump($_POST["login"]);die;
            // extract($_POST);
            $login = $_POST["login"];
            $password = $_POST["password"];
            connection($login, $password);
        }
    }
}

//TRAITEMENTS DES REQUETES GET
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_REQUEST["action"])){
        if($_REQUEST["action"] == "connection"){
            header("Location:".PATH_VIEWS."security".DIRECTORY_SEPARATOR."connection.html.php");
        }
        elseif($_REQUEST["action"] == "logout"){
            logout();
        }
        elseif($_REQUEST["action"] == "register"){
            require_once PATH_VIEWS."security".DIRECTORY_SEPARATOR."register.html.php";
        }
    }
    else{
        require_once PATH_VIEWS."security".DIRECTORY_SEPARATOR."connection.html.php";
    }
}

function connection(string $login, string $password){
    $errors = [];
    $_SESSION["login"] = $login;
    required_fields("login", $login, $errors);
    if(!isset($errors["login"]))
        valid_mail("login", $login, $errors);

    required_fields("password", $password, $errors);
    if(!isset($errors["password"]))
        valid_password("password", $password, $errors);

    if(count($errors) == 0){
        $userConnect = find_user_login_and_password($login, $password);
        if(count($userConnect) != 0){
            unset($_SESSION["login"]);
            $_SESSION[KEY_USER_CONNECT] = $userConnect;
            header("Location:".WEB_ROOT."?controller=user&action=home");
        }
        else{
            $errors["connection"] = "Invalid login or password !";
            $_SESSION[KEY_ERRORS] = $errors;
            header("Location:".WEB_ROOT);
        }
    }
    else{
        $_SESSION[KEY_ERRORS] = $errors;
        header("Location:".WEB_ROOT);
    }
}

function logout(){
    $_SESSION[KEY_USER_CONNECT] = array();
    unset($_SESSION[KEY_USER_CONNECT]);
    session_destroy();
    header("Location:".WEB_ROOT);
    exit();
}