<?php

include('./includes/config.inc.php');

// Connect to database
$dbh = new PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName, $dbUsername, $dbPassword, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
$dbh->query('SET NAMES ' . $dbCharset . ' COLLATE ' . $dbCollation);

$query = current($pages);
$page = empty($_GET['page']) ? '/' : $_GET['page'];

if (!empty($page)) {
    if (isset($pages[$page]) && file_exists("./templates/{$pages[$page]['file']}.tpl.php")) {
        $query = $pages[$page];
    }
    else {
        $query = $errorPage;
        header("HTTP/1.0 404 Not Found");
    }
}

include('./templates/index.tpl.php');
