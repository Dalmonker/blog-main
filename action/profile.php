<?php

/**
 * @var $mysqli
 */

if(empty($_SESSION['userId'])) {
    header("Location: /?act=login");
    die();
}

$id = $_SESSION['userId'];

$result = $mysqli->query("SELECT * FROM user WHERE id = '" . $id . "' LIMIT 1");
$user = $result->fetch_assoc();
if (!$user) {
    header("Location: /?act=login");
    die();
}

if(count($_POST)) {
    $name = $_POST['name'] ?? null;
    $surname = $_POST['surname'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $about = $_POST['about'] ?? null;
    $mysqli->query("UPDATE user SET name = '" . $name . "', surname = '" . $surname . "', phone =  '" . $phone . "', about =  '" . $about . "' WHERE id = " . $id);
    header("Location: /?act=profile");
    die();
}


require_once 'templates/profile.php';