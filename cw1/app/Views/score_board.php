<div class=" mx-auto mb-3 mt-3 col-8">
<h1>Score Board</h1>
<br>
<table class="table">
    <thead class="thead-dark">
        <tr>

            <th scope="col">Name</th>
            <th scope="col">Score</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
            foreach($users as $user){
        ?>
        <tr <?php
            if($user['name'] == session()->get('name')){
                echo 'class="table-success"';
            }
        ?>>

            <td><?php echo $user['name']; ?></td>
            <td><?php echo $user['score']; ?></td>

        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
</div>