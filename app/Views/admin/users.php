<?php $this->layout('layout', ['title' => 'Liste des utilisateurs']) ?>

<?php $this->start('main_content') ?>
    <h2>Liste des utilisateurs :</h2><br>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Pseudo</th>
                <th>Email</th>
                <th>Membre depuis</th>
                <th>Dernière connexion</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $user["username"] ?></td>
                <td><?= $user["email"] ?></td>
                <td><?= $user["date_create"] ?></td>
                <td><?= $user["date_last_connexion"] ?></td>
                <td><a class="btn btn-danger" href="<?= $this->url("admin_deleteUser",['id'=>$user["id"]]) ?>">
                    Supprimer
                </a></td>
            </tr>
            <?php $i++ ?>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php $this->stop('main_content') ?>
