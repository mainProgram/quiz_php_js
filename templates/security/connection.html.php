<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo WEB_PUBLIC."css".DIRECTORY_SEPARATOR."connection.css"?>">
</head>
<?php 
    // require_once PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php";
    if(isset($_SESSION[KEY_ERRORS]))
        $errors = $_SESSION[KEY_ERRORS];
    unset($_SESSION[KEY_ERRORS]);
?>

<header>
    <img src="img/logo-QuizzSA.png" alt="">
    <h1>Le plaisir de jouer</h1>
</header>
<section class="container">
    <form action="<?=WEB_ROOT."/index.php"?>" method="post" id="form">
        <input type="hidden" name="controller" value="security">
        <input type="hidden" name="action" value="connection">

        <section class="loginForm">   
            <h3>Login Form</h3>
            <i class="fa fa-close" style="font-size:30px"></i>    
        </section>

        <small><?php if(isset($errors["connection"])) echo "<p style='color:red;'>".$errors["connection"]."</p>" ?></small>

        <div id="login">
            <input type="text" placeholder="Login" name="login" value="<?php if(isset($_SESSION["login"])) echo $_SESSION["login"];?>">
            <img src="img/ic-login.png" alt="">
        </div>
        <small><?php if(isset($errors["login"])) echo "<p style='color:red;'>".$errors["login"]."</p>" ?></small>

        <div>
            <input type="password" placeholder="Password" name="password" id="password">
            <i class="material-icons" style="font-size:36px;color:rgb(190, 190, 190);">lock</i>
        </div>
        <small><?php if(isset($errors["password"])) echo "<p style='color:red;'>".$errors["password"]."</p>" ?> </small>

        <div class="button">
            <input type="submit" name="connect" id="connect" value="Log In">
            <a href="<?=WEB_ROOT."/index.php?controller=security&action=register"?>">Wanna play? Sign up</a>
        </div>
    </form>  
</section>

<?php require_once PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php"; ?>

