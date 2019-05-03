<?php
session_start();

include('./includes/config.inc.php');

// Initialize
$_SESSION['message'] = '';
$_SESSION['success'] = false;
$user = null;

// Filter the POST datas
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING, ['options' => ['default' => '']]);
$userpass = filter_input(INPUT_POST, 'userpass', FILTER_SANITIZE_STRING, ['options' => ['default' => '']]);

// If all data received...
if (!empty($username) && !empty($userpass)) {
    try {
        // Connect to database
        $dbh = new PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName, $dbUsername, $dbPassword, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES ' . $dbCharset . ' COLLATE ' . $dbCollation);

        // Check user
        $sqlSelect = "SELECT id, lastname, firstname, username FROM users WHERE username = :username and password = sha1(:password)";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute([
            ':username' => $username,
            ':password' => $userpass
        ]);
        $user = $sth->fetch(PDO::FETCH_ASSOC);

        if (!empty($user)) {
            $_SESSION['success'] = true;
            $_SESSION['user'] = $user;
        }
        else {
            $_SESSION['message'] = 'Sajnáljuk, a belépés nem sikerült, próbálja meg újra!';
        }
    }
    catch (PDOException $e) {
        echo "Hiba: ".$e->getMessage();
    }
}
else {
    $_SESSION['message'] = 'Minden mezőt kötelező kitölteni!';
}

// Redirect
if ($_SESSION['success']) {
    header('Location: index.php');
}
else {
    header('Location: /?page=login');
}
