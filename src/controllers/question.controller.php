<?php
require_once PATH_SRC."models".DIRECTORY_SEPARATOR."question.model.php";

//TRAITEMENTS DES REQUETES POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["action"])){
        switch($_POST["action"]){
            case "create_questions":
                extract($_POST);
                if($type_of_answer == "input"){
                    $tab_answers = [strtolower(trim($answer1))];
                    $correct = strtolower(trim($answer1));
                }
                else {
                    $tab_answers = [strtolower(trim($answer1))];
                    if(isset($answer2)) 
                        $tab_answers[] = strtolower(trim($answer2));
                    if(isset($answer3)) 
                        $tab_answers[] = strtolower(trim($answer3));
                    if(isset($answer4)) 
                        $tab_answers[] = strtolower(trim($answer4));
                    $correct = $reponse;
                }
                save_question($question, $type_of_answer, $number_of_points, $tab_answers, $correct);
            break;
            default:
                require_once PATH_VIEWS."security".DIRECTORY_SEPARATOR."error404.html.php";
            break;
        }
    }
}

//TRAITEMENTS DES REQUETES GET
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_REQUEST["action"])){
        if(!is_admin()){
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
            default:
                require_once PATH_VIEWS."security".DIRECTORY_SEPARATOR."error404.html.php";
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

    // GESTION DE LA VALIDITÉ DE TOUS LES CHAMPS
    required_fields("question", $question, $errors);
    required_fields("score", $score, $errors);
    if(!isset($errors["score"]))
        if($score <= 0)
            is_length_correct("score", $score, $errors);
    for ($i=0; $i < count($answers); $i++) { 
        required_fields("answers", $answers[$i], $errors, "Fill all the inputs");
    }

    if(count($errors) == 0){
        $newRegistration = array(
            "question"=> $question,
            "score"=> $score,
            "type"=> $type,
            "correct"=> $correct,
            "answers"=> $answers
        );
        if(save_data("questions", $newRegistration)){
            $_SESSION["saved_question"] =  "Question saved !";
        }else{
            $_SESSION["not_saved_question"] =  "Question not saved !";
        }
        list_questions();
    }
    else{
        $_SESSION[KEY_ERRORS] = $errors;
        header("Location:".WEB_ROOT."?controller=question&action=create_questions");
    }
}
