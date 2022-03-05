<?php 
    if(isset($_SESSION[KEY_ERRORS]))
        $errors = $_SESSION[KEY_ERRORS];
    unset($_SESSION[KEY_ERRORS]);
?>
<div class="containerFormRegistration">
    <form action="<?=WEB_ROOT."/index.php"?>" method="post" id="formRegister">
        <input type="hidden" name="controller" value="security">
        <input type="hidden" name="action" value="register">
   
        <?php if(is_admin()) : ?>
            <input type="hidden" name="role" value="admin">
        <?php else : ?>
            <input type="hidden" name="role" value="player">
        <?php endif ?>
        
        <section class="loginForm">   
            <h3>Sign Up</h3>
            <?php if(is_admin()) : ?>
                <p>Create an admin</p>
            <?php else : ?>
                <p>To test your general knowledge</p>
            <?php endif ?>
        </section>
        
        <div id="firstname">
           <label for="firstname">First Name</label>
           <input type="text" name="firstname" value="<?php if(isset($_SESSION["firstname"])) echo $_SESSION["firstname"];?>">
        </div>
        <small><?php if(isset($errors["firstname"])) echo "<p style='color:red;'>".$errors["firstname"]."</p>" ?></small>
   
       <div id="lastname" >
           <label for="lastname">Last Name</label>
           <input type="text" name="lastname" value="<?php if(isset($_SESSION["lastname"])) echo $_SESSION["lastname"];?>">
       </div>
       <small><?php if(isset($errors["lastname"])) echo "<p style='color:red;'>".$errors["lastname"]."</p>" ?></small>
   
       <div id="login2">
            <label for="Login">Login</label>
            <input type="text" name="login2" value="<?php if(isset($_SESSION["login2"])) echo $_SESSION["login2"];?>">
       </div>
       <small><?php if(isset($errors["login2"])) echo "<p style='color:red;'>".$errors["login2"]."</p>" ?></small>
   
       <div id="password">
           <label for="password">Password [At least 6 characters, a number and a letter]</label>
           <input type="password" name="password">
       </div>
       <small><?php if(isset($errors["password"])) echo "<p style='color:red;'>".$errors["password"]."</p>" ?></small>
   
       <div id="password2">
            <label for="password">Confirm Password</label>
            <input type="password" name="password2" >
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
           <img id="output" alt="Avatar" src=""/>
           <input type="file" name="avatar" id="avatar"  accept="image/*" value="<?php if(isset($_SESSION["avatar"])) echo $_SESSION["avatar"];?>" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
           <label for="avatar" class="avatar">Choose a file</label>
        </div>
        <small> <?php if(isset($errors["avatar"])) echo "<p style='color:red;'>".$errors["avatar"]."</p>" ?></small>
   
        <div class="button">
           <input type="submit" name="register" id="register" value="Create account" disabled>
        </div>
        
        <?php if(isset($_SESSION["created_account"])) echo "<h2>".$_SESSION['created_account']."</h2>" ?>
        <?php unset($_SESSION['created_account']); ?>

        <?php if(!is_admin()) : ?>
            <a href="<?=WEB_ROOT."/index.php"?>">Have an account? Sign in</a>
        <?php endif ?>
    </form>

    <div class="the_avatar">
        <img src="img/nicolas-brulois-fQEj6HTfogo-unsplash.jpg" alt="Avatar">
    </div>
</div>
<script src="<?=WEB_PUBLIC."js".DIRECTORY_SEPARATOR."functions.js"?>"></script>
<script src="<?=WEB_PUBLIC."js".DIRECTORY_SEPARATOR."register.js"?>"></script>
