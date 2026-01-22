<?php

/**
 * @var $mysqli
 */

$data = chekUser($mysqli);
$userId = $data['userId'];
$user = $data['user'];


if(count($_POST)) {
    $name = $_POST['name'] ?? null;
    $surname = $_POST['surname'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $about = $_POST['about'] ?? null;
    $mysqli->query("UPDATE user SET name = '" . $name . "', surname = '" . $surname . "', phone =  '" . $phone . "', about =  '" . $about . "' WHERE id = " . $userId);
    header("Location: /?act=profile");
    die();
}


require_once 'templates/profile.php';