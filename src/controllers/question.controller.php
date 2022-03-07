<?php
    require_once PATH_SRC."models".DIRECTORY_SEPARATOR."question.model.php";

//TRAITEMENTS DES REQUETES POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["action"])){
        switch($_POST["action"]){
            case "create":
                extract($_POST);
                // var_dump($_POST);die();
                if($type_of_answer == "input"){
                    $tab_answers = [$answer1];
                    $correct = $answer1;
                    save_question($question, $type_of_answer, $number_of_points, $tab_answers, $correct);
                }
                else 
                    echo "hi";
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
        if(!is_connect()){
            header("Location:".WEB_ROOT);
            exit(); 
        }
        switch($_REQUEST["action"]){
            case "list_questions":
                list_questions();
            break;           
            case "create_questions":
                create_questions();
            break;
            case "create":
                
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
    
function save_question(string $question,string $type, string $score, array $answers, $correct){
    $errors = [];

    required_fields("question", $question, $errors);
    required_fields("score", $score, $errors);
    for ($i=0; $i < count($answers); $i++) { 
        required_fields("answers", $answers[$i], $errors);
    }
    required_fields("correct", $correct, $errors);

    if(count($errors) == 0){
        echo "No error";
    }
    else{
        echo "errors";
    }
}
