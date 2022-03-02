<?php if(count($questions) > 0):?>
    <h1>List of all questions</h1>
    <section class="list_questions"> 
        <ol>
            <?php foreach($questions as $q) :?>
                <li><?= $q["question"] ?>
                    <?php foreach($q ["answers"] as $a) :?>
                        <ul><?= $a ?></ul>
                    <?php endforeach ?>
                </li>
            <?php endforeach ?>
        </ol>
        <a href="#">Next</a>
    </section>
<?php else :?>
    <h1 style="background-color: red;">Il n'y a pas de questions !</h1>
<?php endif?>

