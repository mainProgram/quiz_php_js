<?php 
    if(isset($_SESSION[KEY_ERRORS])){
        $errors = $_SESSION[KEY_ERRORS];
        unset($_SESSION[KEY_ERRORS]);
    }
?>
<div class="containerCreateQuestions">
    <h1>Question Configuration</h1>
    <form action="" method="post" id="formRegister">
        <input type="hidden" name="controller" value="question">
        <input type="hidden" name="action" value="create_questions">   
        <input type="hidden" name="correct" value=""> 
        <?php 
            if(isset($_SESSION["saved_question"])){   
                echo "<h2 style='color:green;'>".$_SESSION["saved_question"]."</h2>"; 
                unset($_SESSION["saved_question"]); 
            }
        ?>
        <?php 
            if(isset($_SESSION["not_saved_question"])){   
                echo "<h2 style='color:green;'>".$_SESSION["not_saved_question"]."</h2>"; 
                unset($_SESSION["not_saved_question"]); 
            }
        ?>
        <small><?php if(isset($errors["question"])) echo "<p>".$errors["question"]."</p>" ?></small>
        <div class="question">
            <label for="question">Question</label>
            <textarea name="question" cols="70" rows="4" id="question"></textarea>
        </div>

        <small><?php if(isset($errors["score"])) echo "<p>".$errors["score"]."</p>" ?></small>
        <div class="question">
            <label for="number_of_points">Score [1-1000]</label>
            <input type="text" name="number_of_points" id="number_of_points"  value="1" >
            <span id="plus">+1</span>
            <span id="moins" class="disabled">-1</span>
        </div>

        <div class="question">
            <label for="type_of_answer">Type of the answer</label>
            <select name="type_of_answer"  id="type_of_answer">
                <option value="many">Many answers possible</option>
                <option value="one">One answer possible</option>
                <option value="input">Input</option>
            </select>
        </div>
        <img src="img/ic-ajout-réponse.png" alt="Add" id="addRadio" hidden>
        <img src="img/ic-ajout-réponse.png" alt="Add" id="addCheckbox">

        <small><?php if(isset($errors["answers"])) echo "<p>".$errors["answers"]."</p>" ?></small>
        <div class="answers" id="answers">
            <div class="question">
                <label for="answer1">Answer 1</label>
                <input type="text" name="answer1" class="answer input">
                <input type="checkbox" name="reponse[]" id="answer1checkbox" value="1">
                <img src="img/ic-supprimer.png" alt="Delete" id="delete" style="cursor: not-allowed;" >
            </div>  
        </div>
         
        <input type="submit" value="Save" name="save_question" id="save_question" > 
    </form>
</div>

<script src="<?=WEB_PUBLIC."js".DIRECTORY_SEPARATOR."createQuestions.js"?>"></script>


