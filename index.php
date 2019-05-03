<?php
session_start();

include('./includes/config.inc.php');

// Filter input data
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING, ['options' => ['default' => '']]);

// Logout action
if ($action == 'logout') {
    unset($_SESSION['user']);
    header('Location: index.php');
}

// Connect to database
$dbh = new PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName, $dbUsername, $dbPassword, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
$dbh->query('SET NAMES ' . $dbCharset . ' COLLATE ' . $dbCollation);

// Define the required page
$query = current($pages);
$page = empty($_GET['page']) ? '/' : $_GET['page'];

// Check the page
if (!empty($page)) {
    if (isset($pages[$page]) && file_exists("./templates/{$pages[$page]['file']}.tpl.php")) {
        $query = $pages[$page];
    }
    else {
        $query = $errorPage;
        header('HTTP/1.0 404 Not Found');
    }
}

// Load the main template
include('./templates/index.tpl.php');
