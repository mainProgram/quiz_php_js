<?php require_once PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php"; ?>

<ul>
    <li><a class="active" href="#home">Home</a></li>
    <?php if(is_admin()): ?>
        <li><a href="<?=WEB_ROOT."?controller=user&action=list_players"?>">Players</a></li>
    <?php endif ?>
    <li><a href=<?=WEB_ROOT."?controller=security&action=logout"?>>Log out</a></li>
</ul>

<?php
    // Affichage du contenu des vues /
    echo $content_for_views;
?>

<?php require_once PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php"; ?>
