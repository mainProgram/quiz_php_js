<?php

    function save_question(string $question,string $type, string $score, array $answers){

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
    function get_all_players(string $role):array{
        $all_users = find_data("users");
        $result = array();
        foreach($all_users as $user)
            if($user["role"] == $role)
                $result[] = $user;
        return $result;
    }