<?php

use Silex\Provider\FormServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Symfony\Component\Debug\Debug;

Debug::enable();

define('APP', dirname(__DIR__));
define('SRC', dirname(__DIR__).'/src');

$app['debug'] = true;

$app->register(new UrlGeneratorServiceProvider());
$app->register(
    new Silex\Provider\TwigServiceProvider(),
    array(
        'twig.path' => SRC.'/Web/Resources/views',
    )
);

$app->register(new TranslationServiceProvider(), array(
    'translator.messages' => array(),
));

$app->register(new FormServiceProvider());

$app->register(new ServiceControllerServiceProvider());

$app->register(new DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_sqlite',
        'path'     => APP.'/db/redirect.db',
    ),
));