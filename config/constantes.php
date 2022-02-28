<?php
//CE FICHIER CONTIENT TOUS LES CHEMINS RACINE

// Chemin du dossier racine du projet
define("ROOT", str_replace("public".DIRECTORY_SEPARATOR."index.php", "", $_SERVER["SCRIPT_FILENAME"]));

// Chemin du dossier src qui contient les controllers et les models
define("PATH_SRC", ROOT."src".DIRECTORY_SEPARATOR);

// Chemin du dossier src qui contient les vues 
define("PATH_VIEWS", ROOT."templates".DIRECTORY_SEPARATOR);

// Chemin du dossier data qui contient le fichier JSON 
define("PATH_DB", ROOT."data/db.json");

// Chemin du dossier public qui contient les images, css et js
define("WEB_PUBLIC", str_replace("index.php", "", $_SERVER["SCRIPT_NAME"]));

// Chemin de mon serveur cest le point d'entrée des requêtes
define("WEB_ROOT","http://localhost/quiz_php_js/public");

//Clés d'erreur
define("KEY_ERRORS", "errors");

//Clé de l'utilisateur connecté
define("KEY_USER_CONNECT", "user_connect");