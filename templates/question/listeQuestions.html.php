<?php if(count($questions) > 0):?>
    <h1>List of all questions</h1>
    <section class="list_questions"> 
        <?php
            // On détermine sur quelle page on se trouve
            if(isset($_GET['page']) && !empty($_GET['page'])){
                $pageCourante = (int) strip_tags($_GET['page']);
            }else{
                $pageCourante = 1;
            }
            $pas = 3; //3 questions par page
            $nbQuestions = count($questions); //nbr total d'Questions 
            $nbPages = ceil($nbQuestions / $pas); //nombre total de pages
            $premier = ($pageCourante * $pas) - $pas;
            $Questions = get_playerParPage($pageCourante,3);
        ?>
        <ol>
            <?php foreach($questions as $q) :?>
                <li><?= $q["question"] ?>
                    <?php if($q["type"] == "one"): ?>
                        <?php foreach($q ["answers"] as $a) :?>
                            <ul> <small class="radio">&nbsp;&nbsp;</small><?=$a?></ul>
                        <?php endforeach ?>
                    <?php elseif($q["type"] == "many"): ?>
                        <?php foreach($q ["answers"] as $a) :?>
                            <ul> <small class="checkbox">&nbsp;&nbsp;</small><?=$a?></ul>
                        <?php endforeach ?>
                    <?php else: ?>
                        <?php foreach($q ["answers"] as $a) :?>
                            <div class="input"><?=$a?></div>
                        <?php endforeach ?>
                    <?php endif ?>
                </li>
            <?php endforeach ?>
        </ol>
        <nav>
            <ul class="pagination">
                <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                <li class="page-item <?= ($pageCourante == 1) ? "disabled" : "" ?>">
                    <a href="./?controller=user&action=list_questions&page=<?= $pageCourante - 1 ?>" class="page-link">Précédent</a>
                </li>
                <?php for($page = 1; $page <= $nbPages; $page++): ?>
                    <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                    <li class="page-item <?= ($pageCourante == $page) ? "active" : "" ?>">
                        <a href="./?controller=user&action=list_questions&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                    </li>
                <?php endfor ?>
                    <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                    <li class="page-item <?= ($pageCourante == $nbPages) ? "disabled" : "" ?>">
                    <a href="./?controller=user&action=list_questions&page=<?= $pageCourante + 1 ?>" class="page-link">Suivant</a>
                </li>
            </ul>
        </nav>
    </section>
<?php else :?>
    <h1 style="background-color: red;">Il n'y a pas de questions !</h1>
<?php endif?>

