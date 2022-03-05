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

function get_numberOfPlayers(){
    return count(get_all_players("player"));
}

function get_playerParPage($pageCourante, $pas){
    $all_users = get_all_players("player");
    $p = ($pageCourante * $pas) - $pas + 1;

    for ($i=$p; $i <= ($pas*$pageCourante); $i++) { 
        if(isset($all_users[$i-1]))
            $datas[] = $all_users[$i-1] ;
    }
    return $datas;
}
