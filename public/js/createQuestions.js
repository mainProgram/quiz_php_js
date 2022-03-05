const addRadio = document.getElementById("addRadio");
const addCheckbox = document.getElementById("addCheckbox");
const remove = document.getElementById("delete");
const question = document.getElementById("question");
const answers = document.getElementById("answers");
const type_of_answer = document.getElementById("type_of_answer");


// ----------------------------------EVENTS
type_of_answer.addEventListener("change", () => {
    if (type_of_answer.value == "one") {
        addRadio.removeAttribute("hidden")
        addCheckbox.setAttribute("hidden", "hidden")
        answers.innerHTML = `<div class="question">
                                <label for="answer1">Answer</label>
                                <input type="text" name="answer1" class="answer">
                                <input type="radio" name="radio" id="answer1radio">
                                <img src="img/ic-supprimer.png" alt="Delete" id="delete">
                            </div>  `
    } else if (type_of_answer.value == "many") {
        addCheckbox.removeAttribute("hidden")
        addRadio.setAttribute("hidden", "hidden")
        answers.innerHTML = `<div class="question">
                                <label for="answer1">Answer</label>
                                <input type="text" name="answer1" class="answer">
                                <input type="checkbox" name="answer1checkbox" id="answer1checkbox">
                                <img src="img/ic-supprimer.png" alt="Delete" id="delete">
                            </div>  `
    } else {
        div = document.createElement("div");
        div.setAttribute("class", "question");
        div.style.marginTop = "5%"
        div.style.marginLeft = "14.5%"

        input = document.createElement("input");

        input.setAttribute("class", "answer");

        div.appendChild(input)

        answers.innerHTML = ""
        answers.appendChild(div)

        addCheckbox.setAttribute("hidden", "hidden")
        addRadio.setAttribute("hidden", "hidden")
    }
})



let i = 1;
addCheckbox.addEventListener("click", () => {
    i++;
    allAnswers = document.getElementsByClassName("answer");

    if (allAnswers.length < 4) {

        id = "answer" + i;

        div = document.createElement("div");
        div.setAttribute("class", "question");

        label = document.createElement("label");
        label.setAttribute("for", id);
        label.innerHTML = "Answer";

        input = document.createElement("input");
        input.setAttribute("name", id);
        input.setAttribute("id", id);
        input.setAttribute("class", "answer");

        inputCheckbox = document.createElement("input");
        inputCheckbox.setAttribute("type", "checkbox");
        inputCheckbox.setAttribute("id", id + "checkbox");
        inputCheckbox.setAttribute("name", id + "checkbox");


        div.appendChild(label);
        div.appendChild(input);
        div.appendChild(inputCheckbox);
        div.innerHTML += ` <img src="img/ic-supprimer.png" alt="Delete" onclick=removeInput("answer"+${i})>`

        answers.appendChild(div);
    }
});

let j = 1;

addRadio.addEventListener("click", () => {
    j++;
    allAnswers = document.getElementsByClassName("answer");

    if (allAnswers.length < 4) {

        id = "answer" + j;

        div = document.createElement("div");
        div.setAttribute("class", "question");

        label = document.createElement("label");
        label.setAttribute("for", id);
        label.innerHTML = "Answer";

        input = document.createElement("input");
        input.setAttribute("name", id);
        input.setAttribute("id", id);
        input.setAttribute("class", "answer");

        inputRadio = document.createElement("input");
        inputRadio.setAttribute("type", "radio");
        inputRadio.setAttribute("id", id + "radio");
        inputRadio.setAttribute("name", "radio");

        div.appendChild(label);
        div.appendChild(input);
        div.appendChild(inputRadio);
        div.innerHTML += ` <img src="img/ic-supprimer.png" alt="Delete" onclick=removeInput("answer"+${j})>`

        answers.appendChild(div);
    }
});

function removeInput(id) {
    inputToDelete = document.getElementById(id);
    setTimeout("inputToDelete.parentElement.remove()", 300);
}