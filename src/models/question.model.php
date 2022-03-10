<?php

    function get_QuestionsParPage($pageCourante, $pas){
        $all_questions = find_data("questions");
        $p = ($pageCourante * $pas) - $pas + 1;
    
        for ($i=$p; $i <= ($pas*$pageCourante); $i++) { 
            if(isset($all_questions[$i-1]))
                $datas[] = $all_questions[$i-1] ;
        }
        return $datas;
    }