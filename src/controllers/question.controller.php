<?php
    require_once PATH_SRC."models".DIRECTORY_SEPARATOR."question.model.php";

//TRAITEMENTS DES REQUETES POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["action"])){

    }
}

//TRAITEMENTS DES REQUETES GET
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_REQUEST["action"])){
        // if(!is_connect()){
        //     header("Location:".WEB_ROOT);
        //     exit(); 
        // }
        switch($_REQUEST["action"]){
            case "list_questions":
                list_questions();
            break;           
            case "create_questions":
                create_questions();
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

function list_questions(){
    ob_start();
        $questions = find_data("questions");
        require_once(PATH_VIEWS."question".DIRECTORY_SEPARATOR."listeQuestions.html.php");
    $content_for_views = ob_get_clean();

    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."home.html.php");
}

function create_questions(){
    ob_start();
        require_once(PATH_VIEWS."question".DIRECTORY_SEPARATOR."createQuestions.html.php");
    $content_for_views = ob_get_clean();

    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."home.html.php");
}
    
