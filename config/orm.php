<?php
//RECUPERATION DES DONNEES DU FICHIER, SOIENT LES QUESTIONS OU LES USERS
function find_data(string $users_or_questions):array{
    $dataJSON = file_get_contents((PATH_DB));
    $data = json_decode($dataJSON, true);
    return $data[$users_or_questions];
}

//ENREGISTREMENT ET MISES À JOUR DES DONNEES DU FICHIER
function save_data(string $users_or_questions, array $data_to_save):array{
    return [];
}