<?php

$params = array(
	'wwwDir' => __DIR__,
	'rootDir' => dirname(__DIR__)
);

// uncomment this line if you must temporarily take down your site for maintenance
// require __DIR__ . '/../app/presentation/templates/maintenance.phtml';

// load bootstrap file
require $params['rootDir'] . '/app/bootstrap.php';
