<?php $this->layout('layout', ['title' => 'Suppression d\'utilisateur']) ?>

<?php $this->start('main_content') ?>
<div class="row">
    <div class="col-md-6 col-md-offset-6">
        <h2>Vous allez supprimer <?=$user['username']?>,</h2><br>
        <form method="POST">
            <button type="submit" name="choice" value="delete" class="btn btn-danger">Confirmer la suppression</button>

            <button type="submit" name="choice" value="back" class="btn btn-primary">Annuler</button>
        </form>
    </div>
</div>
<?php $this->stop('main_content') ?>
