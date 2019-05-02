<?php

$windowTitle = [
    'text' => 'Mini honlap Kft.',
];

$headDetails = [
    'imgSource' => 'logo.png',
    'imgAlt'    => 'logo',
    'title'     => 'Mini honlap',
    'slogan'    => ''
];

$footerDetails = [
    'copyright' => 'Copyright ' . date("Y") . '.',
    'company'   => 'Mini honlap Kft.'
];

$pages = [
    '/'            => [
        'file'  => 'main',
        'title' => 'Főoldal'
    ],
    'about-us' => [
        'file'  => 'aboutus',
        'title' => 'Bemutatkozás'
    ],
    'contact'    => [
        'file'  => 'contact',
        'title' => 'Kapcsolat'
    ],
    'gallery'       => [
        'file'  => 'gallery',
        'title' => 'Galéria'
    ],
    'videos'     => [
        'file'  => 'videos',
        'title' => 'Videók'
    ]
];

$errorPage = [
    'file'  => '404',
    'title' => 'A keresett oldal nem található!'
];
