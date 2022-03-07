<div class="containerCreateQuestions">
    <h1>Question Configuration</h1>
    <form action="<?=WEB_ROOT."/index.php"?>" method="post" id="formRegister">
        <input type="hidden" name="controller" value="question">
        <input type="hidden" name="action" value="create">   
        <input type="hidden" name="correct" value="">   
        <div class="question">
            <label for="question">Question</label>
            <textarea name="question" cols="70" rows="4" id="question"></textarea>
        </div>
        <div class="question">
            <label for="number_of_points">Score</label>
            <input type="number" name="number_of_points" id="number_of_points" min="1" max="100" >
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
        <div class="answers" id="answers">
            <div class="question">
                <label for="answer1">Answer</label>
                <input type="text" name="answer1" class="answer input">
                <input type="checkbox" name="answer1checkbox" id="answer1checkbox">
                <img src="img/ic-supprimer.png" alt="Delete" id="delete" style="cursor: not-allowed;" >
            </div>  
        </div>
         
        <input type="submit" value="Save" name="save_question" id="save_question" disabled>
    </form>
</div>

<script src="<?=WEB_PUBLIC."js".DIRECTORY_SEPARATOR."createQuestions.js"?>"></script>