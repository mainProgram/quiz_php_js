//--------------------------------------------------------------------FUNCTIONS-------------------------------------------
function showError(data, errorMessage){
    data.setAttribute("class", "error");
    data.nextSibling.nextSibling.innerText = errorMessage;
    data.nextSibling.nextSibling.style.color = "red";
}
 
function showSuccess(data){
    data.setAttribute("class", "success");
    data.nextSibling.nextSibling.innerText = "";
}
  
function isFieldEmpty(array){
    var bool = true;
    for (let index = 0; index < array.length; index++) 
        if(array[index].firstElementChild.value.trim() == ""){//cilble les input qui sont dans le div
            showError(array[index], "Field is required !");
            bool = false;
        }
        else
            showSuccess(data)                             
    return bool;
} 

function isMailCorrect(data){
    const regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    // const regex = '/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD';

    string = data.firstElementChild.value.trim().toLowerCase();
    
    if(regex.test(string)) 
        showSuccess(data)                             
    else
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

function is_valid_password(password){ 
    const regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;
    (regex.test(password.value.trim().toLowerCase()))   ?
        showSuccess(password)                           :
        showError(password, "Password should contain at least a letter and number and its length > 6 characters !");
} 

function isNameCorrect(data){
    const regex = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u;
    (regex.test(data.value.trim().toLowerCase()))   ?
        showSuccess(data)                           :
        showError(data, "Invalid !");
}