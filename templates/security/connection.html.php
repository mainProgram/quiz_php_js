<?php 
    require_once PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php";
    $errors = $_SESSION[KEY_ERRORS];
    unset($_SESSION[KEY_ERRORS]);
?>

<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form action="<?=WEB_ROOT."/index.php"?>" method="post" id="form">
    <h3>Login Here</h3>
    <input type="hidden" name="controller" value="security">
    <input type="hidden" name="action" value="connection">

    <?php if(isset($errors["connection"])) echo "<p style='color:red;'>".$errors["connection"]."</p>" ?>

    <label for="Login">Login</label>
    <input type="text" placeholder="" id="login" name="login" value="<?php if(isset($_SESSION["login"])) echo $_SESSION["login"];?>">
    <?php if(isset($errors["login"])) echo "<p style='color:red;'>".$errors["login"]."</p>" ?>
   <small></small>

    <label for="password">Password</label>
    <input type="password" placeholder="" name="password" id="password">
    <?php if(isset($errors["password"])) echo "<p style='color:red;'>".$errors["password"]."</p>" ?> 
   <small></small>

    <input type="submit" name="connect" id="connect" value="Log In">
    <a href="<?=WEB_ROOT."/index.php?controller=security&action=register"?>">No account? Register here.</a>
</form>


<?php require_once PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php"; ?>

