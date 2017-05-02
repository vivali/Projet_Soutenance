<?php $this->layout('layout', ['title' => 'Mise à jour des informations']) ?>

<?php $this->start('main_content') ?>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <h3 class="text-center">Modifier ses informations</h3><br>
            <p>Remplissez uniquement les champs que vous souhaitez modifier ainsi que votre mot de passe actuel.</p>

            <form method="POST">

                <div class="form-group">
                    <label for="username" class="control-label" >Nouveau pseudo</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $username; ?>">
                    <?php if (isset($errors)) echo "<span class=\"text-danger\">".$DefaultModel->printError($errors, "username")."</span>"; ?>
                </div>

                <div class="form-group">
                    <label for="email" class="control-label">Nouveau mail</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
                    <?php if (isset($errors)) echo "<span class=\"text-danger\">".$DefaultModel->printError($errors, "email")."</span>"; ?>
                </div>

                <div class="form-group">
                    <label for="password" class="control-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <?php if (isset($errors)) echo "<span class=\"text-danger\">".$DefaultModel->printError($errors, "password")."</span>"; ?>
                </div>

                <!-- Update password -->
                <div class="form-group">
                    <label for="npassword" class="control-label">Nouveau mot de passe</label>
                    <input type="password" class="form-control" id="npassword" name="npassword" placeholder="Password">
                    <?php if (isset($errors)) echo "<span class=\"text-danger\">".$DefaultModel->printError($errors, "npassword")."</span>"; ?>
                </div>

                <div class="form-group">
                    <label for="cfpassword" class="control-label">Retaper le nouveau mot de passe</label>
                    <input type="password" class="form-control" id="cfpassword" name="cfpassword" placeholder="Password">
                    <?php if (isset($errors)) echo "<span class=\"text-danger\">".$DefaultModel->printError($errors, "cfpassword")."</span>"; ?>
                </div>

                <button type="submit" class="btn btn-default">Modifier</button>
            </form>
            <div class="">
                <?php foreach ($messages as $message): ?>
                    <p><?= $message ?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php $this->stop('main_content') ?>
