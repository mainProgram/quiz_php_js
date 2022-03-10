<?php

function required_fields(string $key, string $data, array &$errors, string $message="This field is empty!"){
    if(empty($data))
        $errors[$key] = $message;
}

// function valid_mail(string $key, string $data, array &$errors, string $message="Invalid mail adress !"){
//     if(!filter_var($data, FILTER_VALIDATE_EMAIL))
//         $errors[$key] = $message;
// }

function is_mail_valid(string $key, string $email, array &$errors, string $message="Invalid mail adress!"){
    if(!preg_match('/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD',$email))
        $errors[$key] = $message;
}

function are_mail_and_password_correct($mail, $password, $tab){
    foreach($tab as $t)
        if(in_array($mail,$t) && in_array($password,$t))
            return true;
    return false;
}

function is_mail_already_used(string $key, string $mail, array $tab, array &$errors, string $message="Mail adress is already used !"){
    $bool = false;
    foreach($tab as $t)
        if(in_array($mail,$t))
            $bool = true;
    if($bool==true)
        $errors[$key] = $message;
}

function are_passwords_the_same(string $key, $password, $password2, array &$errors, string $message="Passwords don't match !"){
    if($password != $password2)
        $errors[$key] = $message;
}

function valid_password(string $key, string $password, array &$errors, string $message="Password should contain at least a letter and number and its length > 6 characters !"){ 
    $password = trim($password); 
    if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/", $password)) 
        $errors[$key] = $message; 
} 


function is_name_valid(string $key, string $name, array &$errors, string $message="Invalid !"){ 
    $name = trim($name); 
    if(strlen($name) < 2 || !preg_match("/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u", $name))      
        $errors[$key] = $message; 
} 

function is_length_correct(string $key, string $score, array &$errors, string $message="Score value isn't correct !"){
    if($score <= 0)
        $errors[$key] = $message;
}