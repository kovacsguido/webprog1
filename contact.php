<?php
session_start();

include('./includes/config.inc.php');

// Initialize
$_SESSION['message'] = '';
$_SESSION['success'] = false;

// Filter the POST datas
$fullname = filter_input(INPUT_POST, 'fullname', FILTER_CALLBACK, ['options' => validateInput('', 5, 20)]);
$email = filter_input(INPUT_POST, 'email', FILTER_CALLBACK, ['options' => validateInput('', 6, 40)]);
$message = filter_input(INPUT_POST, 'message', FILTER_CALLBACK, ['options' => validateInput('', 1, 1024)]);

// If all data received...
if (!empty($fullname) && !empty($email) && !empty($message)) {
    try {
        // Connect to database
        $dbh = new PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName, $dbUsername, $dbPassword, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES ' . $dbCharset . ' COLLATE ' . $dbCollation);

        $sqlInsert = "INSERT INTO messages (fullname, email, message) VALUES (:fullname, :email, :message)";
        $stmt = $dbh->prepare($sqlInsert);
        $stmt->execute([
            ':fullname' => $fullname,
            ':email'    => $email,
            ':message'  => $message
        ]);

        if ($count = $stmt->rowCount()) {
            $_SESSION['message'] = 'Köszönjük, az üzenetét továbbítottuk!';
            $_SESSION['success'] = true;
        }
        else {
            $_SESSION['message'] = 'Sajnáljuk, az üzenet továbbítása nem sikerült.';
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
header('Location: /?page=contact');









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
