const form = document.getElementById("form");
const login = document.getElementById("login");
const password = document.getElementById("password");
const connect = document.getElementById("connect");
const array = [login, password];

//--------------------------------------------------------------------EVENTS----------------------------------------------
form.addEventListener("submit", function(submit) {
    if(isFieldEmpty(array)==false || !isMailCorrect(login)){
        submit.preventDefault();
        return false;
        // return true;
    }
});

login.addEventListener("blur", ()=>{
    if(login.firstElementChild.value.trim() == "")
        showError(login, "Field is required !");
    isMailCorrect(login);
});

password.addEventListener("blur", ()=>{
    if(password.firstElementChild.value.trim() == "")
        showError(password, "Field is required !");
    else
        showSuccess(password);
    //is_valid_password
});

// button.addEventListener("click", function () {
//     isFieldEmpty(array);
//     isLengthCorrect(username, 3, 20);
//     isLengthCorrect(password, 5, 15);
//     arePasswordsCorrect(password, password2); 
//     isMailCorrect(email);
//     isUsernameCorrect(username);
// });


