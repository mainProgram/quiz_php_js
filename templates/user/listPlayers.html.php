<?php if(count($data) > 0):?>
    <h1>List of all players based on score</h1>
    <section class="list_players"> 
    <?php
        // On détermine sur quelle page on se trouve
        if(isset($_GET['page']) && !empty($_GET['page'])){
            $pageCourante = (int) strip_tags($_GET['page']);
        }else{
            $pageCourante = 1;
        }
        $pas = 5; //5 player par page
        $nbPlayer = get_numberOfPlayers(); //nbr total d'Player 
        $nbPages = ceil($nbPlayer / $pas); //nombre total de pages
        $premier = ($pageCourante * $pas) - $pas;
        $player = get_playerParPage($pageCourante,5);
    ?>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Score</th>
            </tr>
            <?php foreach($player as $d) :?>
            <tr>
                <td><?=$d["firstName"]?></td>
                <td><?=$d["lastName"]?></td>
                <td><?=$d["score"]?><small>pts</small></td>
            </tr>
            <?php endforeach ?>
        </table>
        <nav>
            <ul class="pagination">
                <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                <li class="page-item <?= ($pageCourante == 1) ? "disabled" : "" ?>">
                    <a href="./?controller=user&action=list_players&page=<?= $pageCourante - 1 ?>" class="page-link">Précédent</a>
                </li>
                <?php for($page = 1; $page <= $nbPages; $page++): ?>
                    <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                    <li class="page-item <?= ($pageCourante == $page) ? "active" : "" ?>">
                        <a href="./?controller=user&action=list_players&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                    </li>
                <?php endfor ?>
                    <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                    <li class="page-item <?= ($pageCourante == $nbPages) ? "disabled" : "" ?>">
                    <a href="./?controller=user&action=list_players&page=<?= $pageCourante + 1 ?>" class="page-link">Suivant</a>
                </li>
            </ul>
        </nav>
    </section>
<?php else :?>
    <h1 style="background-color: red;">Il n'y a pas de joueurs !</h1>
<?php endif?>

