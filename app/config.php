<?php

define('APP', dirname(__DIR__));
define('SRC', dirname(__DIR__).'/src');

$app['debug'] = true;

$app->register(
    new Silex\Provider\TwigServiceProvider(),
    array(
        'twig.path' => SRC.'/Demo/Resources/views',
    )
);

$app->register(
    new Silex\Provider\ServiceControllerServiceProvider()
);
