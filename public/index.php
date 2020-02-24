<?php

use eftec\bladeone\BladeOne;
use eftec\routeone\RouteOne;

require "vendor/autoload.php";
include "config/database.php";


// views
function blade()
{
	global $blade;
	$views = getcwd() . '\resources\views';

	if ($blade === null) {
		$blade = new BladeOne($views, 'compiledViews', BladeOne::MODE_DEBUG);

	}
	return $blade;
}

// route
function router()
{
	global $router;

	if ($router === null) {
		$router = new RouteOne();
		$router->setDefaultValues('Home', 'index');
		$router->fetch(); // we process the current route.
	}

	return $router;
}

