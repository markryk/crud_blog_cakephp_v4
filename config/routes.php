<?php
    use Cake\Routing\Route\DashedRoute;
    use Cake\Routing\RouteBuilder;

    $routes->setRouteClass(DashedRoute::class);

    /*$routes->scope('/', function (RouteBuilder $builder) {
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
        $builder->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

        // Add this
        // New route we're adding for our tagged action.
        // The trailing `*` tells CakePHP that this action has
        // passed parameters.
        $builder->scope('/articles', function (RouteBuilder $builder) {
            $builder->connect('/tagged/*', ['controller' => 'Articles', 'action' => 'tags']);
        });

        $builder->fallbacks();*/

    $routes->scope('/', function (RouteBuilder $routes) {
        $routes->connect('/', ['controller' => 'Articles', 'action' => 'index']);

        //$routes->connect('/articles/index', ['controller' => 'Articles', 'action' => 'view']);
        //$routes->connect('/articles/add', ['controller' => 'Articles', 'action' => 'add']);
        //$routes->connect('/articles/edit', ['controller' => 'Articles', 'action' => 'edit']);
        //$routes->connect('/articles/delete', ['controller' => 'Articles', 'action' => 'delete']);

        //$routes->connect('/', ['controller' => 'Users', 'action' => 'index']);
        $routes->connect('/users/index', ['controller' => 'Users', 'action' => 'view']);
        $routes->connect('/users/add', ['controller' => 'Users', 'action' => 'add']);
        $routes->connect('/users/edit', ['controller' => 'Users', 'action' => 'edit']);
        $routes->connect('/users/delete', ['controller' => 'Users', 'action' => 'delete']);

        //$routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
        $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

        // Add this. New route we're adding for our tagged action.
        // The trailing `*` tells CakePHP that this action has passed parameters.
        $routes->scope('/articles', function (RouteBuilder $builder) {
            $builder->connect('/tagged/*', ['controller' => 'Articles', 'action' => 'tags']);
        });

        // Connect the generic fallback routes.
        $routes->fallbacks(DashedRoute::class);
    });
?>
