<?php $this->layout('layout', ['title' => 'Parametres du jeu']) ?>

<?php $this->start('main_content') ?>
<div class="row">
    <div class="col-md-8 col-md-offset-4">

        <h2 class="text-center">Changer les paramètres du serveur</h2><br>
        <form method="POST">
            <div class="form-group">
                <label for="speed">Vitesse du jeu <small>(entre 10 et 100)</small> :</label>
                <div>
                    <input type="text" id="speed" name="speed" class="form-control" placeholder="<?= $param['speed'] ?>">
                </div>
            </div><br>

            <div class="form-group">
                <label for="z_atk_proba">Probabilité d'attaque de zombie <small>(entre 0 et 100)</small> :</label>
                <div>
                    <input type="text" id="z_atk_proba" name="z_atk_proba" class="form-control" placeholder="<?= $param['z_atk_proba'] ?>">
                </div>
                <small>(La somme des deux probabilitées doit être inférieur à 100)</small>
            </div><br>

            <div class="form-group">
                <label for="p_atk_proba">Probabilité d'attaque de joueur <small>(entre 0 et 100)</small> :</label>
                <div>
                    <input type="text" id="p_atk_proba" name="p_atk_proba" class="form-control" placeholder="<?= $param['p_atk_proba'] ?>">
                </div>
                <small>(La somme des deux probabilitées doit être inférieur à 100)</small>
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
