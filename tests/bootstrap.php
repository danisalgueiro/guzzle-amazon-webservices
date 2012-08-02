<?php

error_reporting(E_ALL | E_STRICT);

// Ensure that composer has installed all dependencies
if (!file_exists(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'composer.lock')) {
    die("Dependencies must be installed using composer:\n\ncomposer.phar install --dev\n\n"
        . "See https://github.com/composer/composer/blob/master/README.md for help with installing composer\n");
}

require_once 'PHPUnit/TextUI/TestRunner.php';

spl_autoload_register(function($class) {
    if (0 === strpos($class, 'GuzzleAmazonWebservices')) {
        $class = str_replace('GuzzleAmazonWebservices', '', $class);
        if ('\\' != DIRECTORY_SEPARATOR) {
            $class = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'GuzzleAmazonWebservices' . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
        } else {
            $class = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'GuzzleAmazonWebservices' . DIRECTORY_SEPARATOR . $class . '.php';
        }
        if (file_exists($class)) {
            require $class;
            return true;
        }
    }

    return false;
});

// Include the composer autoloader
$loader = require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

// Register services with the GuzzleTestCase
/*Guzzle\Tests\GuzzleTestCase::setMockBasePath(__DIR__ . DIRECTORY_SEPARATOR . 'mock');

Guzzle\Tests\GuzzleTestCase::setServiceBuilder(Guzzle\Service\Builder\ServiceBuilder::factory(array(
    'client' => array(
        'class' => 'GuzzleAmazonWebservices\ProductAdvertisingClient'
    )
)));*/
