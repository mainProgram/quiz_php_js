<?php if(count($data) > 0):?>
    <h1>List of all players based on score</h1>
    <section class="list_players"> 
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Score</th>
            </tr>
            <?php foreach($data as $d) :?>
            <tr>
                <td><?=$d["firstName"]?></td>
                <td><?=$d["lastName"]?></td>
                <td><?=$d["score"]?><small>pts</small></td>
            </tr>
            <?php endforeach ?>
        </table>
        <a href="#">Next</a>
    </section>
<?php else :?>
    <h1 style="background-color: red;">Il n'y a pas de joueurs !</h1>
<?php endif?>

