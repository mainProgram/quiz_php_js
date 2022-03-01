<?php
//RECUPERATION DES DONNEES DU FICHIER, SOIENT LES QUESTIONS OU LES USERS
function find_data(string $user_or_question):array{
    $dataJSON = file_get_contents((PATH_DB));
    $data = json_decode($dataJSON, true);
    return $data[$user_or_question];
}

//ENREGISTREMENT ET MISES À JOUR DES DONNEES DU FICHIER
function save_data(string $user_or_question, array $newRegistration):bool{

    $dataJSON = json_decode(file_get_contents(PATH_DB),true); //true parameter to get an associative array ;
    
    if(filesize(PATH_DB) == 0){
        $firstRegistration[$user_or_question] = $newRegistration;
        $dataToSave = $firstRegistration;
    }
     //SI CE NEST PAS LE PREMIER ENREGISTREMENT ET QUIL YA DEJA DES ENREGISTREMENTS DANS LE FICHIER ALORS ON RECUPERE DABORD LES ANCIENS ENREGISTREMENTS ENSUITE ON CONCATENE LES ANCIENS ENREGISTREMENTS AVEC LE NOUVEAU. 
    else{
        $oldRegistrations = $dataJSON;
        array_push($oldRegistrations[$user_or_question], $newRegistration);
        $dataToSave = $oldRegistrations;
    }

    //ENCODAGE DES DONNEES
    $encodedData = json_encode($dataToSave);

    //METTONS MAINTENANT LES DONNEES DANS LE FICHIER JSON 
    if(file_put_contents(PATH_DB, $encodedData))
        return true;
    return false;
}

