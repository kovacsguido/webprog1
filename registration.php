<?php
session_start();

include('./includes/config.inc.php');

// Initialize
$_SESSION['message'] = '';
$_SESSION['success'] = false;

// Filter the POST datas
$lastname = filter_input(INPUT_POST, 'lastname', FILTER_CALLBACK, ['options' => validateInput('', 2, 48)]);
$firstname = filter_input(INPUT_POST, 'firstname', FILTER_CALLBACK, ['options' => validateInput('', 2, 48)]);
$username = filter_input(INPUT_POST, 'username', FILTER_CALLBACK, ['options' => validateInput('', 4, 32)]);
$userpass = filter_input(INPUT_POST, 'userpass', FILTER_CALLBACK, ['options' => validateInput('', 8, 32)]);

// If all data received...
if (!empty($lastname) && !empty($firstname) && !empty($username) && !empty($userpass)) {
    try {
        // Connect to database
        $dbh = new PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName, $dbUsername, $dbPassword, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES ' . $dbCharset . ' COLLATE ' . $dbCollation);

        // Check username
        $sqlSelect = "SELECT id FROM users where username = :username";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute([':username' => $username]);

        // This username is exists, abort regisztration
        if ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['message'] = 'A megadott felhasználónév már foglalt!';
        }
        // Not existing, execute the registration
        else {
            $sqlInsert = "INSERT INTO users (lastname, firstname, username, password) VALUES (:lastname, :firstname, :username, :password)";
            $stmt = $dbh->prepare($sqlInsert);
            $stmt->execute([
                ':lastname'  => $lastname,
                ':firstname' => $firstname,
                ':username'  => $username,
                ':password'  => sha1($userpass)
            ]);

            if ($count = $stmt->rowCount()) {
                $_SESSION['message'] = 'Gratulálunk, a regisztrációja sikerült, beléphet!';
                $_SESSION['success'] = true;
            }
            else {
                $_SESSION['message'] = 'Sajnáljuk, a regisztráció nem sikerült.';
            }
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

/********************************************************************************************************************/

/**
 * Validate the input parameters.
 *
 * @param null $default
 * @param null $min
 * @param null $max
 *
 * @return mixed
 */
function validateInput($default = null, $min = null, $max = null)
{
    return function($value = null) use ($default, $min, $max) {
        if (!empty($value)) {
            if (!is_null($min) && strlen($value) < (int)$min) return $default;
            if (!is_null($max) && strlen($value) > (int)$max) return $default;
            return filter_var($value, FILTER_SANITIZE_STRING);
        }

        return $default;
    };
}
