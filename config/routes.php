<?php
    use Cake\Routing\Route\DashedRoute;
    use Cake\Routing\RouteBuilder;

    $routes->scope('/', function (RouteBuilder $routes) {
        $routes->connect('/', ['controller' => 'Articles', 'action' => 'index']);
        $routes->connect('/articles/index', ['controller' => 'Articles', 'action' => 'view']);
        $routes->connect('/articles/add', ['controller' => 'Articles', 'action' => 'add']);
        $routes->connect('/articles/edit', ['controller' => 'Articles', 'action' => 'edit']);
        $routes->connect('/articles/delete', ['controller' => 'Articles', 'action' => 'delete']);

        // Connect the generic fallback routes.
        $routes->fallbacks(DashedRoute::class);
    });
?>
