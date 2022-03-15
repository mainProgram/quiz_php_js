const formRegister = document.getElementById("formRegister");
const addRadio = document.getElementById("addRadio");
const addCheckbox = document.getElementById("addCheckbox");
const remove = document.getElementById("delete");
const question = document.getElementById("question");
const answers = document.getElementById("answers");
const type_of_answer = document.getElementById("type_of_answer");
const save_question = document.getElementById("save_question");
const number_of_points = document.getElementById("number_of_points");
const plus = document.getElementById("plus");
const moins = document.getElementById("moins");
const array = [number_of_points, question]
// ----------------------------------EVENTS
plus.addEventListener("click", ()=>{
    num = Number(number_of_points.value) 
    if(num < 1001){
        number_of_points.value = num + 1
        moins.removeAttribute("class")
        if(num+1 == 1001){
            plus.setAttribute("class", "disabled")
        }
    }
});

moins.addEventListener("click", ()=>{
    num = Number(number_of_points.value)
    if(num > 1){
        number_of_points.value = num - 1
        plus.removeAttribute("class")
        if(num-1 == 1){
            moins.setAttribute("class", "disabled")
        }
    }
});

type_of_answer.addEventListener("change", () => {
    save_question.setAttribute("disabled", "disabled")
    if (type_of_answer.value == "one") {
        addRadio.removeAttribute("hidden")
        addCheckbox.setAttribute("hidden", "hidden")
        answers.innerHTML = `<div class="question">
                                <label for="answer1">Answer</label>
                                <input type="text" name="answer1" class="answer input">
                                <input type="radio" name="reponse[]" id="answer1radio" value="1">
                                <img src="img/ic-supprimer.png" alt="Delete" id="delete"  style="cursor: not-allowed;">
                            </div>  `
    } else if (type_of_answer.value == "many") {
        addCheckbox.removeAttribute("hidden")
        addRadio.setAttribute("hidden", "hidden")
        answers.innerHTML = `<div class="question">
                                <label for="answer1">Answer</label>
                                <input type="text" name="answer1" class="answer input">
                                <input type="checkbox" name="reponse[]" id="answer1checkbox" value="1">
                                <img src="img/ic-supprimer.png" alt="Delete" id="delete"  style="cursor: not-allowed;">
                            </div>  `
    } else {
        div = document.createElement("div");
        div.setAttribute("class", "question");
        div.style.marginTop = "5%"
        div.style.marginLeft = "14.5%"

        input = document.createElement("input");

        input.setAttribute("name", "answer1");
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

    var allCheckboxes = Array.from(document.querySelectorAll("input[type='checkbox']"))
    for (let index = 0; index < allCheckboxes.length; index++) {
        allCheckboxes[index].addEventListener("change", () => { verif() })
    }

    var allRadios = Array.from(document.querySelectorAll("input[type='radio']"))
    for (let index = 0; index < allRadios.length; index++) {
        allRadios[index].addEventListener("change", () => { verif() })
    }
});

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
        label.innerHTML = "Answer"+i;

        input = document.createElement("input");
        input.setAttribute("name", id);
        input.setAttribute("id", id);
        input.setAttribute("class", "answer");
        input.classList.add("input");

        inputCheckbox = document.createElement("input");
        inputCheckbox.setAttribute("type", "checkbox");
        inputCheckbox.setAttribute("id", id + "checkbox");
        inputCheckbox.setAttribute("name", "reponse[]");
        inputCheckbox.setAttribute("value", i);


        div.appendChild(label);
        div.appendChild(input);
        div.appendChild(inputCheckbox);
        div.innerHTML += ` <img src="img/ic-supprimer.png" alt="Delete" onclick=removeInput("answer"+${i})>`

        answers.appendChild(div);

        save_question.setAttribute("disabled", "disabled")

        var allInputs = formRegister.querySelectorAll(".input");
        for (let index = 0; index < allInputs.length; index++) {
            allInputs[index].addEventListener("input", () => { verif() })
        }

        var allCheckboxes = Array.from(formRegister.querySelectorAll("input[type='checkbox']"))
        for (let index = 0; index < allCheckboxes.length; index++) {
            allCheckboxes[index].addEventListener("change", () => { verif() })
        }

        var allImages = formRegister.getElementsByTagName("img")
        for (let index = 0; index < allImages.length; index++) {
            allImages[index].addEventListener("mouseover", () => { verif() })
        }
    }
});

let j = 1;
addRadio.addEventListener("click", () => {
    j++;
    allAnswers = formRegister.getElementsByClassName("answer");

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
        inputRadio.setAttribute("name", "reponse[]");
        inputRadio.setAttribute("value", j);

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

        var allRadios = Array.from(document.querySelectorAll("input[type='radio']"))
        for (let index = 0; index < allRadios.length; index++) {
            allRadios[index].addEventListener("change", () => { verif() })
        }

        var allImages = formRegister.getElementsByTagName("img")
        for (let index = 0; index < allImages.length; index++) {
            allImages[index].addEventListener("mouseover", () => { verif() })
        }
    }
});

save_question.addEventListener("mouseover", () => { verif() })

question.addEventListener("input", () => { verif() })

number_of_points.addEventListener("input", () => { verif() })

var allInputs = document.querySelectorAll(".input");
for (let index = 0; index < allInputs.length; index++) {
    allInputs[index].addEventListener("input", () => { verif() })
}

var allCheckboxes = Array.from(document.querySelectorAll("input[type='checkbox']"))
for (let index = 0; index < allCheckboxes.length; index++) {
    allCheckboxes[index].addEventListener("change", () => { verif() })
}

var allImages = formRegister.getElementsByTagName("img")
for (let index = 0; index < allImages.length; index++) {
    allImages[index].addEventListener("mouseover", () => { verif() })
}
//--------------------------------------------------------FUNCTIONS
function removeInput(id) {
    inputToDelete = document.getElementById(id);
    inputToDelete.parentElement.style.opacity = "0.4";
    setTimeout("inputToDelete.parentElement.remove()", 300);
    verif()
    // i--
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

    let allInputs = formRegister.querySelectorAll(".input");
    let allCheckboxes = Array.from(formRegister.querySelectorAll("input[type='checkbox']"))
    let allRadios = Array.from(formRegister.querySelectorAll("input[type='radio']"))

    if (allCheckboxes.length != 0) {
        console.log("1")
        results = isFieldEmpty3(array) + isFieldEmpty3(allInputs) + isOneAtLeastChecked(allCheckboxes) + is_integer(number_of_points);
        if (results == 4) {
            save_question.removeAttribute("disabled")
        } else
            save_question.setAttribute("disabled", "disabled")
    } else if (allRadios.length != 0) {
        console.log("2")
        results = isFieldEmpty3(array) + isFieldEmpty3(allInputs) + isOneAtLeastChecked(allRadios) + is_integer(number_of_points);
        if (results == 4) {
            save_question.removeAttribute("disabled")
        } else
            save_question.setAttribute("disabled", "disabled")
    } else {
        console.log("3")
        results = isFieldEmpty3(array) + isFieldEmpty3(allInputs) + is_integer(number_of_points)
        if (results == 3) {
            save_question.removeAttribute("disabled")
        } else
            save_question.setAttribute("disabled", "disabled")
    }
    console.log(results+"result")
}

function checked(element) {
    return element.checked
}

function isOneAtLeastChecked(array) {
    newArray = array.filter(checked)
    if (newArray.length == 0)
        return false
    return true
}

function updateLabels(){
    const labels = document.querySelectorAll("label")
    labels.forEach((label, i)=>{
        label.innerHTML = "Answer"+(i+1);
    })
}