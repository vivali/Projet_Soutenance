<?php $this->layout('layout', ['title' => 'Profil']) ?>

<?php $this->start('main_content') ?>

<p>Hello <?=$w_user['username']?></p>
<a href="<?=$this->url('user_update')?>">Modifier mes informations</a>

<?php $this->stop('main_content') ?>
