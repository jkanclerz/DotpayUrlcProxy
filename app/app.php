<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

require 'config.php';
require 'services.php';
require 'routes.php';

$app->run();
