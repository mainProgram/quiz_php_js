const form = document.getElementById("form");
const login = document.getElementById("login");
const password = document.getElementById("password");
const connect = document.getElementById("connect");
const array = [login, password];
const errorLogin = document.getElementById("errorLogin");
const errorPassword = document.getElementById("errorPassword");


//--------------------------------------------------------------------EVENTS----------------------------------------------
form.addEventListener("submit", function(e) {
    if(isFieldEmpty(array)==false){
        e.preventDefault();
        return false;
        // return true;
    }
});

// button.addEventListener("click", function () {
//     isFieldEmpty(array);
//     isLengthCorrect(username, 3, 20);
//     isLengthCorrect(password, 5, 15);
//     arePasswordsCorrect(password, password2); 
//     isMailCorrect(email);
//     isUsernameCorrect(username);
// });


