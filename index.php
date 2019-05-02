<?php

include('./includes/config.inc.php');

$query = current($pages);
$page = empty($_GET['page']) ? '' : $_GET['page'];

if (!empty($page)) {
    if (isset($pages[$page]) && file_exists("./templates/pages/{$pages[$page]['file']}.tpl.php")) {
        $query = $pages[$page];
    }
    else {
        $query = $errorPage;
        header("HTTP/1.0 404 Not Found");
    }
}

include('./templates/index.tpl.php');
