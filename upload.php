<?php
session_start();

// Initialize
$_SESSION['message'] = '';
$_SESSION['success'] = false;
$supportedTypes = ['jpg', 'jpeg', 'png'];

// Handling the uploads
if (!empty($_FILES['imagefile'])) {
    $srcFileName = $_FILES['imagefile']['name'];
    $srcFileExt = strtolower(pathinfo($srcFileName, PATHINFO_EXTENSION));

    if (in_array($srcFileExt, $supportedTypes)) {
        move_uploaded_file($_FILES['imagefile']['tmp_name'], 'gallery/' . $_FILES['imagefile']['name']);
    }

    if (file_exists('gallery/' . $_FILES['imagefile']['name'])) {
        $_SESSION['message'] = 'A(z) ' . $_FILES['imagefile']['name'] . ' nevű kép feltöltése sikerült!';
        $_SESSION['success'] = true;
    }
    else {
        $_SESSION['message'] = 'Sajnáljuk, a(z) ' . $_FILES['imagefile']['name'] . ' nevű kép feltöltése nem sikerült.';
    }
}

// Redirect
header('Location: /?page=gallery');
