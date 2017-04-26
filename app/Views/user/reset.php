<?php $this->layout('layout', ['title' => 'Réinitialisation du mot de passe']) ?>

<?php $this->start('main_content') ?>

<?php if ($display == "mail"): ?>
    <!-- Récupere le l'identifiant de l'utilisateur -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-6">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="login">Entrez votre pseudo ou adresse email :</label>
                        <input type="text" id="login" name="login" class="form-control">
                    </div>
                    <?php foreach ($messages as $message): ?>
                        <?= $message."<br>" ?>
                    <?php endforeach; ?>
                    <button class="btn btn-info">Valider</button>
                </form>
            </div>
        </div>
    </div>


<?php elseif ($display == "mailSent"): ?>
    <!-- Mail envoyé -->
    <div class="container">
        <div class="row">
            <h2 class="text-center">Un email de réinitialisation vous a été envoyé.</h2>
            <a href="<?php // echo $mail?>"><?php // echo $mail ?></a>
        </div>
    </div>


<?php elseif ($display == "password"): ?>
    <!-- Récupére le nouveau mot de passe -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-6">
                <h3>Veuillez entrer un nouveau mot de passe</h3><br>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="password">Nouveau mot de passe :</label>
                        <input type="password" id="password" name="password" class="form-control">
                        <?php if (isset($errors)) echo "<span class=\"text-danger\">".$DefaultModel->printError($errors, "password")."</span>"; ?>
                    </div>
                    <div class="form-group">
                        <label for="cfpassword">Confirmer votre mot de passe :</label>
                        <input type="password" id="cfpassword" name="cfpassword" class="form-control">
                        <?php if (isset($errors)) echo "<span class=\"text-danger\">".$DefaultModel->printError($errors, "cfpassword")."</span>"; ?>
                    </div>
                    <?php foreach ($messages as $message): ?>
                        <?= $message."<br>" ?>
                    <?php endforeach; ?>
                    <button class="btn btn-info">Valider</button>
                </form>
            </div>
        </div>
    </div>


<?php elseif ($display == "error"): ?>
    <div class="container">
        <div class="row">
            <h2 class="text-center"><?= $message ?></h2>
        </div>
    </div>
<?php endif; ?>




<?php // var_dump($_GET); ?>
<?php // var_dump($_POST); ?>
<?php // var_dump($_SERVER); ?>
<?php $this->stop('main_content') ?>
