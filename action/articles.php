<?php

/**
 * @var $mysqli
 */

if (empty($_SESSION['userId'])) {
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

$result = $mysqli->query("SELECT * FROM article WHERE userId = '" . $id . "'");


require_once 'templates/articles.php';