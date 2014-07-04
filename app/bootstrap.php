<?php

require $params['rootDir'] . '/vendor/autoload.php';

$configurator = new Nette\Configurator();

//$configurator->setDebugMode($configurator::DEVELOPMENT);
$configurator->enableDebugger($params['rootDir'] . '/var/log');

$configurator->setTempDirectory($params['rootDir'] . '/var/tmp');
$configurator->createRobotLoader()
	->addDirectory($params['rootDir'].'/app')
	->register();

$configurator->addConfig($params['rootDir'] . '/app/config/config.neon', false);
if (file_exists($local = $params['rootDir'] . '/app/config/config.local.neon')) {
	$configurator->addConfig($local, false);
}
$container = $configurator->createContainer();

$container->router[] = new \Nette\Application\Routers\SimpleRouter('Homepage:default');
return $container;
