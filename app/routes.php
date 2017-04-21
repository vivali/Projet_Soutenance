<?php

	$w_routes = array(
		// ---- Front office ----
		// User
		['GET|POST', '/', 				'User#login', 'user_login'],
		['GET|POST', '/register', 		'User#register', 'user_register'],
		['GET', '/profil', 				'User#profil', 'user_profil'],
		['GET|POST', '/profil/update',  'User#update', 'user_update'],
		['GET', '/logout', 				'User#logout', 'user_logout'],

		// Classement
		['GET', '/classement/[i:page]',	'Default#classement', 'default_classement'],

		// Camp/buildings
		['GET', '/camp', 				'Default#camp', 'default_camp'],
		['GET', '/view/[i:idBuilding]', 'Default#building', 'default_building'],


		// ---- Back office ----
		// Users
		['GET', '/users', 				'Admin#users', 'admin_users'],
		['GET', '/users/delete/[i:id]',	'Admin#deleteUsers', 'admin_deleteUsers'],

		// Buildings
		['GET', '/buildings', 			'Admin#buildings', 'admin_buildings'],
		['GET|POST', '/building/update','Admin#updateBuilding', 'admin_updateBuilding'],

		// (Optional) change game parameters
		['GET|POST', '/parameters', 	'Admin#parameters', 'admin_parameters'],

	);
