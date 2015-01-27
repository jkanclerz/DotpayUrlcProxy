<?php

$app
    ->get('/', 'jkan.controller.demo:demoAction')
    ->bind('homepage')
;
$app
    ->get('/redirect/create', 'jkan.controller.redirect:createAction')
    ->bind('redirect_create')
;
$app
    ->post('/redirect/create', 'jkan.controller.redirect:createAction')
    ->bind('redirect_create_post')
;
$app
    ->get('/redirect/index', 'jkan.controller.redirect:indexAction')
    ->bind('redirect_index')
;

$app
    ->POST('/handle/urlc', 'jkan.controller.proxy:proxyAction')
    ->bind('handle_proxy')
;