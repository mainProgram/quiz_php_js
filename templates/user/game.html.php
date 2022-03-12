<div class="game">
    <div class="left_head">
        <img src="
        <?php 
            if(isset($_SESSION[KEY_USER_CONNECT]) && $_SESSION[KEY_USER_CONNECT]["avatar"] != "")
                echo "uploads".DIRECTORY_SEPARATOR.$_SESSION[KEY_USER_CONNECT]["avatar"]; 
            else
                echo "img".DIRECTORY_SEPARATOR."simone-secci-49uySSA678U-unsplash.jpg" ;
        ?>" alt="PHOTO">
        <h1 style='text-align:center;'>Welcome dear <?php if(isset($_SESSION[KEY_USER_CONNECT])) echo $_SESSION[KEY_USER_CONNECT]["firstName"]; ?> !</h1>
        <p>Login:
            <?php if(isset($_SESSION[KEY_USER_CONNECT])) echo $_SESSION[KEY_USER_CONNECT]["login"]; ?>
        </p>
        <a href=<?=WEB_ROOT.'?controller=security&action=logout'?>>Log Out</a>
    </div>
    <section class="body">
        <section class="questions">
            <h2 id="question"></h2>
            <section id="reponses" class="reponses">
                <div>
                    <input type="radio" name="reponse" id="reponse0">
                    <label for="reponse0"></label>
                </div>
                <div>
                    <input type="radio" name="reponse" id="reponse1">
                    <label for="reponse1"></label>
                </div>
                <div>
                    <input type="radio" name="reponse" id="reponse2">
                    <label for="reponse2"></label>
                </div>
                <div>
                    <input type="radio" name="reponse" id="reponse3">
                    <label for="reponse3"></label>
                </div>
            </section>
            <section class="button">
                <button id="button" disabled>Suivant</button>
            </section>
        </section>
    </section>
</div>
<script src="<?=WEB_PUBLIC."js".DIRECTORY_SEPARATOR."game.js"?>"></script>
