<?php

use Demo\Controller\DemoController;

$app['jkan.controller.demo'] = $app->share(function () use ($app) {
    return new DemoController(
        $app['twig']
    );
});
