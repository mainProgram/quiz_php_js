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


function upload($filename, $tempname, $extension, $login, $role){
    if($filename != ""){
        $new_file_name = explode("@",$login)[0]."_".$role.".".$extension;

        $folder = "uploads".DIRECTORY_SEPARATOR.$new_file_name;

        // Now let's move the uploaded image into the folder: uploads
        move_uploaded_file($tempname, $folder);

        return $new_file_name;
    }
}