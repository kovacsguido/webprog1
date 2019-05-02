<?php

$windowTitle = 'Dabasi Táncsics Mihály Gimnázium';

$headDetails = [
    'imgSource' => 'logo.png',
    'imgAlt'    => 'logo',
    'title'     => 'Mini honlap',
    'slogan'    => 'Ez az oldal a Dabasi Táncsics Mihály Gimnázium alapítványának az oldalaként készült egyetemi beadandó feladatként. <a href="http://www.dagim.hu/" target="_blank">Az eredeti oldal elérhető ezen a linken.</a>'
];

$footerDetails = [
    'copyright' => 'Copyright ' . date("Y") . '.',
    'company'   => 'Dabasi Táncsics Mihály Gimnázium'
];

$pages = [
    '/'            => [
        'file'  => 'main',
        'title' => 'Főoldal'
    ],
    'about-us' => [
        'file'  => 'about-us',
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
    ],
    'login'     => [
        'file'  => 'login',
        'title' => 'Belépés'
    ]
];

$errorPage = [
    'file'  => '404',
    'title' => 'A keresett oldal nem található!'
];
