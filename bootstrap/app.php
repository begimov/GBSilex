<?php

require_once __DIR__ . '/../vendor/autoload.php';

// TODO: DEBUG false
$app = new Silex\Application([
    'debug' => true
]);

$app->register(new \Silex\Provider\TwigServiceProvider, [
    'twig.path' => __DIR__ . '/../views'
]);

$app->register(new \Silex\Provider\DoctrineServiceProvider, [
    'db.options' => [
        'driver' => 'pdo_mysql',
        'host' => 'localhost',
        'dbname' => 'gbsilex',
        'user' => 'aideus',
        'password' => 'xyzAxyz'
    ]
]);

$app->register(new \Silex\Provider\ServiceControllerServiceProvider());

$app['post.controller'] = function () use ($app) {
    return new \App\Controllers\PostController($app);
};

$app['like.controller'] = function () use ($app) {
    return new \App\Controllers\LikeController($app);
};

require_once __DIR__ . '/../routes/web.php';
