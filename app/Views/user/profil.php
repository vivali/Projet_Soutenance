<?php $this->layout('layout', ['title' => 'Profil']) ?>

<?php $this->start('main_content') ?>

<p>Hello <?=$w_user['username']?></p>

<?php $this->stop('main_content') ?>
