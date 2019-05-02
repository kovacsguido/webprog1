<?php

// Credentials of the database connection
$dbHost      = 'web1_db';
$dbUsername  = 'webprog1user';
$dbPassword  = 'U39voeyMYwszUBb6';
$dbName      = 'webprog1';
$dbCharset   = 'utf8';
$dbCollation = 'utf8_hungarian_ci';

// Title of window
$windowTitle = 'Táncsics Alapítvány';

// Details of head
$headDetails = [
    'title'     => 'Táncsics Alapítvány',
    'slogan'    => 'Ez az oldal a Dabasi Táncsics Mihály Gimnázium alapítványának az oldalaként készült, egy egyetemi beadandó feladat részeként. <a href="http://www.dagim.hu/" target="_blank">Az eredeti oldal elérhető ezen a linken.</a>'
];

// Details of footer
$footerDetails = [
    'copyright' => 'Copyright ' . date("Y"),
    'company'   => 'Táncsics Alapítvány'
];

// Pages
$pages = [
    '/'            => [
        'file'  => 'main',
        'title' => 'Főoldal'
    ],
    'about-us' => [
        'file'  => 'about-us',
        'title' => 'Bemutatkozás'
    ],
    'community-service' => [
        'file'  => 'community-service',
        'title' => 'Közösségi szolgálat'
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
    ],
    'login'     => [
        'file'  => 'login',
        'title' => 'Belépés'
    ]
];

// Error page
$errorPage = [
    'file'  => '404',
    'title' => 'A keresett oldal nem található!'
];
