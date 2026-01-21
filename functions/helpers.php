<?php

function chekUser($mysqli) : int
{
    if(empty($_SESSION['userId'])) {
        header("Location: /?act=login");
        die();
    }

    $userId = (int)$_SESSION['userId'];
    $result = $mysqli->query("SELECT * FROM user WHERE id = '" . $userId . "' LIMIT 1");
    $user = $result->fetch_assoc();
    if (!$user) {
        header("Location: /?act=login");
        die();
    }

    return $userId;
}