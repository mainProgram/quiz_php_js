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
        <a href="<?=WEB_ROOT."/index.php"?>"><img src="img/logo-QuizzSA.png" alt=""></a>
        <h1>Le plaisir de jouer</h1>
    </header>
    <section class="container player">
        <?php echo $content_for_views ?>
    </section>
</body>
<script src="<?=WEB_PUBLIC."js".DIRECTORY_SEPARATOR."functions.js"?>"></script>
