<?php 
    require_once PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php";
    $errors = $_SESSION[KEY_ERRORS];
    unset($_SESSION[KEY_ERRORS]);
?>

<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>

<form action="<?=WEB_ROOT."/index.php"?>" method="post" id="formRegister">
    <h3>Register Here</h3>
    <input type="hidden" name="controller" value="security">
    <input type="hidden" name="action" value="register">
    <input type="hidden" name="role" value="player">

    <label for="firstname">First name</label>
    <input type="text" placeholder="" id="firstname" name="firstname" value="<?php if(isset($_SESSION["firstname"])) echo $_SESSION["firstname"];?>">
    <?php if(isset($errors["firstname"])) echo "<p style='color:red;'>".$errors["firstname"]."</p>" ?>
   <small></small>

   <label for="lastname">Last name</label>
    <input type="text" placeholder="" id="lastname" name="lastname" value="<?php if(isset($_SESSION["lastname"])) echo $_SESSION["lastname"];?>">
    <?php if(isset($errors["lastname"])) echo "<p style='color:red;'>".$errors["lastname"]."</p>" ?>
   <small></small>

    <label for="login2">Login</label>
    <input type="text" placeholder="" id="login2" name="login2" value="<?php if(isset($_SESSION["login2"])) echo $_SESSION["login2"];?>">
    <?php if(isset($errors["login2"])) echo "<p style='color:red;'>".$errors["login2"]."</p>" ?>
   <small></small>

    <label for="password">Password</label>
    <input type="password" placeholder="" name="password" id="password">
    <?php if(isset($errors["password"])) echo "<p style='color:red;'>".$errors["password"]."</p>" ?> 
   <small></small>

   <label for="password2">Confirm Password</label>
    <input type="password" placeholder="" name="password2" id="password2">
    <?php if(isset($errors["password2"])) echo "<p style='color:red;'>".$errors["password2"]."</p>" ?> 
   <small></small>

    <input type="submit" name="register" id="register" value="Create account">
</form>


<?php require_once PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php"; ?>

