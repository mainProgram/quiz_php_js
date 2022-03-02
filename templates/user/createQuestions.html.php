<div class="containerCreateQuestions">
    <h1>Question Configuration</h1>
    <form action="<?=WEB_ROOT."/index.php"?>" method="post" id="formRegister">
        <input type="hidden" name="controller" value="question">
        <input type="hidden" name="action" value="create">   
        <div class="question">
            <label for="question">Question</label>
            <textarea name="question" id="" cols="70" rows="4" id="question"></textarea>
        </div>
        <div class="question">
            <label for="number_of_points">Score</label>
            <input type="number" name="number_of_points" id="number_of_points" min="1" max="100">
        </div>
        <div class="question">
            <label for="type_of_answer">Type of the answer</label>
            <select name="type_of_answer"  id="type_of_answer">
                <option value="null" selected disabled>Choose a type</option>
                <option value="one">One answer possible</option>
                <option value="many">Many answers possible</option>
                <option value="input">Input</option>
            </select>
        </div>
        <div class="question">
            <label for="answer1">Answer1</label>
            <input type="text" name="answer1" id="answer1">
            <input type="checkbox" name="answer1checkbox" id="answer1checkbox">
            <img src="img/ic-ajout-réponse.png" alt="Add">
            <img src="img/ic-supprimer.png" alt="Delete">
        </div>
        
        
        <input type="submit" value="Save">
    </form>
</div>