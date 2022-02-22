<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\Route\Route;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

return static function (RouteBuilder $routes) {
    /*
     * The default class to use for all routes
     *
     * The following route classes are supplied with CakePHP and are appropriate
     * to set as the default:
     *
     * - Route
     * - InflectedRoute
     * - DashedRoute
     *
     * If no call is made to `Router::defaultRouteClass()`, the class used is
     * `Route` (`Cake\Routing\Route\Route`)
     *
     * Note that `Route` does not do any inflections on URLs which will result in
     * inconsistently cased URLs when used with `{plugin}`, `{controller}` and
     * `{action}` markers.
     */
    $routes->setRouteClass(DashedRoute::class);



    Router::prefix('client', function (RouteBuilder $routes) {
        $routes->connect('/', ['controller' => 'Products', 'action' => 'index']);
        $routes->connect('/get_product_by_id/:id', ['controller' => 'Products', 'action' => 'getProductByCategory'],["pass" => ["id"]]);
        $routes->connect('/product_detail/:id', ['controller' => 'Products', 'action' => 'getDetailProduct'],["pass" => ["id"]]);
        $routes->setExtensions(['json', 'xml']);
        $routes->fallbacks(DashedRoute::class);
    });

    // $routes->scope('client', function (RouteBuilder $routes) {
    //     $routes->connect('/', ['controller' => 'Products', 'action' => 'index']);
    //     $routes->setExtensions(['json', 'xml']);
    // });

    // $routes->scope('/api', function (RouteBuilder $builder) {
    //     $builder->setExtensions(['json', 'xml']);
    //     $builder->connect('/', ['controller' => 'Api', 'action' => 'getAllProduct']);
    // });

    

   

//route Admin
    $routes->scope('/admin' , function (RouteBuilder $builder) {
        $builder->connect('/users', 'users::index');
        $builder->connect('/users/create', 'users::add');
        // $builder->connect('/users/edit/:id', 'users::edit');
        $builder->connect('/users/edit/:id', ['controller' => 'Users', 'action' => 'edit'],["pass" => ["id"]]);
        $builder->connect('/users/delete/:id', ['controller' => 'Users', 'action' => 'delete'],["pass" => ["id"]]);
        $builder->connect('/users/lock/:id', ['controller' => 'Users', 'action' => 'lock'],["pass" => ["id"]]);
        $builder->connect('/login', ['controller' => 'Users', 'action' => 'login']);
        $builder->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);
    });

    $routes->scope('/admin/category' , function (RouteBuilder $builder) {
        $builder->connect('/', 'categories::index');
        $builder->connect('/create', 'categories::add');
        $builder->connect('/edit/:id', ['controller' => 'Categories', 'action' => 'edit'],["pass" => ["id"]]);
        $builder->connect('/delete/:id', ['controller' => 'Categories', 'action' => 'delete'],["pass" => ["id"]]);
        
    });

    $routes->scope('/admin/attribute' , function (RouteBuilder $builder) {
        $builder->connect('/', 'attributes::index');
        $builder->connect('/create', 'attributes::add');
        $builder->connect('/edit/{id}', ['controller' => 'Attributes', 'action' => 'edit'],["pass" => ["id"]]);
        $builder->connect('/delete/:id', ['controller' => 'Attributes', 'action' => 'delete'],["pass" => ["id"]]);
        
    });

    $routes->scope('/admin/product' , function (RouteBuilder $builder) {
        $builder->connect('/', 'products::index');
        $builder->connect('/create', 'products::add');
        $builder->connect('/edit/:id', ['controller' => 'Products', 'action' => 'edit'],["pass" => ["id"]]);
        // $builder->connect('/delete/:id', ['controller' => 'Attributes', 'action' => 'delete'],["pass" => ["id"]]);
        
    });

    $routes->scope('/admin/order' , function (RouteBuilder $builder) {
        $builder->connect('/', 'orders::index');
        $builder->connect('/edit/:id', ['controller' => 'Orders', 'action' => 'edit'],["pass" => ["id"]]);
    });

    

    /*
     * If you need a different set of middleware or none at all,
     * open new scope and define routes there.
     *
     * ```
     * $routes->scope('/api', function (RouteBuilder $builder) {
     *     // No $builder->applyMiddleware() here.
     *
     *     // Parse specified extensions from URLs
     *     // $builder->setExtensions(['json', 'xml']);
     *
     *     // Connect API actions here.
     * });
     * ```
     */
};
