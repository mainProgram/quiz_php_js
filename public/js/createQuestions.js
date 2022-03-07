const addRadio = document.getElementById("addRadio");
const addCheckbox = document.getElementById("addCheckbox");
const remove = document.getElementById("delete");
const question = document.getElementById("question");
const answers = document.getElementById("answers");
const type_of_answer = document.getElementById("type_of_answer");
const save_question = document.getElementById("save_question");
const number_of_points = document.getElementById("number_of_points");
const array = [number_of_points, question]
    // ----------------------------------EVENTS
type_of_answer.addEventListener("change", () => {
    if (type_of_answer.value == "one") {
        addRadio.removeAttribute("hidden")
        addCheckbox.setAttribute("hidden", "hidden")
        answers.innerHTML = `<div class="question">
                                <label for="answer1">Answer</label>
                                <input type="text" name="answer1" class="answer input">
                                <input type="radio" name="radio" id="answer1radio">
                                <img src="img/ic-supprimer.png" alt="Delete" id="delete"  style="cursor: not-allowed;">
                            </div>  `
    } else if (type_of_answer.value == "many") {
        addCheckbox.removeAttribute("hidden")
        addRadio.setAttribute("hidden", "hidden")
        answers.innerHTML = `<div class="question">
                                <label for="answer1">Answer</label>
                                <input type="text" name="answer1" class="answer input">
                                <input type="checkbox" name="answer1checkbox" id="answer1checkbox">
                                <img src="img/ic-supprimer.png" alt="Delete" id="delete"  style="cursor: not-allowed;">
                            </div>  `
    } else {
        div = document.createElement("div");
        div.setAttribute("class", "question");
        div.style.marginTop = "5%"
        div.style.marginLeft = "14.5%"

        input = document.createElement("input");

        input.setAttribute("class", "answer");
        input.classList.add("input");

        div.appendChild(input)

        answers.innerHTML = ""
        answers.appendChild(div)

        addCheckbox.setAttribute("hidden", "hidden")
        addRadio.setAttribute("hidden", "hidden")
    }
    var allInputs = document.querySelectorAll(".input");

    for (let index = 0; index < allInputs.length; index++) {
        allInputs[index].addEventListener("input", () => { verif() })
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
        input.classList.add("input");

        inputCheckbox = document.createElement("input");
        inputCheckbox.setAttribute("type", "checkbox");
        inputCheckbox.setAttribute("id", id + "checkbox");
        inputCheckbox.setAttribute("name", id + "checkbox");


        div.appendChild(label);
        div.appendChild(input);
        div.appendChild(inputCheckbox);
        div.innerHTML += ` <img src="img/ic-supprimer.png" alt="Delete" onclick=removeInput("answer"+${i})>`

        answers.appendChild(div);

        save_question.setAttribute("disabled", "disabled")

        var allInputs = document.querySelectorAll(".input");
        for (let index = 0; index < allInputs.length; index++) {
            allInputs[index].addEventListener("input", () => { verif() })
        }
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
        input.classList.add("input");

        inputRadio = document.createElement("input");
        inputRadio.setAttribute("type", "radio");
        inputRadio.setAttribute("id", id + "radio");
        inputRadio.setAttribute("name", "radio");

        div.appendChild(label);
        div.appendChild(input);
        div.appendChild(inputRadio);
        div.innerHTML += ` <img src="img/ic-supprimer.png" alt="Delete" onclick=removeInput("answer"+${j})>`

        answers.appendChild(div);

        save_question.setAttribute("disabled", "disabled")

        var allInputs = document.querySelectorAll(".input");
        for (let index = 0; index < allInputs.length; index++) {
            allInputs[index].addEventListener("input", () => { verif() })
        }
    }
});

question.addEventListener("input", () => { verif() })

number_of_points.addEventListener("input", () => { verif() })

var allInputs = document.querySelectorAll(".input");

for (let index = 0; index < allInputs.length; index++) {
    allInputs[index].addEventListener("input", () => { verif() })
}


//--------------------------------------------------------FUNCTIONS
function removeInput(id) {
    inputToDelete = document.getElementById(id);
    inputToDelete.parentElement.style.opacity = "0.4";
    setTimeout("inputToDelete.parentElement.remove()", 300);
}

function isFieldEmpty3(array) {
    var bool = true;
    for (let index = 0; index < array.length; index++)
        if (array[index].value.trim() == "") {
            showError3(array[index])
            bool = false;
        } else
            showSuccess3(array[index])
    return bool;
}

function showSuccess3(data) {
    data.classList.add("success");
}

function showError3(data) {
    data.classList.remove("success");
}

function verif() {
    let allInputs = document.querySelectorAll(".input");
    let results = isFieldEmpty3(array) + isFieldEmpty3(allInputs);
    if (results == 2) {
        save_question.removeAttribute("disabled")
    } else
        save_question.setAttribute("disabled", "disabled")
}