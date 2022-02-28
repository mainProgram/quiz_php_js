const form = document.getElementById("form");
const login = document.getElementById("login");
const password = document.getElementById("password");
const connect = document.getElementById("connect");
const errorLogin = document.getElementById("errorLogin");
const errorPassword = document.getElementById("errorPassword");
const array = [login, password];
//--------------------------------------------------------------------FUNCTIONS-------------------------------------------
function showError(data, errorMessage){
    data.setAttribute("class", "error");
    data.nextSibling.nextSibling.innerText = errorMessage;
}
 
function showSuccess(data){
     data.setAttribute("class", "success");
     data.nextSibling.nextSibling.innerText = "";
}
  
function isFieldEmpty(data){
    var bool = true;
     for (let index = 0; index < array.length; index++) 
         if(array[index].value.trim() == ""){
            showError(array[index], "Field is required !");
            bool = false;
         }
    return bool;
} 

function isMailCorrect(data){
    const regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    (regex.test(data.value.trim().toLowerCase())) ?
    showSuccess(data)                             :
    showError(data, "Invalid email adress!");
}

function isLengthCorrect(data, min, max){
    (data.value.trim().length >= min && data.value.trim().length <= max) ? 
                                                       showSuccess(data) : 
    showError(data, `${data.previousSibling.previousSibling.innerText} length is between ${min} and ${max} characters !`);
}

function arePasswordsCorrect(password1, password2){
    (password1.value == password2.value) ?
        showSuccess(password2)           :
        showError(password2, "Passwords don't match !");
}

function isUsernameCorrect(data){
    const regex = /^[a-z0-9]+$/i;
    (regex.test(data.value.trim().toLowerCase()))   ?
        showSuccess(data)                           :
        showError(data, "Username is incorrect ! No special characters");
}
//--------------------------------------------------------------------EVENTS----------------------------------------------
form.addEventListener("submit", function () {
    if(isFieldEmpty(array)==false){
        e.preventDefault();return false;
    }
});