<?php

	$w_routes = array(
		// ---- Front office ----
		// User
		['GET|POST', '/', 						'User#login', 'user_login'],
		['GET|POST', '/register', 				'User#register', 'user_register'],
		['GET', '/profil', 						'User#profil', 'user_profil'],
		['GET|POST', '/profil/update',  		'User#update', 'user_update'],
		['GET', '/logout', 						'User#logout', 'user_logout'],
		['GET|POST', '/reset', 					'User#reset', 'user_reset'],

		// Classement
		['GET', '/classement/[i:page]',			'Default#classement', 'default_classement'],
		['GET', '/tchat',						'Default#tchat', 'default_tchat'],

		// Camp/buildings
		['GET', '/camp', 						'Default#camp', 'default_camp'],
		['GET', '/view/[i:idBuilding]', 		'Default#building', 'default_building'],
		['GET', '/upgrade/[i:idBuilding]', 		'Default#upgrade', 'default_upgrade'],

		// Rapport/message
		['GET', '/report', 						'Default#report', 'default_report'],
		['GET', '/report/seen/[i:id]', 			'Default#seen', 'report_seen'],
		['GET', '/report/deleteReport/[i:id]', 	'Default#deleteReport', 'report_deleteReport'],

		// ---- Back office ----
		// Users
		['GET', '/users', 						'Admin#users', 'admin_users'],
		['GET|POST', '/user/delete/[i:id]',		'Admin#deleteUser', 'admin_deleteUser'],

		// Buildings
		['GET', '/buildings', 					'Admin#buildings', 'admin_buildings'],
		['GET|POST', '/building/update/[i:idBuilding]',	'Admin#updateBuilding', 'admin_updateBuilding'],

		// (Optional) change game parameters
		['GET|POST', '/parameters', 			'Admin#parameters', 'admin_parameters'],

	);
