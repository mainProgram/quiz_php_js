<section class="list_players" style="background-color:red;"> 
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Login</th>
            <th>Score</th>
        </tr>
        <?php foreach($data as $d) :?>
        <tr>
            <td><?=$d["firstName"]?></td>
            <td><?=$d["lastName"]?></td>
            <td><?=$d["login"]?></td>
            <td><?=$d["score"]?></td>
        </tr>
        <?php endforeach ?>
    </table>
</section>

