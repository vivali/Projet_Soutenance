<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>

 <div class="row">
        <div class="col-md-4 col-md-offset-4">

            <h3>Inscription</h3>

            <form method="POST">

                <div class="form-group">
                    <label for="username" class="control-label" >Pseudo</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $username; ?>">
                    <?php if (isset($error)) echo "<span class=\"text-danger\">".$DefaultModel->printError($error, "username")."</span>"; ?>
                </div>

                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
                    <?php if (isset($error)) echo "<span class=\"text-danger\">".$DefaultModel->printError($error, "email")."</span>"; ?>
                </div>

                <div class="form-group">
                    <label for="password" class="control-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <?php if (isset($error)) echo "<span class=\"text-danger\">".$DefaultModel->printError($error, "password")."</span>"; ?>
                </div>

                <div class="form-group">
                    <label for="password" class="control-label">Retaper le mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password_confirm" placeholder="Password">
                    <?php if (isset($error)) echo "<span class=\"text-danger\">".$DefaultModel->printError($error, "password")."</span>"; ?>
                </div>

                <div class="form-group">
                    <label for="birthday_day" class="control-label">Date de naissance</label>

                    <div class="row">
                        <div class="col-sm-4">
                            <select class="form-control" id="birthday_day" name="birthday_day">
                                <option value=""></option>
                                <?php for ($i=1; $i<=31; $i++) : ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>

                        <div class="col-sm-4">
                            <select class="form-control" id="birthday_month" name="birthday_month">
                                <option value=""></option>
                                <?php for ($i=1; $i<=12; $i++) : ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>

                        <div class="col-sm-4">
                            <select class="form-control" id="birthday_year" name="birthday_year">
                                <option value=""></option>
                                <?php for ($i=date("Y"); $i>date("Y")-100; $i--) : ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <?php if (isset($error)) echo "<span class=\"text-danger\">".$DefaultModel->printError($error, "birthday")."</span>"; ?>

                </div>

                <button type="submit" class="btn btn-default">Envoyer</button>
                <div class="container">
                	<div class="row"><?php echo $message; ?></div>
                </div>

            </form>
        </div>
    </div>

<?php $this->stop('main_content') ?>
