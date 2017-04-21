<?php $this->layout('layout', ['title' => 'Profil']) ?>

<?php $this->start('main_content') ?>
<form action="" method="POST">
    <div class="form-group">
        <label>Votre pseudo ou votre email :</label>
        <input id="username" name="username" class="form-control" type="text">
    </div>
    <div class="form-group">
        <label>Votre mot de passe :</label>
        <input id="password" name="password" class="form-control" type="password">
    </div>
    <button class="btn btn-info">Se connecter</button>
</form>
<strong><a href="#" title="forgetpassword">Mot de passe oublié ?</a></strong></p>


<?php $this->stop('main_content') ?>
