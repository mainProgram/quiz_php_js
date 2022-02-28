<?php

function find_user_login_and_password(string $login, string $password):array{
    $all_users = find_data("users");
    foreach($all_users as $user)
        if($user["login"] == $login && $user["password"] == $password)
            return $user;
        return [];
}

function get_all_players(string $role):array{
    $all_users = find_data("users");
    $result = array();
    foreach($all_users as $user)
        if($user["role"] == $role)
            $result[] = $user;
    return $result;
}