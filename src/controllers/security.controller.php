<?php
require_once PATH_SRC."models".DIRECTORY_SEPARATOR."user.model.php";

//TRAITEMENTS DES REQUETES POST
if($_SERVER["REQUEST_METHOD"] == "POST"){ 
    if(isset($_REQUEST["action"])){
        switch($_REQUEST["action"]){
            case "connection":
                $login = $_POST["login"];
                $password = $_POST["password"];
                connection($login, $password);
            break;
            case "register":
                extract($_POST);
                register($login2, $password, $password2, $lastname, $firstname, $role, $file);
            break;
            default:
                echo "ERROR 404";
            break;
        }
    }
}

//TRAITEMENTS DES REQUETES GET
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_REQUEST["action"])){
        switch($_REQUEST["action"]){
            case "connection":
                header("Location:".PATH_VIEWS."security".DIRECTORY_SEPARATOR."connection.html.php");
            break;
            case "logout":
                logout();
            break;
            case "register":
                unset($_SESSION["login"]);
                require_once PATH_VIEWS."security".DIRECTORY_SEPARATOR."register.html.php";
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

function connection(string $login, string $password){
    $errors = [];
    $_SESSION["login"] = $login;
    required_fields("login", $login, $errors);
    required_fields("password", $password, $errors);

    if(!isset($errors["login"]))
        is_mail_valid("login", $login, $errors);

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

function register(string $login2, string $password, string $password2, string $lastname, string $firstname, string $role, $file){
    $errors = [];
    $tab = find_data("users");

    $_SESSION["login2"] = $login2;
    $_SESSION["lastname"] = $lastname;
    $_SESSION["firstname"] = $firstname;
    $_SESSION["file"] = $file;

    required_fields("login2", $login2, $errors);
    required_fields("password", $password, $errors);
    required_fields("password2", $password2, $errors);
    required_fields("lastname", $lastname, $errors);
    required_fields("firstname", $firstname, $errors);
    // required_fields("file", $file, $errors);

    if(!isset($errors["login2"])){
        is_mail_valid("login2", $login2, $errors);
        is_mail_already_used("login2", $login2, $tab, $errors);
    }

    if(!isset($errors["firstname"]))
        is_name_valid("firstname", $firstname, $errors);

    if(!isset($errors["lastname"]))
    is_name_valid("lastname", $lastname, $errors);

    if(!isset($errors["password"]))
        valid_password("password", $password, $errors);

    if(!isset($errors["password2"]))
        are_passwords_the_same("incorrectPassword", $password, $password2, $errors);

    if(count($errors) == 0){
        $newRegistration = array(
            "lastName"=> strtoupper($lastname),
            "firstName"=> ucwords($firstname),
            "login"=> $login2,
            "password"=> $password,
            "role"=> $role,
            "score"=> 0 
        );
        if(save_data("users", $newRegistration)){
            unset($_SESSION["login2"]); unset($_SESSION["lastname"]); unset($_SESSION["firstname"]);unset($_SESSION["file"]);
            header("Location:".WEB_ROOT);
        }else{
            header("Location:".WEB_ROOT."?controller=security&action=register&pasbon=pasbon");
        }
    }
    else{
        $_SESSION[KEY_ERRORS] = $errors;
        header("Location:".WEB_ROOT."?controller=security&action=register");
    }
}