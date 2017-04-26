<?php $this->layout('layout', ['title' => 'Connexion']) ?>

<?php $this->start('main_content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-6">
            <form action="" method="POST">
                <div class="form-group">
                    <label>Votre pseudo ou votre email :</label>
                    <input id="username" name="username" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label>Votre mot de passe :</label>
                    <input id="password" name="password" class="form-control" type="password">
                </div>
                <?php foreach ($messages as $message): ?>
                    <?= $message."<br>" ?>
                <?php endforeach; ?>
                <button class="btn btn-info">Se connecter</button>
            </form>
            <strong><a href="<?= $this->url('user_reset') ?>" title="forgetpassword">Mot de passe oublié ?</a></strong>
        </div>
    </div>
</div>
<?php $this->stop('main_content') ?>
