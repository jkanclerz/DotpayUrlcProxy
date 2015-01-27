<?php

use Demo\Controller\DemoController;
use Redirect\Controller\RedirectController;
use Redirect\Model\RedirectManager;
use Buzz\Browser;
use Redirect\Handler\ProxyHandler;
use Redirect\Controller\ProxyController;
use Silex\Provider\MonologServiceProvider;

$app['jkan.controller.demo'] = $app->share(function () use ($app) {
    return new DemoController(
        $app['twig']
    );
});

$app['jkan.controller.redirect'] = $app->share(function () use ($app) {
    return new RedirectController(
        $app['form.factory'],
        $app['twig'],
        $app['url_generator'],
        $app['jkan.manager.redirect']
    );
});

$app['jkan.controller.proxy'] = $app->share(function () use ($app) {
    return new ProxyController(
        $app['jkan.proxy.handler']
    );
});

$app['jkan.manager.redirect'] = $app->share(function () use ($app) {
    return new RedirectManager(
        $app['db']
    );
});

$app['jkan.proxy.handler'] = $app->share(function () use ($app) {
    return new ProxyHandler(
        $app['browser'],
        $app['jkan.manager.redirect']->getRepository(),
        $app['monolog']
    );
});

$app['browser'] = $app->share(function () use ($app) {
    return new Browser();
});

$app->register(new MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/logs/proxy.log',
));