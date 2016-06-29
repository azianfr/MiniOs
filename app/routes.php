<?php

$routes = [
    'index' => [
        'url' => '/index',
        'controller' => 'HomeController',
        'action' => 'indexAction',
    ],
    'wiki' => [
        'url' => '/wiki',
        'controller' => 'HomeController',
        'action' => 'wikiAction',
    ],
    'articles' => [
        'url' => '/articles',
        'controller' => 'HomeController',
        'action' => 'articlesAction',
    ],
    'delete' => [
        'url' => '/delete',
        'controller' => 'HomeController',
        'action' => 'deleteAction',
    ],
    '404' => [
        'url' => '/404',
        'controller' => 'SecurityController',
        'action' => '404Action',
    ],
    'test' => [
        'url' => '/test',
        'controller' => 'HomeController',
        'action' => 'testAction',
    ],
    'contact' => [
        'url' => '/contact',
        'controller' => 'ContactController',
        'action' => 'contactAction',
    ],
    'contact_list' => [
        'url' => '/contact/list',
        'controller' => 'ContactController',
        'action' => 'listAction',
    ],
    'product' => [
        'url' => '/product',
        'controller' => 'ProductController',
        'action' => 'productAction',
    ],
    'product-type' => [
        'url' => '/product-type',
        'controller' => 'ProductController',
        'action' => 'productTypeAction',
    ],
    'register' => [
        'url' => '/register',
        'controller' => 'UserController',
        'action' => 'registerAction',
    ],
    'login' => [
        'url' => '/login',
        'controller' => 'UserController',
        'action' => 'loginAction',
    ],
    'logout' => [
        'url' => '/logout',
        'controller' => 'UserController',
        'action' => 'logoutAction',
    ],
    'profile' => [
        'url' => '/profile',
        'controller' => 'UserController',
        'action' => 'profileAction',
    ],
];