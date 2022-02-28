<?php
//CEST LE . D'ENTREE DE LAPP, LE FRONT CONTROLLER

//DÉMARRAGE DE LA SESSION
if(session_status() == PHP_SESSION_NONE) session_start();

//dossier du projet
$rootDirectory =  dirname(dirname(__FILE__)); 

//Inclusion des constantes
require_once $rootDirectory."/config/constantes.php";
//Inclusion du validator
require_once $rootDirectory."/config/validator.php";
//Inclusion de l'ORM
require_once $rootDirectory."/config/orm.php";
//Inclusion des rôles
require_once $rootDirectory."/config/role.php";

//Chargement du routeur
require_once $rootDirectory."/config/router.php";
// echo "<pre>";
// var_dump($_SERVER);
// echo "<pre>";

