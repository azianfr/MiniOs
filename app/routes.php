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
    ]
];