<?php $this->layout('layout', ['title' => 'Parametres du jeu']) ?>

<?php $this->start('main_content') ?>
<div class="row">
    <div class="col-md-8 col-md-offset-4">

        <h2 class="text-center">Changer les paramètres du serveur</h2><br>
        <form method="POST">
            <div class="form-group">
                <label for="speed">Vitesse du jeu <small>(entre 1 et 10)</small> :</label>
                <div>
                    <input type="text" id="speed" name="speed" class="form-control" placeholder="<?= $param['speed'] ?>">
                </div>
            </div><br>

            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    <button type="submit" class="btn btn-default">Valider</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $this->stop('main_content') ?>
