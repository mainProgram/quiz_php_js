questions = [
    {
        question : "What's the worst programming language ? ",
        reponse0 : "JAVA",
        reponse1: "C",
        reponse2: "PYTHON",
        reponse3: "JavaScript",
        correct: "reponse3"
    },
    {
        question : "What does HTML stands for ? ",
        reponse0 : "Hypertext Preprocessor",
        reponse1: "Hypertext Markup Language",
        reponse2: "Hypertext Multiple Language",
        reponse3: "Hyper Tool Multi Language",
        correct: "reponse1"
    },
    {
        question : "What does CSS stands for ? ",
        reponse0 : "Common Style Sheet",
        reponse1: "Colorful Style Sheet",
        reponse2: "Computer Style Sheet",
        reponse3: "Cascading Style Sheet",
        correct: "reponse3"
    },
    {
        question : "What does PHP stands for ? ",
        reponse0 : "Hypertext Preprocessor",
        reponse1: "Hypertext Programming",
        reponse2: "Hypertext Preprogramming",
        reponse3: "Hometext Preprocessor",
        correct: "reponse0"
    },
    {
        question : "What does XML stands for? ",
        reponse0 : "eXtensible Markup Language",
        reponse1: "eXecutable Multiple Language",
        reponse2: "eXtra Multi-program Language",
        reponse3: "eXtra Multiple Language",
        correct: "reponse0"
    },
    
    
];//----------------------------------------------------------------VARIABLES-------------------------------------------------
const QUESTION = document.getElementById("question");
const BUTTON = document.getElementById("button");
const REPONSES = document.getElementById("reponses");
const REPONSE0 = document.getElementById("reponse0");
const REPONSE1 = document.getElementById("reponse1");
const REPONSE2 = document.getElementById("reponse2");
const REPONSE3 = document.getElementById("reponse3");
let correctAnswers = 0;
let numberOfQuestions = questions.length;
let countQuestion = 0;
let checkboxes = document.querySelectorAll("input[type=radio]");

//----------------------------------------------------------------FUNCTIONS-------------------------------------------------
function showQuestion(index){
    BUTTON.setAttribute("disabled", "disabled");
    let checkboxes = document.querySelectorAll("input[type=radio]");
        for (let i = 0; i < checkboxes.length; i++) 
            if(checkboxes[i].checked){
                checkboxes[i].checked = false
                checkboxes[i].removeAttribute("class");
            }


    QUESTION.innerHTML  = questions[index].question;   
    REPONSE0.nextSibling.nextSibling.innerHTML  = questions[index].reponse0;
    REPONSE1.nextSibling.nextSibling.innerHTML  = questions[index].reponse1;
    REPONSE2.nextSibling.nextSibling.innerHTML  = questions[index].reponse2;
    REPONSE3.nextSibling.nextSibling.innerHTML  = questions[index].reponse3;
}
//----------------------------------------------------------------EVENTS-------------------------------------------------
window.onload = showQuestion(0);

for (let i = 0; i < 4; i++) {

    let reponse = document.getElementById("reponse"+i);

    reponse.onclick = ()=>{
        for (let i = 0; i < checkboxes.length; i++) {
            if(checkboxes[i].checked)
                checkboxes[i].setAttribute("class", "clicked");
            else
                checkboxes[i].removeAttribute("class");
            
            isOneAnswerChecked = Array.from(document.querySelectorAll(".clicked"));

            if(isOneAnswerChecked.length == 1)
                BUTTON.removeAttribute("disabled"); 
        }
    }
}

BUTTON.onclick = ()=>{

    ++countQuestion;
    isOneAnswerChecked = Array.from(document.querySelectorAll(".clicked"));
        
    if(countQuestion < questions.length){
        if(isOneAnswerChecked[0].id == questions[countQuestion-1].correct){
            correctAnswers++;
        }
        showQuestion(countQuestion);
    }
    else if (countQuestion == 5){
        if(isOneAnswerChecked[0].id == questions[countQuestion-1].correct){
            correctAnswers++;
        }
        BUTTON.innerHTML = "Rejouer";
        QUESTION.innerHTML = "Votre score est de "+ correctAnswers + "/" + questions.length;
        REPONSES.style.display = "none";
    }
    else{
        REPONSES.style.display = "flex";
        BUTTON.innerHTML = "Suivant";
        countQuestion = 0;
        correctAnswers = 0;
        window.onload = showQuestion(0);
    }
}