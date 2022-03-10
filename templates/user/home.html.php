<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz App</title>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=WEB_PUBLIC."css".DIRECTORY_SEPARATOR."home.css"?>">
</head>
<body>
    <header>
        <a href="<?=WEB_ROOT."?controller=user&action=list_players"?>"><img src="img/logo-QuizzSA.png" alt=""></a>
        <h1>Le plaisir de jouer</h1>
    </header>
    <section class="container">
        <section class="head">
            <h1>Creation and settings of the quizzes</h1>
            <a href=<?=WEB_ROOT."?controller=security&action=logout"?>>Log Out</a>
        </section>
        <section class="body">
            <section class="left">
                <div class="left_head">
                    <img src="<?php if(isset($_SESSION[KEY_USER_CONNECT])) echo "uploads/".$_SESSION[KEY_USER_CONNECT]["avatar"]; ?>" alt="PHOTO">
                    <p>LOGIN:
                        <?php if(isset($_SESSION[KEY_USER_CONNECT])) echo $_SESSION[KEY_USER_CONNECT]["login"]; ?>
                    </p>
                </div>
                <div class="left_body">
                    <div class="setting">
                        <a href="<?=WEB_ROOT."?controller=question&action=list_questions"?>">
                            <small>List of the questions</small>
                            <img src="img/ic-liste.png" alt="list">
                        </a>
                    </div>
                    <div class="setting">
                        <a href="<?=WEB_ROOT."?controller=user&action=create_admin"?>">
                            <small>Create an admin</small>
                            <img src="img/ic-ajout.png" alt="plus">
                        </a>
                    </div>
                    <div class="setting">
                        <a href="<?=WEB_ROOT."?controller=user&action=list_players"?>">
                            <small>List of the players</small>
                            <img src="img/ic-liste.png" alt="list">
                        </a>
                    </div>
                    <div class="setting">
                        <a href="<?=WEB_ROOT."?controller=question&action=create_questions"?>">
                            <small>Create a question</small>
                            <img src="img/ic-ajout.png" alt="plus">
                        </a>
                    </div>
                </div>
            </section>
            <section class="right">
                <?php
                    // Affichage du contenu des vues /
                    echo $content_for_views;
                ?>
            </section>
        </section>
    </section>
    <?php require_once PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php"; ?>

