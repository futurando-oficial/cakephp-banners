<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'Banners',
    ['path' => '/banners'],
    function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);
    }
);

Router::prefix('painel', ['path' => '/painel'], function ($routes) {
    $routes->plugin('Banners', function ($routes) {
        $routes->connect('/', ['controller' => 'Banners', 'action' => 'index']);
        $routes->fallbacks('DashedRoute');
    });
});