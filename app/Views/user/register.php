<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>

 <div class="row">
        <div class="col-md-6 col-md-offset-6">

            <h3 class="text-center">Inscription</h3>
            <br>
            
            <form method="POST">

                <div class="form-group">
                    <label for="username" class="control-label" >Pseudo</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $username; ?>">
                    <?php if (isset($errors)) echo "<span class=\"text-danger\">".$DefaultModel->printError($errors, "username")."</span>"; ?>
                    <?php if (isset($errors)) echo "<span class=\"text-danger\">".$DefaultModel->printError($errors, "exists_u")."</span>"; ?>
                </div>

                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
                    <?php if (isset($errors)) echo "<span class=\"text-danger\">".$DefaultModel->printError($errors, "email")."</span>"; ?>
                    <?php if (isset($errors)) echo "<span class=\"text-danger\">".$DefaultModel->printError($errors, "exists_m")."</span>"; ?>
                </div>

                <div class="form-group">
                    <label for="password" class="control-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <?php if (isset($errors)) echo "<span class=\"text-danger\">".$DefaultModel->printError($errors, "password")."</span>"; ?>
                </div>

                <div class="form-group">
                    <label for="cfpassword" class="control-label">Retaper le mot de passe</label>
                    <input type="password" class="form-control" id="cfpassword" name="cfpassword" placeholder="Password">
                    <?php if (isset($errors)) echo "<span class=\"text-danger\">".$DefaultModel->printError($errors, "cfpassword")."</span>"; ?>
                </div>

                <div class="form-group">
                    <label for="birthday_day" class="control-label">Date de naissance</label>
                    <div class="row">
                        <div class="col-sm-4">
                            <select class="form-control" id="birthday_day" name="birthday_day">
                                <option value=""></option>
                                <?php for ($i=1; $i<=31; $i++) : ?>
                                    <option <?= ($i==$birthday_day)?"selected":""; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>

                        <div class="col-sm-4">
                            <select class="form-control" id="birthday_month" name="birthday_month">
                                <option value=""></option>
                                <?php for ($i=1; $i<=12; $i++) : ?>
                                    <option <?= ($i==$birthday_month)?"selected":""; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>

                        <div class="col-sm-4">
                            <select class="form-control" id="birthday_year" name="birthday_year">
                                <option value=""></option>
                                <?php for ($i=date("Y"); $i>date("Y")-100; $i--) : ?>
                                    <option <?= ($i==$birthday_year)?"selected":""; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <?php if (isset($errors)) echo "<span class=\"text-danger\">".$DefaultModel->printError($errors, "birthday")."</span>"; ?>

                </div>

                <button type="submit" class="btn btn-default">Envoyer</button>
                <div class="container">
                	<div class="row"><?php echo $messages; ?></div>
                </div>

            </form>
        </div>
    </div>

<?php $this->stop('main_content') ?>