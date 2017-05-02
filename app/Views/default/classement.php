<?php $this->layout('layout', ['title' => 'Classement']) ?>

<?php $this->start('main_content') ?>

    <h2>Classement :</h2><br>
    <table class="table">
        <thead>
            <tr>
                <th>Place</th>
                <th>Pseudo</th>
                <th>Campeurs</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $user["username"] ?></td>
                <td><?= $user["camper"] ?></td>
            </tr>
            <?php $i++ ?>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php $this->stop('main_content') ?>
