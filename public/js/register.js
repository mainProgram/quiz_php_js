const login2 = document.getElementById("login2");
const password2 = document.getElementById("password2");
const formRegister = document.getElementById("formRegister");
const firstname = document.getElementById("firstname");
const lastname = document.getElementById("lastname");
const register = document.getElementById("register");
const file = document.getElementById("file");
const array2 = [login2, password, password2, firstname, lastname];

//--------------------------------------------------------------------EVENTS----------------------------------------------
// formRegister.addEventListener("submit", function(e) {
//     if(isFieldEmpty(array2)==false){
//         e.preventDefault();
//         return false;
//     }
   
// });

login.addEventListener("input", ()=>{
    isMailCorrect(login);
});


password.firstElementChild.addEventListener("input", ()=>{
    if(password.firstElementChild.value.trim() != "")
        showSuccess(password)
    else
        showError(password, "Field is required!")
});