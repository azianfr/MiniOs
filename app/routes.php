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
        'action' => 'indexAction',
    ],
    'product-create' => [
        'url' => '/product/create',
        'controller' => 'ProductController',
        'action' => 'createAction',
    ],
    'product-show' => [
        'url' => '/product/show',
        'controller' => 'ProductController',
        'action' => 'showAction',
    ],
    'product-edit' => [
        'url' => '/product/edit',
        'controller' => 'ProductController',
        'action' => 'editAction',
    ],
    'product-delete' => [
        'url' => '/product/delete',
        'controller' => 'ProductController',
        'action' => 'deleteAction',
    ],
    'product-type' => [
        'url' => '/product-type',
        'controller' => 'ProductTypeController',
        'action' => 'indexAction',
    ],
    'product-type-create' => [
        'url' => '/product-type/create',
        'controller' => 'ProductTypeController',
        'action' => 'createAction',
    ],
    'product-type-show' => [
        'url' => '/product-type/show',
        'controller' => 'ProductTypeController',
        'action' => 'showAction',
    ],
    'product-type-edit' => [
        'url' => '/product-type/edit',
        'controller' => 'ProductTypeController',
        'action' => 'editAction',
    ],
    'product-type-delete' => [
        'url' => '/product-type/delete',
        'controller' => 'ProductTypeController',
        'action' => 'deleteAction',
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