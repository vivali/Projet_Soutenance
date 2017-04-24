<?php $this->layout('layout', ['title' => 'Suppression d\'utilisateur']) ?>

<?php $this->start('main_content') ?>
<div class="row">
    <div class="col-md-6 col-md-offset-6">
        <h1>Confirmez la suppression</h1>
        <form method="POST">
            <div class="form-group">
                <div class="radio">
                    <label><input type="radio" value="delete" name="choice">Oui</label>
                </div>
                <div class="radio">
                    <label><input type="radio" value="back" name="choice">Non</label>
                </div>
            </div>
            <button type="submit" class="btn btn-default">Supprimer</button>
        </form>
    </div>
</div>
<?php $this->stop('main_content') ?>
