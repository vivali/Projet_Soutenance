<?php $this->layout('layout', ['title' => 'Profil']) ?>

<?php $this->start('main_content') ?>

<h1>Hello <?=$w_user['username']?></h1>

<h2>Vos informations :</h2>
</br>
<p>Votre pseudo :<?=$w_user['username']?></p>
<p>Votre adresse Email :<?=$w_user['email']?></p>
<p>Date de création de votre compte :<?=$w_user['date_create']?></p>
<p>Date de derniere connexion :<?=$w_user['date_last_connexion']?></p>

<a href="<?=$this->url('user_update')?>">Modifier mes informations</a>

<?php $this->stop('main_content') ?>
