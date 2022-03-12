const file = document.getElementById("file");
const login2 = document.getElementById("login2");
const password = document.getElementById("password");
const lastname = document.getElementById("lastname");
const register = document.getElementById("register");
const password2 = document.getElementById("password2");
const firstname = document.getElementById("firstname");
const formRegister = document.getElementById("formRegister");
const array2 = [login2, password, password2, firstname, lastname];

//--------------------------------------------------------------------EVENTS----------------------------------------------

for (let i = 0; i < array2.length; i++) {
    array2[i].addEventListener("input", () => {
        var bool = isMailCorrect2(login2) + isPasswordValid(password) + arePasswordsCorrect(password, password2) + isNameCorrect(firstname) + isNameCorrect(lastname) + isFieldEmpty2(login2) + isFieldEmpty2(password) + isFieldEmpty2(password2) + isFieldEmpty2(firstname) + isFieldEmpty2(lastname);
        // console.log(bool);
        if (bool == 10)
            register.removeAttribute("disabled");
        else
            register.setAttribute("disabled", "disabled");
    });
}
// for (let i = 0; i < array2.length; i++) {
//     array2[i].addEventListener("input", ()=>{
//         if(isFieldEmpty2(array2) && isMailCorrect2(login2) && is_valid_password(password) && isNameCorrect(firstname) && isNameCorrect(lastname) && arePasswordsCorrect(password, password2))
//             register.removeAttribute("disabled");
//         else
//             register.setAttribute("disabled", "disabled");
//     });
// }

// for (let i = 0; i < array2.length; i++) {
//     array2[i].addEventListener("input", ()=>{

//         login2.addEventListener("input", ()=>{
//             if(isFieldEmpty2(login2) && isMailCorrect2(login2))
//                 register.removeAttribute("disabled");
//             else
//                 register.setAttribute("disabled", "disabled");
//         });

//         password.addEventListener("input", ()=>{
//             if(isFieldEmpty2(password) && isPasswordValid(password))
//                 register.removeAttribute("disabled");
//             else
//                 register.setAttribute("disabled", "disabled");
//         });

//         password2.addEventListener("input", ()=>{
//             if(isFieldEmpty2(password2) && arePasswordsCorrect(password, password2))
//                 register.removeAttribute("disabled");
//             else
//                 register.setAttribute("disabled", "disabled");
//         });

//         firstname.addEventListener("input", ()=>{
//             if(isFieldEmpty2(firstname) && isNameCorrect(firstname))
//                 register.removeAttribute("disabled");
//             else
//                 register.setAttribute("disabled", "disabled");
//         });

//         lastname.addEventListener("input", ()=>{
//             if(isFieldEmpty2(lastname) && isNameCorrect(lastname))
//                 register.removeAttribute("disabled");
//             else
//                 register.setAttribute("disabled", "disabled");
//         });
//     });
// }
