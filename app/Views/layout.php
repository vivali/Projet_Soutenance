<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="fr"> <!--<![endif]-->
<head>
	<title>Campers Vs Zombies</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Web Fonts -->
	<link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>
	<link href="https://fonts.googleapis.com/css?family=Bungee+Inline|Love+Ya+Like+A+Sister" rel="stylesheet">

	<!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="<?= $this->assetUrl('plugins/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">

	<!-- CSS Header and Footer -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/headers/header-default.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/footers/footer-v1.css') ?>">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="<?= $this->assetUrl('plugins/animate.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('plugins/line-icons/line-icons.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('plugins/font-awesome/css/font-awesome.min.cs') ?>s">

	<!-- CSS Page Style -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/pages/blog_masonry_3col.css') ?>">

	<!-- CSS Theme -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/theme-colors/default.css" id="style_color') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/theme-skins/dark.css') ?>">

	<!-- CSS Customization -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/custom.css') ?>">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
				<!-- Utilisateur connecté -->
				<li <?= ($w_current_route == 'default_camp') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('default_camp'); ?>">Accueil</a></li>
				<li <?= ($w_current_route == 'default_report') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('default_report'); ?>">Rapports<?=($_SESSION['newReport'] > 0)?"(".$_SESSION['newReport'].")":"";?></a></li>
			<?php else: ?>
				<!-- Utilisateur non connecté -->
				<li <?= ($w_current_route == 'user_login') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('user_login'); ?>">Accueil</a></li>
			<?php endif; ?>
			<li <?= ($w_current_route == 'default_classement') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('default_classement',['page'=>1]); ?>">Classement</a></li>
			</ul>
				<?php if ($w_user) { ?>
				<ul class="nav navbar-nav">
					<li><a href="<?=$this->url('default_building',['idBuilding'=>1])?>">Bois : <?php echo $_SESSION["ressources"]->wood; ?> </a></li>
					<li><a href="<?=$this->url('default_building',['idBuilding'=>2])?>">Nourriture : <?php echo $_SESSION["ressources"]->food; ?> </a></li>
					<li><a href="<?=$this->url('default_building',['idBuilding'=>3])?>">Eau : <?php echo $_SESSION["ressources"]->water; ?></a></li>
					<li><a href="<?=$this->url('default_building',['idBuilding'=>3])?>">Campers : <?php echo $_SESSION["ressources"]->camper; ?></a></li>
				</ul>
				<?php } ?>
				<ul class="nav navbar-nav navbar-right">
					<?php if ($w_user) { // si l'utilisateur est connecté ?>
						<li <?= ($w_current_route == 'default_camp') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('default_camp'); ?>">Camp</a></li>
						<li <?= ($w_current_route == 'user_profil') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('user_profil'); ?>">Profil</a></li>
						<li <?= ($w_current_route == 'default_tchat') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('default_tchat'); ?>">Tchat</a></li>
						<li <?= ($w_current_route == 'user_logout') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('user_logout'); ?>">Déconnexion</a></li>
					<?php } else { ?>
						<li <?= ($w_current_route == 'user_register') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('user_register'); ?>">Inscription</a></li>
					<?php } ?>
				</ul>
			</div>
	</nav>

	<div class="container">
		
	
				<?= $this->section('main_content') ?>

	</div>

	<!-- <?php // var_dump($_SESSION); ?> -->
	<!-- JS Global Compulsory -->
	<script type="text/javascript" src="<?= $this->assetUrl('plugins/jquery/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?= $this->assetUrl('plugins/jquery/jquery-migrate.min.js'); ?>"></script>
	<script type="text/javascript" src="<?= $this->assetUrl('plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<!-- JS Implementing Plugins -->
	<script type="text/javascript" src="<?= $this->assetUrl('plugins/back-to-top.js'); ?>"></script>
	<script type="text/javascript" src="<?= $this->assetUrl('plugins/smoothScroll.js'); ?>"></script>
	<script type="text/javascript" src="<?= $this->assetUrl('plugins/masonry/jquery.masonry.min.js'); ?>"></script>
	<!-- JS Customization -->
	<script type="text/javascript" src="<?= $this->assetUrl('js/custom.js'); ?>"></script>
	<!-- JS Page Level -->
	<script type="text/javascript" src="<?= $this->assetUrl('js/app.js'); ?>"></script>
	<script type="text/javascript" src="<?= $this->assetUrl('js/pages/blog-masonry.js'); ?>"></script>
	<script type="text/javascript" src="<?= $this->assetUrl('js/plugins/style-switcher.js'); ?>"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			App.init();
			StyleSwitcher.initStyleSwitcher();
		});
	</script>
	<!--[if lt IE 9]>
    <script src="assets/plugins/respond.js"></script>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/plugins/placeholder-IE-fixes.js"></script>
  <![endif]-->

</body>
</html>
