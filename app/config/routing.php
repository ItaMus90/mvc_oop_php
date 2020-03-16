<?php

use Controller\Type;

return [
//    [
//        'pattern' => '/',
//        'controller' => Type\Home::class,
//        'method' => 'index'
//    ]
    [
        'pattern' => '/',
        'controller' => Type\Home::class,
        'method' => 'list'
    ]
];

