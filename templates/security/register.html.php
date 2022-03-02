<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo WEB_PUBLIC."css".DIRECTORY_SEPARATOR."register.css"?>">
</head>
<?php 
    if(isset($_SESSION[KEY_ERRORS]))
        $errors = $_SESSION[KEY_ERRORS];
    unset($_SESSION[KEY_ERRORS]);
?>

<header>
    <img src="img/logo-QuizzSA.png" alt="">
    <h1>Le plaisir de jouer</h1>
</header>
<section class="container">
    <form action="<?=WEB_ROOT."/index.php"?>" method="post" id="formRegister">
        <input type="hidden" name="controller" value="security">
        <input type="hidden" name="action" value="register">

        <?php if(is_connect()) : ?>
            <input type="hidden" name="role" value="admin">
        <?php else : ?>
            <input type="hidden" name="role" value="player">
        <?php endif ?>

        <section class="loginForm">   
            <h3>Registration Form</h3>
        </section>

        <div>
            <input type="text" placeholder="First name" id="firstname" name="firstname" value="<?php if(isset($_SESSION["firstname"])) echo $_SESSION["firstname"];?>">
        </div>
        <small><?php if(isset($errors["firstname"])) echo "<p style='color:red;'>".$errors["firstname"]."</p>" ?></small>

        <div>
            <input type="text" placeholder="Last Name" id="lastname" name="lastname" value="<?php if(isset($_SESSION["lastname"])) echo $_SESSION["lastname"];?>">
        </div>
        <small><?php if(isset($errors["lastname"])) echo "<p style='color:red;'>".$errors["lastname"]."</p>" ?></small>

        <div>
            <input type="text" placeholder="Login" id="login2" name="login2" value="<?php if(isset($_SESSION["login2"])) echo $_SESSION["login2"];?>">
        </div>
        <small><?php if(isset($errors["login2"])) echo "<p style='color:red;'>".$errors["login2"]."</p>" ?></small>

        <div>
            <input type="password" placeholder="Password" name="password" id="password">
        </div>
        <small><?php if(isset($errors["password"])) echo "<p style='color:red;'>".$errors["password"]."</p>" ?></small>

        <div>
            <input type="password" placeholder="Confirm password" name="password2" id="password2">
        </div>
        <small>
        <?php 
            if(isset($errors["incorrectPassword"]))
                echo "<p style='color:red;'>".$errors["incorrectPassword"]."</p>" ;
            elseif(isset($errors["password2"])) 
                echo "<p style='color:red;'>".$errors["password2"]."</p>" ;
        ?> 
        </small>
        
        <div class="button">
            <label for="avatar" class="avatar">Choose an image for your avatar profile</label>
            <input type="file" name="avatar" id="avatar"  accept="image/*" value="<?php if(isset($_SESSION["avatar"])) echo $_SESSION["avatar"];?>" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
            <img id="output" alt="Avatar" src=""/>
        </div>
        <small> <?php if(isset($errors["avatar"])) echo "<p style='color:red;'>".$errors["avatar"]."</p>" ?> </small>

        <div class="button">
            <input type="submit" name="register" id="register" value="Sign Up">
            <a href="<?=WEB_ROOT."/index.php"?>">Already signed? Sign In</a>
        </div>
    </form>
</section>

<?php require_once PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php"; ?>

<script src="<?=WEB_PUBLIC."js".DIRECTORY_SEPARATOR."register.js"?>"></script>

