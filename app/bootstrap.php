<?php

require $params['rootDir'] . '/vendor/autoload.php';
require $params['rootDir'] . '/vendor/nette/nette/Nette/loader.php';

// Configure application
$configurator = new Nette\Config\Configurator();

// Enable Nette Debugger for error visualisation & logging
$configurator->setDebugMode($configurator::DEVELOPMENT);
$configurator->enableDebugger($params['rootDir'] . '/var/log');

// Enable RobotLoader
$configurator->setTempDirectory($params['rootDir'] . '/var/tmp');
$configurator->createRobotLoader()
	->addDirectory($params['rootDir'].'/app')
	->register();

// Create Dependency Injection container from config.neon file
$configurator->addConfig($params['rootDir'] . '/app/config/config.neon', false);
$container = $configurator->createContainer();

// Setup router
$container->router[] = new \Nette\Application\Routers\SimpleRouter('Homepage:default');

// Configure and run the application!
$container->application->run();
