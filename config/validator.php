<?php

function required_fields(string $key, string $data, array &$errors, string $message="This field is empty!"){
    if(empty($data))
        $errors[$key] = $message;
}

function valid_mail(string $key, string $data, array &$errors, string $message="Invalid mail adress !"){
    if(!filter_var($data, FILTER_VALIDATE_EMAIL))
        $errors[$key] = $message;
}

function valid_password(string $key, string $data, array &$errors, string $message="Invalid password !"){
    
}