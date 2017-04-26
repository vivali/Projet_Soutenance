<?php $this->layout('layout', ['title' => 'Profil']) ?>

<?php $this->start('main_content') ?>

<h1>Hello <?=$w_user['username']?></h1>

<h2>Vos informations :</h2>
</br>
<p>Votre pseudo :<?=$w_user['username']?></p>
<p>Votre adresse Email :<?=$w_user['email']?></p>
<p>Date de création de votre compte :<?=$w_user['date_create']?></p>
<p>Date de derniere connexion :<?=$w_user['date_last_connexion']?></p>

<a class="btn btn-default" href="<?=$this->url('user_update')?>">Modifier mes informations</a>

<?php if ($w_user['role'] == 1): ?>
    <h2>Fonction administrateur :</h2></br>

    <p><a href="<?=$this->url('admin_users')?>">Liste des utilisateurs</a></p>

    <p><a href="<?=$this->url('admin_buildings')?>">Liste des batiments</a></p>

    <p><a href="<?=$this->url('admin_parameters')?>">Paramètres de la partie</a></p>
<?php endif; ?>

<?php $this->stop('main_content') ?>
