<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
</head>
<body>
	<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo $this->url('user_login'); ?>"><?php echo $w_site_name; ?></a>
			</div>
			<div class="collapse navbar-collapse" id="menu">
				<ul class="nav navbar-nav">
					<?php if ($w_user): ?>
						<li <?= ($w_current_route == 'default_camp') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('default_camp'); ?>">Accueil</a></li>
					<?php else: ?>
						<li <?= ($w_current_route == 'user_login') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('user_login'); ?>">Accueil</a></li>
					<?php endif; ?>


				</ul>
				<?php if ($w_user) { ?>
				<ul class="nav navbar-nav text-center">
					<li><a href="<?=$this->url('default_building',['idBuilding'=>1])?>">Bois : <?php echo $_SESSION["ressources"]->wood; ?> </a></li>
					<li><a href="<?=$this->url('default_building',['idBuilding'=>2])?>">Nourriture : <?php echo $_SESSION["ressources"]->food; ?> </a></li>
					<li><a href="<?=$this->url('default_building',['idBuilding'=>3])?>">Eau : <?php echo $_SESSION["ressources"]->water; ?></a></li>
				</ul>
				<?php } ?>

				<ul class="nav navbar-nav navbar-right">
					<?php if ($w_user) { // si l'utilisateur est connecté ?>
						<li <?= ($w_current_route == 'default_camp') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('default_camp'); ?>">Camp</a></li>
						<li <?= ($w_current_route == 'user_profil') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('user_profil'); ?>">Profil</a></li>
						<li <?= ($w_current_route == 'user_login') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('user_login'); ?>">Tchat</a></li>
						<li <?= ($w_current_route == 'user_logout') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('user_logout'); ?>">Déconnexion</a></li>
					<?php } else { ?>
						<li <?= ($w_current_route == 'user_register') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('user_register'); ?>">Inscription</a></li>
					<?php } ?>
				</ul>
			</div>
	</nav>
<div class="container">
		<section>
			<?php if ($this->section('sidebar')) { ?>

				<div class="row">
					<div class="col-sm-3">
						<?= $this->section('sidebar') ?>
					</div>
					<div class="col-sm-9">
						<?= $this->section('main_content') ?>
					</div>
				</div>

			<?php } else { ?>

				<?= $this->section('main_content') ?>

			<?php } ?>
		</section>
	</div>
	<?php var_dump($_SESSION); ?>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="<?= $this->assetUrl('js/app.js'); ?>"></script>
</body>
</html>
